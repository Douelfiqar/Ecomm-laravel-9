<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //
    public function review(Request $request){

        $review = new Review();

        $review->summary = $request->summary;
        $review->comment = $request->comment;
        $review->product_id = $request->product_id;
        $id = Auth::user()->id;
        $review-> user_id = $id;
        $user = User::find($id);
        $review->user_name = $user->name;
        $review->picture_path = $user->profile_photo_path;

        $review->save();

        return redirect()->back();

    }
}
