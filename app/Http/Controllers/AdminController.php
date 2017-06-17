<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Realm;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function getServers()
    {   
        $regions = Region::all();
        foreach($regions as $region){
                //Get all servers from API
                switch ($region->name) {
                    case 'US':
                        $locale = 'en_US';
                        break;
                    case 'EU':
                        $locale = 'en_GB';
                        break;
                    case 'TW':
                        $locale = 'zh_TW';
                        break;
                    case 'KR':
                        $locale = 'ko_KR';
                        break;
                    case 'CH':
                        $locale = 'en_US';
                        break;
                    
                    default:
                         $locale = 'en_US';
                        break;
                }

                $realms = $this->fetchServers($region->name, $locale);

                //Store or update
                foreach($realms['realms'] as $realm){
                    $update = Realm::updateOrCreate(
                        ['displayName' => $region->name ." - ". $realm['name']],
                        [
                            'name' => $realm['name'],
                            'displayName' => $region->name ." - ". $realm['name'],
                            'region_id' => $region->id,
                            'type' => $realm['type'],
                            'locale' => $realm['locale'],
                            'population' => $realm['population']

                        ]);
                }
        }
        return redirect()->route('admin')->with('success', 'Server list updated');
    }

    private function fetchServers($realm, $locale){

        // Create a new Blizzard client with Blizzard API key and secret
        $client = new \BlizzardApi\BlizzardClient('dmseupyt6ff63vzytvhde8y576yfdyjr' , 'DVCVXBqsn3Y9qhtvg9KYU9eA42cnvb8S', $realm, $locale);

        // Create a new World Of Warcraft service with configured Blizzard client
        $wow = new \BlizzardApi\Service\WorldOfWarcraft($client);

        // Use API method for getting specific data
        $response = $wow->getRealmStatus();


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
}
