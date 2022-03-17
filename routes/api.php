<?php

use App\Http\Controllers\CitiesController;
use App\Http\Controllers\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::post('/register', [passportAuthController::class,'registerUserExample']);
// Route::post('/login', [passportAuthController::class,'loginUserExample']);

// Route::get('login', function() { return view('components.auth.login'); });
// Route::post('login',[passportAuthController::class,'loginUserExample']);

// Route::get('register', function() { return view('components.auth.register'); });
// Route::post('register',[passportAuthController::class,'registerUserExample']);

Route::post('api/fetch-states', [CitiesController::class, 'fetchState']);
Route::post('api/fetch-cities', [CitiesController::class, 'fetchCity']);
Route::post('api/create-brand', [VehicleController::class, 'create_brand']);
Route::post('api/create-vehicle-model', [VehicleController::class, 'create_vehicle_model']);
Route::post('api/fetch-vehicle-model', [VehicleController::class, 'fetch_vehicle_model']);
Route::get('api/fetch-vehicle-model', [VehicleController::class, 'fetch_vehicle_model']);

Route::group(['middleware' => ['auth', 'web']], function() {
    Route::get('api/fetch-brand', [VehicleController::class, 'fetch_brand']);
    // Route::get('api/fetch-vehicle-model', [VehicleController::class, 'fetch_vehicle_model']);
    Route::post('api/create-vehicle-model', [VehicleController::class, 'create_vehicle_model']);
});