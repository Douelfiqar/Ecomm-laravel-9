<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //

    public function IndexUsers(){

        $user = Auth::user();
        return view('admin.users.manageUsers',compact('user'));

    }

    public function getUsers(){
        
        $users = User::all();
        return response()->json(['users'=> $users]);
    }

    public function deleteUsers($id){

        $user = User::find($id);
        $user->delete();

        return response()->json(['users'=> 'user deleted succesfully']);

    }
}
