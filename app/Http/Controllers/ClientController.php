<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\RoleUser;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    //
    public function index(Request $request){

        $categories = Category::all();
        $brands = Brand::all();
        $slides = Slider::where('status','1')->orderBy('id','DESC')->limit(3)->get();
        $products = Product::where('status','1')->orderBy('id','DESC')->limit(6)->get();
        $HotDeals = Product::where('hot_deals','1')->whereNotNull('discount_price')->where('status','1')->orderBy('id','DESC')->limit(3)->get();

        $SpecialOffers = Product::where('special_offer','1')->whereNotNull('discount_price')->where('status','1')->orderBy('id','DESC')->limit(3)->get();

if(Auth::check()){
    $roleUserId = Auth::user()->id;

    $role =  RoleUser::where('user_id', $roleUserId)->first();

    
    if($role == NULL){
        $roleDB = new RoleUser();
        $roleDB->user_id = Auth::user()->id;
        $roleDB->role_id = 2;
        $roleDB->save();
    }
    
}


        $admin = false;

        if(Auth::check()){
            
            $userR = $request->user()->roles()->get();


            foreach($userR as $u){
                if($u->name == 'admin' || $u->name == 'SUPERADMIN'){
                    $admin = true;
                }  
            }
        }

        $Featureds = Product::inRandomOrder()->where('status','1')
                    ->limit(6)
                    ->get();

        $SpecialDeals = Product::where('special_deals','1')->where('status','1')->whereNotNull('discount_price')->orderBy('id','DESC')->limit(3)->get();

        $Electroniques =  Product::inRandomOrder()->where('category_id',8)->where('status','1')->where('status','1')
        ->limit(6)
        ->get();

        $bestSeller1 = Product::inRandomOrder()->where('status','1')
        ->limit(2)
        ->get();

        $bestSeller2 = Product::inRandomOrder()->where('status','1')
        ->limit(2)
        ->get();

        $bestSeller3 = Product::inRandomOrder()->where('status','1')
        ->limit(2)
        ->get();

        $bestSeller4 = Product::inRandomOrder()->where('status','1')
        ->limit(2)
        ->get();

        $beauties = Product::inRandomOrder()->where('category_id',11)->where('status','1')->limit(6)->get();


        return view('client.index',compact('categories','slides','products','HotDeals','SpecialOffers','Featureds','Electroniques','SpecialDeals','admin','bestSeller1','bestSeller2','bestSeller3','bestSeller4','beauties','brands'));
    }

    public function account(Request $request){
        
        $user = Auth::user();
        $categories = Category::all();
        $admin = false;
        if(Auth::check()){
            if($request->user()->roles()->first()->name == 'admin'){
                $admin = true;
            };
        }
        return view('client.profile.account',compact('user','categories','admin'));
    }
    
    public function updateProfile(Request $request){
        $user = $request->user();

        $user->name = $request->name;
        $user->email = $request->email;

        $admin = false;
        if(Auth::check()){
            if($request->user()->roles()->first()->name == 'admin'){
                $admin = true;
            };
        }
        if($request->file('profilePicture')){

            $file = $request->file('profilePicture');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/clientPhoto'),$filename);
            $user['profile_photo_path'] = $filename;

        }

        $user->save();
        return redirect()->route('client.profile')->with('success','Profile updated','admin');
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

    public function deleteAccount(){

        $user = Auth::user();
        $user->delete();

        return redirect()->route('home');
    }
}
