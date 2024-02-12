<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
class ReviewController extends Controller
{
     public function __construct()
    {
         $this->middleware('auth');
     }
    public function reviews(){
        $reviews = Review::with('user','halls')->get();
        // return  $reviews;
        return view('reviews.reviews',compact('reviews'));
    }
    public function deleteReview($rev_id){
        $review = Review::find($rev_id)->delete();
        return redirect()->back();
    }
}
