<?php

use App\Http\Controllers\DisastersController;
use App\Http\Controllers\DisasterTypesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login',[UsersController::class,'login']);
Route::post('/register',[UsersController::class,'register']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/logout',[UsersController::class,'logout']);
    Route::get('/disasters',[DisastersController::class,'index']);
    Route::post('/disasters',[DisastersController::class,'store']);
    Route::get('/disasters/{id}',[DisastersController::class,'show']);
    Route::put('/disasters/{id}',[DisastersController::class,'update']);
    Route::delete('/disasters/{id}',[DisastersController::class,'delete']);

    Route::post('/disaster/types',[DisasterTypesController::class,'store']);
});

// Route::resource('/disasters',DisastersController::class);
