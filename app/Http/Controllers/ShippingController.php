<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Order;
use App\Models\Country;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{
    //
    public function allOrder(){
        $orders = Order::latest()->paginate(7);
        $countries = Country::all();
        $cities = City::all();
        $user = Auth::user();        return view('admin.shipping.shippingIndex',compact('orders','countries','cities','user'));
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
