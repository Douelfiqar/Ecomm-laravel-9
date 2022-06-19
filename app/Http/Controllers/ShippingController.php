<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Models\Country;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{
    //
    public function allOrder(){
        $orders = Order::latest()->paginate(7);
        $countries = Country::all();
        $cities = City::all();
        $user = Auth::user();   
             return view('admin.shipping.shippingIndex',compact('orders','user'));
    }

    public function addCountry(Request $request){
        
        $country = new Country();
        $country->name = $request->Country;
        $country->save();

        return response()->json(['country',$request->Country]);
    }

    public function addCity(Request $request){

        $city = new City();

        $city->name = $request->City;
        $city->country_id = $request->Country;
        $city->save();

        return response()->json(['added','succcessfully']);
    }

    public function status($id){

        $Order = Order::find($id);

        if($Order->Status == "Invalid"){

            $Order->Status = "Valid";

            Nexmo::message()->send([
                'to' => '212696307442',
                'from' => 'Flipmart',
                'text' => 'Your commande '.$Order->id.'  has been confirmed. Thank you for your purchase on flipmart.     '
            ]);

        }else{
            $Order->Status = "Invalid";
        }

        $Order->save();


       


        return redirect()->back();
    }

    public function getCountries(){

        $countries = Country::all();
        $cities = City::all();

        return response()->json(['countries'=>$countries,'cities'=>$cities]);
    }

    public function removeCity($id){

        $city = City::find($id);
        $city->delete();

        return response()->json(['success','deleted']);
    }
    
    public function removeCountry($id){

        $city = Country::find($id);
        $city->delete();

        return response()->json(['success','deleted']);
    }

    public function getOrders(){
        $orders = Order::latest();

        return response()->json(['orders'=>$orders]);
    }
   
}
