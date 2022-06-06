<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewAdminController extends Controller
{
    //

    public function displayReview(){

        $users = User::all();
        return view('admin.review.manageReview',compact('users'));
    }


    public function getReviews(){

        $reviews = Review::all();
        return response()->json(['reviews'=> $reviews]);
    }
    

    
    public function status($id){
        $review = Review::find($id);

        if($review->status == 'Invalid'){
            $review->update([
                'status' => 'Valid'
        ]);
        }else{
            $review->update([
                'status' => 'Invalid'
        ]);     
       }

        $review->save();

        return response()->json(['reviews'=> 'status is updated successfully']);
    }
 
    public function deleteReview($id){

        $review = Review::find($id);

        $review->delete();

        return response()->json(['reviews'=> 'review is deleted successfully']);

    }
}
