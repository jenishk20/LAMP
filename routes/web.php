<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrainController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\AdminMiddleware;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

//Google Login
Route::get('/login/google',[\App\Http\Controllers\Auth\LoginController::class,'redirectToGoogle'])->name('login.google');
Route::get('/google/callback',[\App\Http\Controllers\Auth\LoginController::class,'handleGoogleCallback']);



//Admin Route
Route::get('/admin',[App\Http\Controllers\AdminController::class,'index'])->middleware(AdminMiddleware::class);
Route::get('/admin/addTrain',[\App\Http\Controllers\AdminController::class,'addTrain']);
Route::get('/admin/addTrip',[\App\Http\Controllers\AdminController::class,'addTrip']);
Route::get('/admin/addStation',[\App\Http\Controllers\AdminController::class,'addStation']);
Route::post('/admin/addTrain/confirm',[\App\Http\Controllers\AdminController::class,'confirmTrain']);
Route::post('/admin/addStation/confirm',[\App\Http\Controllers\AdminController::class,'confirmStation']);
Route::post('/admin/addTrip/confirm',[\App\Http\Controllers\AdminController::class,'confirmTrip']);
Route::get('/admin/showStations',[\App\Http\Controllers\AdminController::class,'showStations']);
Route::get('/admin/showTrains',[\App\Http\Controllers\AdminController::class,'showTrains']);
Route::get('/admin/showTrips',[\App\Http\Controllers\AdminController::class,'showTrips']);


Route::get('/home/myBookings',[TrainController::class,'myBookings'])->middleware('auth');

Route::get('/home',[TrainController::class,'show'])->middleware('auth')->name('home');

Route::get('/home/search',[TrainController::class,'index'])->middleware('auth');

Route::get('/home/search/book/{i}',[TrainController::class,'edit'])->middleware('auth');

//Cancel Ticket Route
Route::get('/home/myBookings/{x}',[TrainController::class,'destroy'])->middleware('auth');


Route::post('/book/confirmation',[TrainController::class,'update'])->middleware('auth');




