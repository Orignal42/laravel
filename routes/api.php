<?php

use App\Http\Controllers\AppartementController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/property/all', [AppartementController::class, 'all']);
Route::get('/property/detail/{id}', [AppartementController::class, 'detail']);
Route::PUT('/property/add',[AppartementController::class,'add']);
Route::POST('/property/modify/{id}',[AppartementController::class,'edit']);
Route::DELETE('/property/delete/{id}', [AppartementController::class,'delete']);
// http://lara.test/api/property/all