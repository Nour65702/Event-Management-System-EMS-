<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hall;
use App\Models\HallImage;
use App\Models\LuxuryLavel;
use Illuminate\Support\Facades\Storage;
use Image;
class HallController extends Controller
{
    public function allHalls(){
        $halls = Hall::with('provider','city','images')->get();
        
        foreach($halls as $hall){
            foreach($hall->images as $image){
                $image->image = asset($image->image);
            }
        }

        return response()->json([
            'details' => $halls
        ]);
    }
    public function hallDetails(Request $request){
        $hall = Hall::with('provider','city','images')->find($request->id);
        foreach($hall->images as $image){
            $image->image = asset($image->image);
        }
        return response()->json([
            'details' => $hall
        ]);
    }
    public function addhall(Request $request){
        $data = [
            'provider_id' => $request->provider_id,
            'location'  => $request->location,
            'type'      => $request->type,
            'star'      => $request->star,
            'city_id'   => $request->city_id,
            'luxury'    => $request->luxury,
            'status'    => '1',
            'ar' => [
                'name' => $request -> name_ar,
            ],
            'en' => [
                'name' => $request -> name_en,
            ],
        ];
        $hall = Hall::create($data);
        $luxury_top = new LuxuryLavel;
        $luxury_top->lavel = '1';
        $luxury_top->price = $request->top_price;
        $luxury_top->save();
        $luxury_down = new LuxuryLavel;
        $luxury_down->lavel = '2';
        $luxury_down->price = $request->down_price;
        $luxury_down->save();
        if($request->file('image')){
            $path = 'images/hall/';
            $files=$request->file('image');

            foreach($files as $file) {
 
                $input['image'] = $file->getClientOriginalName();
                $destinationPath = 'images/hall/';
                
                $img = Image::make($file->getRealPath());
                $img->resize(800, 750, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path.$input['image']);
                $name = $path.$input['image'];
                HallImage::insert( [
                    'image'=>  $name,
                    'hall_id'=> $hall->id,
                ]);

            }
        }
        return response()->json([
            'details' => 'added successfully'
        ]);

    }
    public function updateHall(Request $request){
        $hall = Hall::find($request->id);
        $data = [
            'provider_id' => $request->provider_id,
            'location'    => $request->location,
            'type'        => $request->type,
            'luxury'      => $request->luxury,
            'star'        => $request->star,
            'city_id'     => $request->city_id,
            'status'      => '1',
            'ar' => [
                'name' => $request -> name_ar,
            ],
            'en' => [
                'name' => $request -> name_en,
            ],
        ];
        $hall->update($data);
        $hall_images = HallImage::where('hall_id',$request->id)->delete();
        if($request->file('image')){
            $path = 'images/hall/';
            $files=$request->file('image');

            foreach($files as $file) {
 
                $input['image'] = $file->getClientOriginalName();
                $destinationPath = 'images/hall/';
                
                $img = Image::make($file->getRealPath());
                $img->resize(800, 750, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path.$input['image']);
                $name = $path.$input['image'];
                HallImage::insert( [
                    'image'=>  $name,
                    'hall_id'=> $hall->id,
                ]);

            }
        }
        return response()->json([
            'details' => 'updated successfully'
        ]);

    }
    public function deleteHall(Request $request){
        $hall = Hall::find($request->id)->delete();
        return response()->json([
            'details' => 'deleted successfully'
        ]);
    }
}
