<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\TagController;

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

Route::post('/register', [AuthController::class, 'createUser']);

Route::post('/login', [AuthController::class, 'loginUser']);

//Route::get('tags', [TagController::class, 'index'])->middleware('auth:sanctum');

Route::resource('posts', PostController::class)->middleware('auth:sanctum');

Route::resource('tags', TagController::class)->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Route::group(['middleware' => 'auth:sanctum'] ,function()
// {
//     Route::apiResource('post', 'PostController');
// });
