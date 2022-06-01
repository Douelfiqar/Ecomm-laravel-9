<?php

namespace App\Http\Controllers\frontend;

use App\Models\City;
use App\Models\User;
use App\Models\Country;
use App\Models\Category;
use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    //
    public function indexCheckout(Request $request){
        $admin = false;
        if(Auth::check()){
            if($request->user()->roles()->first()->name == 'admin'){
                $admin = true;
            };
        }
        $users = User::all();
        $categories = Category::all();
        $countries = Country::all();
        return view('client.checkout.Check_out',compact('users','categories','admin','countries'));
    }

    public function getAllIteams(){

        $carts = Cart::content();

        return response()->json([
            'carts' => $carts,
        ]);


    }

    public function dataShipping(Request $request){

        $shipping = new Shipping();
        $shipping->id_user = Auth::id();
        $shipping->first_name = $request->first_name;
        $shipping->last_name = $request->last_name;
        $shipping->email = $request->address;
        $shipping->address = $request->country;
        $shipping->country = $request->city;
        $shipping->city = $request->code_postal;
        $shipping->code_postale = $request->phone_number;

        $shipping->save();
        return redirect()->route('home');
    }

    public function getCounties($id){
            $cities = City::where('country_id',$id)->get();
        return response()->json(['cities'=>$cities]);

    }
}