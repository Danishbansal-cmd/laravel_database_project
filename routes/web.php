<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userdataController;

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

Route::get('/getuserdata',[userdataController::class, 'index']);
Route::get('/deleteuserdata/{data}',[userdataController::class, 'delete']);
Route::get('/edituserdata/{data}',[userdataController::class, 'edit']);
Route::post('/edituserdataaction',[userdataController::class, 'editaction']);
Route::get('/adduser',function(){
    return view('adduserdatapage');
});
Route::post('/adduser',[userdataController::class, 'adduser']);
Route::post('/delete',[userdataController::class, 'deletemultiple']);