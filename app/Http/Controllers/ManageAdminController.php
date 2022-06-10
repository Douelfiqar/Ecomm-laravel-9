<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageAdminController extends Controller
{
    //
    public function Index(Request $request){
        $user = $request->user();
       dd($user->roles());
        return view('admin.superAdmin.manage',compact('user'));
    } 
}
