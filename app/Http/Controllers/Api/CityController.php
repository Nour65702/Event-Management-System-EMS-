<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
class CityController extends Controller
{
    public function cities(){
        $cities = City::all();
        return response()->json([
            'details' => $cities
        ]);
    }
}
