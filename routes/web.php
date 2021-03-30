<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrainController;
use App\Http\Middleware\Admin;
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
Route::get('/admin',[App\Http\Controllers\AdminController::class,'index'])->middleware('Admin');

Route::get('/home',[TrainController::class,'show']);

Route::get('/home/search',[TrainController::class,'index']);

Route::get('/home/search/book/{i}',[TrainController::class,'edit']);

Route::get('/book/confirmation',[TrainController::class,'update']);
