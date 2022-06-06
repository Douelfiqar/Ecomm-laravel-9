<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Order;
use App\Models\User;

class ShippingController extends Controller
{
    //
    public function allOrder(){
        $orders = Order::latest()->paginate(7);
        $countries = Country::all();
        $cities = City::all();
        $users = User::all();
        return view('admin.shipping.shippingIndex',compact('orders','countries','cities','users'));
    }

    public function addCountry(Request $request){
        
        $country = new Country();

        $country->name = $request->name;
        $country->save();

        return redirect()->back();
    }

    public function addCity(Request $request){

        $city = new City();

        $city->name = $request->name;
        $city->country_id = $request->country_id;
        $city->save();

        return redirect()->back();
    }

    public function status($id){

        $Order = Order::find($id);

        if($Order->Status == "Invalid"){

            $Order->Status = "Valid";

        }else{
            $Order->Status = "Invalid";

        }

        $Order->save();

        return redirect()->back();
    }

}
