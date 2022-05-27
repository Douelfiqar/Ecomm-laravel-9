<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LangClientController extends Controller
{
    //

    public function langEng(){

       session()->get('lang');
        session()->forget('lang');
        Session::put('lang', 'english');
        return redirect()->back();
    }

    public function langFr(){

        session()->get('lang');
        session()->forget('lang');
        Session::put('lang', 'francais');
        return redirect()->back();

     }
}
