<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Models\City;

class ShippingController extends Controller
{
    //
    public function allOrder(){
        $orders = Shipping::all();
        $countries = Country::all();
        $cities = City::all();
        return view('admin.shipping.shippingIndex',compact('orders','countries','cities'));
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
}
