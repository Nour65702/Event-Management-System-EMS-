<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
class UserController extends Controller
{
     public function __construct()
     {
         $this->middleware('auth');
     }
    public function users(){
        $users = User::where('type','user')->get();
        return view('user.user',compact('users'));
    }
    public function deleteUser($user_id){
        $user = User::find($user_id)->delete();
        return redirect()->back()->with('message','deleted successfully');
    }
    public function providers(){
        $providers = User::where('type','provider')->where('status','1')->get();
        return view('provider.provider',compact('providers'));
    }
    public function requestProvider(){
        $providers = User::where('type','provider')->where('status','0')->get();
        return view('provider.request-provider',compact('providers'));
    }
    public function accept($id){
        $provider = User::find($id);
        $provider->status = '1';
        $provider->save();
        $data = [
            'user_id' => $id,
            'notification' => 'تم تنشيط حسابك ...'
        ];
        Notification::create($data);
        return redirect()->back();
    }
    public function blockProvider($provider_id){
        $provider = User::find($provider_id);
        $provider->status = '2';
        $provider->save();
        $data = [
            'user_id' => $provider_id,
            'notification' => 'تم حظر حسابك ...'
        ];
        Notification::create($data);
        return redirect()->back();
    }
    public function blocked(){
        $providers = User::where('status','2')->get();
        return view('provider.blocked',compact('providers'));
    }
}
