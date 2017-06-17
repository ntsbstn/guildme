<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Sentinel;

use File;
use Storage;
use Image;
use App\Character;
use App\Realm;
use App\Region;
use App\Guild;
use App\ClassCharacter;
use App\Raid;
use App\Race;
use App\Kill;
use App\Boss;
use App\Faction;

class CharactersController extends Controller
{

    private function fetchCharacter($region, $realm, $character, $locale){

        // Create a new Blizzard client with Blizzard API key and secret
        $client = new \BlizzardApi\BlizzardClient('dmseupyt6ff63vzytvhde8y576yfdyjr' , 'DVCVXBqsn3Y9qhtvg9KYU9eA42cnvb8S', $region , $locale);

        // Create a new World Of Warcraft service with configured Blizzard client
        $wow = new \BlizzardApi\Service\WorldOfWarcraft($client);

        // Use API method for getting specific data
        $response = $wow->getCharacter($realm, $character, [
        'fields' => 'items,stats,progression, guild',
        ]);


        // Accessing response status code
        $response->getStatusCode();


        // Accessing response headers
        $response->getHeaders();

        // Get response body
         //$json = $response->getBody();
         $json = $response->getBody();

         //Decode json to an array
         $data = json_decode($json, TRUE);
         
         //dd($data);
         //Send the array to the view
        //return view('pages.character')->withData($data);
       return $data;
    }

    



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = Character::all();
        
        return view('characters.index',compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$realms = Realm::pluck('displayName', 'id');
        
     //   $character = new Character();
     //   $characters = $character->fetchCharacters(Sentinel::getUser()->battlenet_token);
        $myCharacters = Character::where('user_id', Sentinel::getUser()->id)->get();
 
        return view('characters.create',compact('myCharacters'));
    }

 
   

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the input
        $this->validate($request, [
            'name' => 'alpha|required|min:3',
            'realm' => 'required',
        ]);
        
        //Fetch the collection of Realm from input
        $realm = Realm::find($request->realm);
       
       //Fetch the related region from Realm
        $region = Realm::find($request->realm)->region;
        
        //Fetch Blizzard API guild info
        $character = $this->fetchCharacter($region->name, $realm->name, $request->name, $region->defaultLocale );
        $input = $character;

        
        //Add a couple of inputs
        $input['user_id'] = Sentinel::getUser()->id;
        $input['region_id'] = $region->id;
        $input['class_character'] = $input['class'];
        $input['main'] = str_replace('avatar', 'main', $input['thumbnail']);
        $input['averageItemLevelEquipped'] = $character['items']['averageItemLevelEquipped'];
        $input['created_at'] = Carbon::now();

        if(!Character::where('name', $input['name'])->where('realm', $input['realm'])->first())
        {
            $newCharacter = Character::create($input);

        if(!Kill::where('character_id', $input['user_id'])->first())
        {
            // Get the progression and store it
            $definedRaids = Raid::pluck('api_id')->toArray();
            $raids = $character['progression']['raids'];

            //foreach raids
            foreach ($raids as $raid) {
                //Get the raid that are selected by the database
                if(in_array($raid['id'], $definedRaids)){ 
                    $validRaids[] = $raid;
                }
            }
            //for each selected raid, get the bosses
            foreach ($validRaids as $vr) {
                foreach($vr['bosses'] as $boss){
                    $boss['character_id'] = $newCharacter->id;
                    $boss['boss_id'] = $boss['id'];
                    $boss['raid_id'] = $vr['id'];
                    Kill::create($boss);
                }
            }
        }
            
            //Get folder structure
            $thumbDirectories = dirname($input['thumbnail']);
           
           //Public upload directory
           $dir = storage_path('app/public/images/characters/'. $thumbDirectories.'/' );

           //Check if local directory exists, if not create it
            if(!File::exists($dir)){
                File::makeDirectory($dir,0755,true,true);
            }

            //Fetch from Blizzard
            $blizzardAvatar = 'http://render-'. strtolower($region->name) .'.worldofwarcraft.com/character/'.$input['thumbnail'];
            $blizzardMain = 'http://render-'. strtolower($region->name) .'.worldofwarcraft.com/character/'.$input['main'];
            //$blizzardMain = 'http://render-api-'. strtolower($region->name) .'.worldofwarcraft.com/static-render/'. strtolower($region->name) .'/'. $input['profileMain'];
           // https://render-eu.worldofwarcraft.com/character/uldaman/86/108861014-main.jpg
            
            //Get Avatar character image
            $filenameAvatar = basename($blizzardAvatar);
            
            //Deduct Profile main character image
            $filenameMain = str_replace('avatar', 'main', $filenameAvatar);
            
            //Store local
            Image::make($blizzardAvatar)->save($dir . $filenameAvatar);
            Image::make($blizzardMain)->save($dir . $filenameMain);

           

            //return with success
                return redirect()->route('show-character',['id' => $newCharacter->id])->with('success', "Character added");
        }
        else
        {
            return redirect()->route('add-character')->with('error','Character already in the db');
        }       
    
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $character = Character::findOrFail($id);

         $kills = $character->kill;
         $region = Region::find($character->region_id);
         $race = Race::find($character->race);
         $class = ClassCharacter::find($character->class_character);

         //dd($class->name);
         $faction = Faction::getFaction($character->faction);
         
        return view('characters.show', compact('character','kills','race','class','realm','region', 'faction'))->withModel($character);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        if(Character::find($id))
        {
            // Modelize the character
            $char = Character::find($id);
            
            // Get his region
            $region = Region::find($char->region_id);

            //Fetch Blizzard API char info
            $character = $this->fetchCharacter($region->name, $char->realm, $char->name, $region->defaultLocale );
            //dd($character);
            

            //define what values will be updated
            $char->race = $character['race'];
            $char->gender = $character['gender'];
            $char->class_character = $character['class'];
            $char->level = $character['level'];
            $char->achievementPoints = $character['achievementPoints'];
            $char->thumbnail = $character['thumbnail'];
            $char->main = str_replace('avatar', 'main', $character['thumbnail']);;
            $char->faction = $character['faction'];
            $char->averageItemLevelEquipped = $character['items']['averageItemLevelEquipped'];
            
            //Save images
            
            //Get folder structure
            $thumbDirectories = dirname($character['thumbnail']);
           
           //Public upload directory
           $dir = storage_path('app/public/images/characters/'. $thumbDirectories.'/' );

           //Check if local directory exists, if not create it
            if(!File::exists($dir)){
                File::makeDirectory($dir,0755,true,true);
            }

            //Fetch from Blizzard
            $blizzardAvatar = 'http://render-'. strtolower($region->name) .'.worldofwarcraft.com/character/'.$character['thumbnail'];
            $blizzardMain = 'http://render-'. strtolower($region->name) .'.worldofwarcraft.com/character/'.$char->main;
           
            //Get Avatar character image
            $filenameAvatar = basename($blizzardAvatar);
            
            //Deduct Profile main character image
            $filenameMain = str_replace('avatar', 'main', $filenameAvatar);
            
            //Store local
            Image::make($blizzardAvatar)->save($dir . $filenameAvatar);
            Image::make($blizzardMain)->save($dir . $filenameMain);

           
            // Save update function
            $char->save();

            // Update kills

            if(Kill::where('character_id', $id)->first())
            {
                // Get the progression and store it
                $definedRaids = Raid::pluck('api_id')->toArray();
                $raids = $character['progression']['raids'];

                //foreach raids
                foreach ($raids as $raid) {
                    //Get the raid that are selected by the database
                    if(in_array($raid['id'], $definedRaids)){ 
                        $validRaids[] = $raid;
                    }
                }
                //for each selected raid, get the bosses
                foreach ($validRaids as $vr) {
                    foreach($vr['bosses'] as $boss){
                        $update = Kill::where('character_id', $id)->where('boss_id', $boss['id'])->first();
                        $update->lfrKills = $boss['lfrKills'];
                        $update->lfrTimestamp = $boss['lfrTimestamp'];
                        $update->normalKills = $boss['normalKills'];
                        $update->normalTimestamp = $boss['normalTimestamp'];
                        $update->heroicKills = $boss['heroicKills'];
                        $update->heroicTimestamp = $boss['heroicTimestamp'];
                        $update->raid_id = $vr['id'];
                        $update->save();
                    }
                }
                return redirect()->route('show-character',['id' => $id])->with('success', "Character updated");
                }  
                else
                    {
                        return back()->with('danger', "Not able to find character");
                    }
            
        }
        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
