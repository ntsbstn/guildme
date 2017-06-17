<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\User;
use Socialite;
use Validator;
use Redirect;
use Response;
use Sentinel;
use Session;

class AuthController extends Controller
{
    public function redirectToProvider($provider=null)
    {
        if(!config("services.$provider")) Response::make("Not Found", 404); //just to handle providers that doesn't exist
        return Socialite::driver($provider)->redirect();
    }

    /* 4 cases:
        1.  User register for the first time with Oauth
        2.  User sign in with Oauth, but is already registered
        3.  User sign in with Oauth, but has already used another Oauth service
        4.  User sign with an already used Oauth service
    */
    public function handleProviderCallback($provider=null)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) { // Cannot retrieve OAuth user data
            return Redirect::to('loginform');
        }
        $token = $user->token;
        $password = str_random(10);
        $OAuthUser = $this->findOrCreateUser($user, $provider, $password);

        try {
            $user = Sentinel::findById($OAuthUser->id);

            if (Sentinel::authenticateOauth($user)) {
                Sentinel::login($user);

                $user->battlenet_token = $token;
                $user->save(); 
                
                return Redirect::route('my')->with('success', 'Welcome' . $user->email . '!');
            } else {
                return Redirect::route('loginform')->with('error', 'Cannot authenticate.');
            }
        } catch (NotActivatedException $e) {

            return Redirect::route('loginform')->with('error', $e->getMessage());
        }
    }


    private function findOrCreateUser($user, $provider, $password)
    {
        if ($userExist = User::where('battlenet_id', '=', $user->id)->first()) {
            if ($userProvider = User::where($provider . '_id', '=', $user->id)->first()) { // User is already registered with this oauth service
                return $userProvider;
            } else { // User exists but has never used this service provider before
                // Update user with new provider_id
                $new_provider = $provider . '_id';
                $userExist->$new_provider = $user->id;
                $userExist->$battlenet_token = $user->token;
                $userExist->save();  

                return $userExist;                
            }
        } else { // Register and activate new user and proceed to authentication. Return password.
            $credentials = [
                'username' => $user->user['battletag'],
                'email' => $user->user['battletag'].'@temp.omp',
                'password' => $password,
                'battlenet_token' => $user->token,
                'status' => '1',
                'daysPerWeek' => '1',
                $provider . '_id' => $user->id,
                'avatar' => $user->avatar
            ];

            $user = Sentinel::register($credentials, true);
            if ($user) {
                $role = Sentinel::findRoleBySlug('user');

                $role->users()->attach($user);
            }

            Session::flash('warning', "You successfully signed in via OAuth <span class='fa fa-smile-o'></span>.<br/>Your default attributed password: <b>$password</b><br/>Take a note of your password now, as you won't be able to access it anymore. You can always sign in with your favorite OAuth service tough.");
            return $user;
        }
    }

    public function setCredentials(){
        $user = Sentinel::getUser();
        return view('authentication.set-credentials',compact('user'));
    } 
    public function storeCredentials(Request $request){
        
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'email' => [
                        'required',
                        Rule::unique('users')->ignore(Sentinel::getUser()->id),
                    ],
        ]);

        $user = User::findOrFail(Sentinel::getUser()->id);
        $user->username = $request['username'];
        $user->password = bcrypt($request['password']);
        $user->email = $request['email'];
        $user->save();

        return redirect()->back()->with('success','Credentials udpated');
    } 
}