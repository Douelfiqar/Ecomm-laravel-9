<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    //
    public function index($id){

        $order = Order::where('id_client',$id)->get();



        Nexmo::message()->send([
            'to' => '212696307442',
            'from' => 'Flipmart',
            'text' => 'You commande'.$order->id.' has been confirmed. Thank you for your purchase on flipmart'
        ]);

        return redirect()->route('home');
    }
}
