<?php

use App\Http\Controllers\JamaahController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/jamaahs', [JamaahController::class, 'index']);
Route::post('/jamaahs', [JamaahController::class, 'store']);
