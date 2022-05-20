<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    //
    public function index(){
        return view('client.index');
    }

    public function account(){
        $user = Auth::user();
        return view('client.profile.account',compact('user'));
    }
    
    public function updateProfile(Request $request){
        $user = $request->user();

        $user->name = $request->name;
        $user->email = $request->email;
         
        if($request->file('profilePicture')){

            $file = $request->file('profilePicture');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/clientPhoto'),$filename);
            $user['profile_photo_path'] = $filename;

        }

        $user->save();
        return redirect()->route('client.profile')->with('success','Profile updated');
    }
    
    public function editPassword(Request $request){
        $user = $request->user();

        if (Hash::check($request->input('oldPassword'), $user['password']) && $request->input('newPassword')==$request->input('confirmPassword')) {
            $user->password = Hash::make($request->input('newPassword'));
            $user->save();
            return redirect()->route('client.profile')->with('success','Profile updated');
        }
                  
        return redirect()->route('client.profile')->with('error','Please verify your information');
    }
}
