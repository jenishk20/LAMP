<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrainController;
use App\Http\Middleware\Admin;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});


Auth::routes();

//Admin Route
Route::get('/admin',[App\Http\Controllers\AdminController::class,'index']);
Route::get('/admin/addTrain',[\App\Http\Controllers\AdminController::class,'addTrain']);
Route::get('/admin/addTrip',[\App\Http\Controllers\AdminController::class,'addTrip']);
Route::get('/admin/addStation',[\App\Http\Controllers\AdminController::class,'addStation']);
Route::get('/admin/addTrain/confirm',[\App\Http\Controllers\AdminController::class,'confirmTrain']);
Route::get('/admin/addStation/confirm',[\App\Http\Controllers\AdminController::class,'confirmStation']);
Route::get('/admin/addTrip/confirm',[\App\Http\Controllers\AdminController::class,'confirmTrip']);
Route::get('/admin/showStations',[\App\Http\Controllers\AdminController::class,'showStations']);
Route::get('/admin/showTrains',[\App\Http\Controllers\AdminController::class,'showTrains']);
Route::get('/admin/showTrips',[\App\Http\Controllers\AdminController::class,'showTrips']);

Route::get('/home',[TrainController::class,'show']);

Route::get('/home/search',[TrainController::class,'index']);

Route::get('/home/search/book/{i}',[TrainController::class,'edit']);

Route::get('/book/confirmation',[TrainController::class,'update']);


//Send Mail to User
Route::post('/book/confirmation',function(Request $request){
    Mail::send(new \App\Mail\ContactMail($request));
    return view('/home')->with('message','We have received your response, Thank You for your feedback.');
});
