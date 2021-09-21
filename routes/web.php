<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\VehicleController;

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
//Route::get('/dashboard',[DashController::class,'dash']);


//Register
Route::get('/register',[UserController::class,'registerView']);
Route::post('/register',[UserController::class,'registration']);



//AdminLogin
Route::get('/', function () {
    return view('welcome');
})->name('login');
Route::post('/post',[UserController::class,'login']);
Route::post('/logout',[UserController::class,'logout']);


Route::get('verifyuser/{slug}',[UserController::class,'verifymail'])->name('verify');

Route::get('forgotPassword',[UserController::class,'forgotpassword']);
Route::post('forgotPassword',[UserController::class,'reset']);

Route::get('resetPassword/{slug}',[UserController::class,'resetPassword']);
Route::post('resetPassword/{slug}',[UserController::class,'postResetPassword']);


//products

//    Route::middleware('auth')->group(function ()
//    {
//        Route::get('products.all',[VehicleController::class,'productShow']);
//        Route::get('indVeh/{slug}',[VehicleController::class,'vehicleShow']);
//        Route::get('products.update/{slug}',[VehicleController::class,'editProduct']);
//        Route::post('updateProduct/{slug}',[VehicleController::class,'update']);
//
//    });

//    Route::middleware(['auth','admin'])->group(function ()
//    {
//        Route::get('products.create',[VehicleController::class,'createProduct']);
//        Route::post('submitProduct',[VehicleController::class,'submitProduct']);
//        Route::get('indDel/{slug}',[VehicleController::class,'vehicleDelete']);
//    });