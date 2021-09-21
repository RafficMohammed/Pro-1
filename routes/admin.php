<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;


Route::get('products.create',[VehicleController::class,'createProduct']);
Route::post('submitProduct',[VehicleController::class,'submitProduct']);
Route::get('indDel/{slug}',[VehicleController::class,'vehicleDelete']);
