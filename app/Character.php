<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Region;

class Character extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'region_id',
        'realm',
        'class_character',
        'race',
        'gender',
        'level',
        'achievementPoints',
        'thumbnail',
        'main',
        'faction',
        'averageItemLevelEquipped',
        'language'
    ];
    public function race()
    {
        return $this->belongsTo('App\Race');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function kill()
    {
        return $this->hasMany('App\Kill');
    }
    
    public static function getBoss($boss_id)
    {
        return Boss::where('api_id',$boss_id)->first();
    }

    public function getKillStats($raid_id, $level){
       
       //select all boss id from raid ID
       $bosses = Boss::where('raid_id', $raid_id);

       //count total number of bosses
       $total = $bosses->count();
       $data['total'] = $total;


       //Count how many kills the character has per boss id
       $notKilled = Kill::where('character_id', $this->id)->where('raid_id', $raid_id)->where($level, 0)->count();
       $math = $total - $notKilled;
       $data['killed'] = $math;

       // return $killed -- raid_id
       $progress = $data['killed'] / $data['total'] * 100; 
       
    //    echo 'tot' . $total;
    //    echo 'killed' . $math;
    //    echo 'not killed' . $notKilled;
        echo $progress . '%';
       ?>

       <div style="width:100%">
            <div class="progress">
                <div class="progress-bar progress-bar-primary" style="width: <?php echo $progress; ?>%;"></div>
            </div>
        </div>
    <?
    }

    public function fetchCharacters($token){

        // Create a new Blizzard client with Blizzard API key and secret
        $client = new \BlizzardApi\BlizzardClient('dmseupyt6ff63vzytvhde8y576yfdyjr' , 'DVCVXBqsn3Y9qhtvg9KYU9eA42cnvb8S','eu' , 'en_gb');
        
        // Create a new battlenet service with configured Blizzard client
        $battlenet = new \BlizzardApi\Service\WorldOfWarcraft($client);

        // Use API method for getting specific data
        $response = $battlenet->getProfileCharacters($token);

        // Accessing response status code
        $response->getStatusCode();

        // Accessing response headers
        $response->getHeaders();

        // Show response body
         $json = $response->getBody();

         //Decode json to an array
         $data = json_decode($json, TRUE);

         
         //Send the array to the view
        //return view('pages.character')->withData($data);
       return current($data);
    }
}
