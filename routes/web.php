<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApiController;

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
Route::get('/', function(){
    return 'testPrayas';
});
Route::get('/hello', function () {
    return view('welcome');
});

Route::get('test', function () {
    return view('test');
});

 
Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/api',[ApiController::class,'show']);
Route::get('/submitSummary',[ApiController::class,'submitSummary']);