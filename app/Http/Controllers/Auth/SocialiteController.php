<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;


use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use Exception;
class SocialiteController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
	public function handleProviderCallback()
    {
        
		    $user = Socialite::driver('google')->user();
            
			$authUser = $this->findOrCreateUser($user,'google');
			Auth::login($authUser, true);
			
			$id 		= $user->getId();
			$name 		= $user->getName();
			$email 		= $user->getEmail();
            $nickname	= $user->getNickname();
            
            $data = [
                'id'        => $id,
                'name'      => $name,
                'email'     => $email,
                'nickname'  => $nickname
            ];
            //return $data ;
			//return response()->json($data);
            return redirect()->route('home')
							->with('id', $id)
							->with('name', $name)
							->with('nickname', $nickname)
							->with('email', $email);
			
        
        
    }
	private function findOrCreateUser($provideruser,$provider)
    {
        $authUser = User::where('email', $provideruser->email)->first();
 
        if ($authUser){
            return $authUser;
        }
        return User::create([
            'name' => $provideruser->name,
            'email' => $provideruser->getEmail(),
            'social_id' => $provideruser->getId(),
			'social_provider' => $provider,
            'avatar' => $provideruser->getAvatar()
        ]);
    }
	 protected function sendFailedResponse($msg = null)
    {
        return redirect()->route('login')
            ->withErrors(['msg' => $msg ?: 'Unable to login, try with another provider to login.']);
    }

}
