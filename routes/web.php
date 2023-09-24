<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustController;
use App\Http\Controllers\OrderController; 

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
    return view('auths.login');
});

Route::post('postlogin',[AuthController::class, 'postlogin']);
Route::get('register',[AuthController::class, 'register']);
Route::post('postregister',[AuthController::class, 'postregister']);
Route::get('/logout', [AuthController::class, 'Logout']);
Route::get('/login', [AuthController::class, 'login']);


Route::get('dashboard',[DashboardController::class, 'index']);

Route::get('/cars',[CarsController::class, 'index']);
Route::post('/cars/store',[CarsController::class, 'store']);
Route::post('/cars/update',[CarsController::class, 'update']);
Route::get('/cars/edit/{id}',[CarsController::class, 'edit']);
Route::get('/cars/detail/{id}',[CarsController::class, 'detail']);
Route::post('/cars/delete/{id}',[CarsController::class, 'delete']);

Route::get('/cust',[CustController::class, 'index']);
Route::post('/cust/store',[CustController::class, 'store']);
Route::post('/cust/update',[CustController::class, 'update']);
Route::get('/cust/edit/{id}',[CustController::class, 'edit']);
Route::post('/cust/delete/{id}',[CustController::class, 'delete']);

Route::get('/order',[OrderController::class, 'index']);
Route::post('/order/store',[OrderController::class, 'store']);