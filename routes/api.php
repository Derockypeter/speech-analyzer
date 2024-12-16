<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpeechController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/transcribe', [SpeechController::class, 'transcribe']);
Route::post('/analyze', [SpeechController::class, 'analyze']);
Route::get('/generated-speech/{filename}', function ($filename) {
    return response()->file(storage_path('app/public/generated_speech/' . $filename));
})->where('filename', '.*');