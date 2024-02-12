<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HallController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\TypePartyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([ 'middleware' => 'api' , 'prefix' => 'auth' ] , function() {
    Route::post('/register' , [AuthController::class , 'register']);
    Route::post('/login' , [AuthController::class , 'login']);
    Route::post('/logout' , [AuthController::class , 'logout']);
});

// start HallController
Route::get('/allHalls' , [HallController::class , 'allHalls']);
Route::post('/hallDetails' , [HallController::class , 'hallDetails']);
Route::post('/addhall' , [HallController::class , 'addhall']);
Route::post('/updateHall' , [HallController::class , 'updateHall']);
Route::post('/deleteHall' , [HallController::class , 'deleteHall']);
// end HallController 

//start CityController
Route::get('/allCities' , [CityController::class , 'cities']);
// end CityController

// start ReviewController 
Route::post('/addReview' , [ReviewController::class , 'addReview']);
Route::get('/myReview' , [ReviewController::class , 'myReview']);
// end ReviewController 

// search
Route::post('/search' , [SearchController::class , 'search']);
Route::post('/filtter' , [SearchController::class , 'filtter']);
//search

//Reservation
Route::post('/booking' , [ReservationController::class , 'booking']);
Route::get('/myBooking' , [ReservationController::class , 'myBooking']);
//Reservation 
//categories
Route::get('/types' , [TypePartyController::class , 'types']);
//categories
