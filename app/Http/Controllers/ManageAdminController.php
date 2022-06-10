<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ManageAdminController extends Controller
{
    //
    public function Index(Request $request){
        $userR = $request->user()->roles()->get();

        $SUPER = FALSE;
        foreach($userR as $u){
            if($u->name == 'SUPERADMIN'){
                $SUPER = TRUE;
            }
        }

        $user = Auth::user();

        return view('admin.superAdmin.manageAdmins',compact('user','SUPER'));
    } 

    public function getAdmins(){

      $users =  DB::table('users')
        ->join('role_user','role_user.user_id','=','users.id')
        ->where('role_id' ,'1')
        ->get();

            return response()->json(['data'=>$users]);
    }
}
