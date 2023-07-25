<?php

use App\Http\Controllers\MessageController;
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


Route::post('/sendMessage', [MessageController::class, 'sendMessage']);
Route::post('/getUserMessages', [MessageController::class, 'getUserMessages']);


Route::post('/register', [UserController::class, 'createUser']);
Route::post('/login', [UserController::class, 'login']);

//ls-48ee0da49c64ca6bde3e77a044a96da8ae040587.cgvk455iuucw.us-east-1.rds.amazonaws.com
