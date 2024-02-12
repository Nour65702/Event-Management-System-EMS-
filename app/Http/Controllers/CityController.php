<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
class CityController extends Controller
{
     public function __construct()
     {
        $this->middleware('auth');
     }
    public function cities(){
        $cities = City::all();
        return view('city.cities',compact('cities'));
    }
    public function addCity(Request $request){
        $data = [
            'name' =>$request->name
        ];
        City::create($data);
        return redirect()->back()->with('message','added successfully');
    }
    public function updateCity(Request $request,$city_id){
        $city = City::find($city_id);
        $city->name = $request->name;
        $city->save();
        return redirect()->back()->with('message','updated successfully');
    }
    public function deleteCity ($city_id){
        $city = City::find($city_id)->delete();
        return redirect()->back()->with('message','deleted successfully');
    }
}
