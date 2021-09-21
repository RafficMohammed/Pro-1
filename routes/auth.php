<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;


Route::get('products.all',[VehicleController::class,'productShow']);
Route::get('indVeh/{slug}',[VehicleController::class,'vehicleShow']);
Route::get('products.update/{slug}',[VehicleController::class,'editProduct']);
Route::post('updateProduct/{slug}',[VehicleController::class,'update']);
