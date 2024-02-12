<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
    Route::post('/login' , [AuthController::class , 'login']);
    Route::get('/logout' , [AuthController::class , 'logout'])->name('logout');
    Route::get('/home' , [HomeController::class , 'index']);
    Route::get('/users' , [UserController::class , 'users']);
    Route::get('/deleteUser/{id}' , [UserController::class , 'deleteUser']);
    Route::get('/providers' , [UserController::class , 'providers']);
    Route::get('/requestProvider' , [UserController::class , 'requestProvider']);
    Route::get('/accept/{id}' , [UserController::class , 'accept']);
    Route::get('/blocked' , [UserController::class , 'blocked']);
    Route::get('/blockProvider/{id}' , [UserController::class , 'blockProvider']);
    
// halls
    Route::get('/halls' , [HallController::class , 'halls']);
    Route::get('/moreDetails/{hall_id}' , [HallController::class , 'moreDetails']);
    Route::get('/deleteHall/{hall_id}' , [HallController::class , 'deleteHall']);
// halls 
// notifications
    Route::get('/notifications' , [NotificationController::class , 'notifications']);
// notifications

//cities
    Route::get('/cities' , [CityController::class , 'cities']);
    Route::post('/addCity' , [CityController::class , 'addCity']);
    Route::post('/updateCity/{city_id}' , [CityController::class , 'updateCity']);
    Route::get('/deleteCity/{city_id}' , [CityController::class , 'deleteCity']);
//cities

//bookings
    Route::get('/bookings' , [BookingController::class , 'bookings']);
    Route::get('/deleteBooking/{book_id}' , [BookingController::class , 'deleteBooking']);
//bookings 
//reviews
    Route::get('/reviews' , [ReviewController::class , 'reviews']);
    Route::get('/deleteReview/{rev_id}' , [ReviewController::class , 'deleteReview']);
//reviews deleteReview
Route::get('/change-language/{locale}', function ($locale) {
    App::setLocale($locale);
      session()->put('locale', $locale);
      return redirect()->back();
  });