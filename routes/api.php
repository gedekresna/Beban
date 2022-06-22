<?php

use App\Http\Controllers\DisastersController;
use App\Http\Controllers\DisasterTypesController;
use App\Http\Controllers\PublicController;
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

// This is used to store public API's
Route::prefix('public')->group(function(){
    Route::get('/disasters/count', [PublicController::class, 'countDisasters']);
    Route::get('/disasters', [PublicController::class, 'getDisasters']);
    Route::get('/disaster-types', [PublicController::class, 'getDisasterTypes']);
    // Route::get('/disaster/{disasterId}/type/{typeId}', [PublicController::class, 'reportDisaster']);
});

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/logout',[UsersController::class,'logout']);
    Route::get('/user',[UsersController::class,'show']);
    Route::apiResource('/disasters', DisastersController::class)->parameters([
        'disasters' => 'id'
    ]);
    Route::apiResource('/disaster-types', DisasterTypesController::class)->parameters([
        'disaster-types' => 'id'
    ]);
    Route::post('/disasters/{id}/report', [DisastersController::class, 'reportDisaster']);
});
