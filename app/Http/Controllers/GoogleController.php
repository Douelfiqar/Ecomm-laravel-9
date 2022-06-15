<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callbackFromGoogle()
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();


            // dd($user->name);
            //Check Users Email If Already There

            $is_user = User::where('email', $user->getEmail())->first();

            if(!$is_user){

                $saveUser = User::create([
                    'google_id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make($user->name.'@'.$user->id)
                ]);
                    
                Auth::loginUsingId($saveUser->id);

            }else{
                
                $saveUser = User::where('email',  $user->email)->update([
                    'google_id' => $user->id,
                ]);
                $saveUser = User::where('email', $user->email)->first();
                Auth::loginUsingId($saveUser->id);

            }


            
           return redirect()->route('home');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
