<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
class NotificationController extends Controller
{
    public function __construct()
     {
         $this->middleware('auth');
     }
    public function notifications(){
        $notifications = Notification::with('user')->get();
        return view('notification.notifications',compact('notifications'));
    }
}
