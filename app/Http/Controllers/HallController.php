<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hall;
use App\Models\HallImage;
class HallController extends Controller
{
     public function __construct()
     {
         $this->middleware('auth');
     }
    public function halls(){
        $halls = Hall::with('provider','city')->get();
        return view('hall.halls',compact('halls'));
    }
    public function moreDetails($hall_id){
        $images = HallImage::where('hall_id',$hall_id)->get();
        return view('hall.more-details',compact('images'));
    }
    public function deleteHall($hall_id){
        $hall = Hall::find($hall_id)->delete();
        return redirect()->back()->with('message','deleted successfully');
    }
}
