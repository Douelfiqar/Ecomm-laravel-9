<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GithubAuthController extends Controller
{

    public function githubAuth()
    {
        return Socialite::driver('github')->stateless()->redirect();
    }
       

    public function callbackGithub()
    {
        try {
     
            $user = Socialite::driver('github')->stateless()->user();

      
            $findUser = User::where('github_id', $user->id)->first();
      
            if($findUser){
      
                Auth::login($findUser);
     
                return redirect('/client/home');
      
            }else{
                // dd($user);
                $user = User::create([
                    'name' => $user->nickname,
                    'email' => $user->email,
                    'github_id'=> $user->id,
                    'oauth_type'=> 'github_oauth',
                    'password' => encrypt('555555555555')
                ]);
     
                RoleUser::create([
                    'user_id' => $user->id,
                    'role_id' => 2
                ]);
                
                Auth::login($user);
      
                return redirect('/client/home');
            }
        }
            catch (\Throwable $th) {
                throw $th;
            }
    }
}
