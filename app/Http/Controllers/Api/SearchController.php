<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hall;
class SearchController extends Controller
{
    public function search(Request $request){
        $halls = Hall::with('city','images')->whereTranslationLike ('name','%'.$request->name.'%')->get();

        
        foreach($halls as $hall){
            foreach($hall->images as $image){
                $image->image = asset($image->image);
            }
        }
        return response()->json([
            'details'=>$halls

        ]);
    }
    public function filtter(Request $request){
        $halls = Hall::with('city','images')->where('city_id',$request->city_id)->get();
        return response()->json([
            'details'=>$halls
        ]);
    }
}
