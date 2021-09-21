<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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



Route::post('/post',[UserController::class,'login']);
Route::post('/logout',[UserController::class,'logout']);



Route::group(['middleware' => 'auth:api'],function ()
{
    Route::get('products.all',[VehicleController::class,'productShow']);
Route::get('indVeh/{slug}',[VehicleController::class,'vehicleShow']);
Route::get('products.update/{slug}',[VehicleController::class,'editProduct']);
Route::post('updateProduct/{slug}',[VehicleController::class,'update']);

});

// Route::group(['middleware' => 'admin:api'],function()
// {
// Route::get('products.create',[VehicleController::class,'createProduct']);
// Route::post('submitProduct',[VehicleController::class,'submitProduct']);
// Route::get('indDel/{slug}',[VehicleController::class,'vehicleDelete']);
// })