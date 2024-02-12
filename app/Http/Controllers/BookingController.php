<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
class BookingController extends Controller
{
     public function __construct()
     {
         $this->middleware('auth');
     }
    public function bookings(){
        $bookings = Reservation::with('hall','user','category')->get();
       
        // return $bookings;
        return view('booking.booking',compact('bookings'));
    }
    public function deleteBooking($book_id){
        $booking = Reservation::find($book_id)->delete();
        return redirect()->back()->with('message','deleted successfully');
    }
}
