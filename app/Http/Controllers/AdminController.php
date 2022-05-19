<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index(){
        $user = Auth::user();

        return view('admin.dynamiquePart',compact('user'));
    }


    public function infoProfile(){
        $user = Auth::user();

        return view('admin.profile.profileInfo',compact('user'));
    }

    public function editProfile(){
        $user = Auth::user();

        return view('admin.profile.editProfile',compact('user'));
    }

    public function updateProfile(Request $request){
        $user = User::find(1);

        $user->name = $request->name;
        $user->email = $request->email;
         
        if($request->file('profilePicture')){

            $file = $request->file('profilePicture');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/adminPhoto'),$filename);
            $user['profile_photo_path'] = $filename;

        }

        $user->save();
        return redirect()->route('profile')->with('success','Profile updated');
    }


    public function updatePassword(){
       $user = Auth::user();
        return view('admin.profile.updatePassword',compact('user'));
    }

    public function editPassword(Request $request){
        $user = User::find(1);

        if (Hash::check($request->input('oldPassword'), $user['password']) && $request->input('newPassword')==$request->input('confirmPassword')) {
            $user->password = Hash::make($request->input('newPassword'));
            $user->save();
            return redirect()->route('profile')->with('success','Profile updated');
        }
                  
        return redirect()->back()->with('error','Please verify your information');
    }
}
