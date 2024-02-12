<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Hall;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => []]);
    }
    public function addReview(Request $request){
        $review = Review::where('user_id',$request->user_id)->first();
        if($review == null){
            $data = [
                'user_id' => $request->user_id,
                'hall_id' => $request->hall_id,
                'rate'    => $request->rate,
                'comment' => $request->comment
            ];
            Review::create($data);
        }else{
            $data = [
                'user_id' => $request->user_id,
                'hall_id' => $request->hall_id,
                'rate'    => $request->rate,
                'comment' => $request->comment
            ];
            $review->update($data);
        }

        $avg = Review::where('hall_id',$request->hall_id)->avg('rate');
        $hall = Hall::find($request->hall_id);
        $hall->rate = $avg;
        $hall->save();
        return response()->json([
            'details' => $data
        ]);
    }
    public function myReview(Request $request){
        $reviews = Review::with('user')->where('user_id',Auth::id())->where('hall_id',$request->id)->get();
        return response()->json([
            'details' => $reviews
        ]);
    }
}
