<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeParty;

class TypePartyController extends Controller
{
    public function types(){
        $types = TypeParty::all();
         
        foreach($types as $typeparty){
                $typeparty->image = asset($typeparty->image);
        }
    
        return response()->json([
            'details'=> $types
        ]);
    }
}
