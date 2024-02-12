<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
class ReservationController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => []]);
    }
    public function booking(Request $request){
        $data = [
            'user_id'     => $request->user_id,
            'hall_id'     => $request->hall_id,
            'luxury'      => $request->luxury,
            'size'        => $request->size,
            'time'        => $request->time,
            'type'        => $request->type,
            'total_price' =>$request->total_price,
            'status'      => '0'
        ];
        Reservation::create($data);
        return response()->json([
            'details' => 'الرجاء الانتظار حتى يتم القبول'
        ]);
    }
    public function myBooking(Request $request){
         $bookings = Reservation::where('hall_id',$request->hall_id)->get();
         // $bookings = Reservation::with('hall_id')->get();
           return response()->json([
            'details' => $bookings
        ]);
    }
}
