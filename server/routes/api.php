<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BusinessCategoryController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});








// Api untuk admin
Route::middleware(['auth:sanctum','admin-middleware'])->group(function() {
        // Route Untuk Business Category
        Route::resource('/business-categories', BusinessCategoryController::class);

        // Route Untuk Outlet
        Route::resource('/outlets', OutletController::class);     

        // Route Untuk User
        Route::resource('/users', UserController::class);  

        // Route Untuk Tax
        Route::resource('/taxes', TaxController::class);
        
});

Route::middleware(['auth:sanctum'])->group(function(){
    // Route Untuk Logout
    Route::get('/logout',[AuthenticationController::class,'logout']);
        
    // Route Untuk Profile
    Route::get('/profile',[AuthenticationController::class,'profile']);
});

// Route untuk Login
Route::post('/login',[AuthenticationController::class,'login']);

