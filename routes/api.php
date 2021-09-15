<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function(){
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('user/photo', [UserController::class, 'updatePhoto']);
    Route::get('logout', [UserController::class, 'logout']);

});

Route::post('login',[UserController::class, 'login']);
Route::post('register',[UserController::class, 'register']);

Route::get('data', [DataController::class, 'all']);
Route::get('data', [ProsesController::class, 'all']);
Route::get('data', [HasilController::class, 'all']);
Route::get('data', [Itemset1Controller::class, 'all']);
Route::get('data', [HasilItemset1Controller::class, 'all']);
Route::get('data', [Itemset2Controller::class, 'all']);
Route::get('data', [ConfidenceController::class, 'all']);
Route::get('data', [HasilAkhirController::class, 'all']);