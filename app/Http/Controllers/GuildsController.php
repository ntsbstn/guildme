<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Sentinel;
use App\Guild;
use App\Realm;

class GuildsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guilds = Guild::latest('created_at')->get();
        return view('guilds.index',compact('guilds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $realms = Realm::pluck('displayName', 'id');
        return view('guilds.create', compact('realms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(CreateGuildRequest $request)
    // {
    //      $guild = Request::all();
    //      $guild['user_id'] = Sentinel::getUser()->id;
    //      $guild['created_at'] = Carbon::now();

    //      Guild::create($guild);
         
    //      return redirect('guilds');
    // }



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
        //dd($region->name);    

        //Fetch Blizzard API guild info
        $guild = $this->fetchGuild($region->name, $realm->name, $request->name, $region->defaultLocale );
        
        //Add a couple of inputs
        $guild['realm_id'] = $realm->id;
        $guild['players'] = count($guild['members']);
        $guild['created_at'] = Carbon::now();

        //try to store
        if(! $stmt = Guild::where('name', $guild['name'])->where('realm_id', $guild['realm_id'])->first())
        {
            //store
            $store = Guild::create($guild);

            //attach to belongsToMany
            $store->user()->attach(Sentinel::getUser()->id);
            return redirect()->route('add-guild')->with('success','Guild added to the DB');

        }
        else
        {
            $owner = $stmt->user->first()->username;
            return redirect()->route('add-guild')->with('error','Guild already in the db, '. $owner ." is the owner");
        }

       //dd($guild);
       
    
    }

    private function fetchGuild($region = 'eu', $realm, $name, $locale = 'fr_fr'){

        // Create a new Blizzard client with Blizzard API key and secret
        $client = new \BlizzardApi\BlizzardClient('dmseupyt6ff63vzytvhde8y576yfdyjr' , 'DVCVXBqsn3Y9qhtvg9KYU9eA42cnvb8S', $region , $locale);

        // Create a new World Of Warcraft service with configured Blizzard client
        $wow = new \BlizzardApi\Service\WorldOfWarcraft($client);

        // Use API method for getting specific data
        $response = $wow->getGuild($realm, $name, [
        'fields' => 'members',
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
     * Display the specified resource.
     *
     * @param  \App\Guild  $guilds
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guild = Guild::findOrFail($id);
        return view('guilds.show', compact('guild'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guild  $guilds
     * @return \Illuminate\Http\Response
     */
    public function edit(Guild $guilds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guild  $guilds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guild $guilds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guild  $guilds
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guild $guilds)
    {
       //
    }
}
