<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\GuiaController;

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

Route::controller(LoginController::class)->group(function(){
    Route::post('login', 'login');
    Route::get('registro', 'register');

});

Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    
    return response()->json([
            'status' => true,
            'message' => "Post Deleted successfully!",
        ], 200);
});


Route::middleware('auth:sanctum')->group(function(){

    Route::controller(GuiaController::class)->group(function(){
        Route::get('ltds', 'creacion');
    });

});

});