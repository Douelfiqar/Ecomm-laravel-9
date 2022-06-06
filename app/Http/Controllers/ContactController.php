<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    //
    public function index(Request $request){
        $admin = false;
        if(Auth::check()){
            if($request->user()->roles()->first()->name == 'admin'){
                $admin = true;
            };
        }
        $categories = Category::all();

        return view('client.contact.contact',compact('admin','categories'));
    }

    public function contact(Request $request){

        $contact = new Contact();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->title = $request->title;
        $contact->comment = $request->comment;
        $contact->idClient = Auth::user()->id;
        $contact->save();
        
        return response()->json(['response','success']);
    }
}
