<?php

use App\Http\Controllers\Api\BatikController;
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

Route::get('batik', [BatikController::class, 'index']);
Route::get('batik/{id}', [BatikController::class, 'show']);
Route::post('batik', [BatikController::class, 'store']);
Route::put('batik/{id}', [BatikController::class, 'update']);
Route::delete('batik/{id}', [BatikController::class, 'destroy']);
