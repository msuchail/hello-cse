<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('profiles', \App\Http\Controllers\ProfileController::class)->only(['index']);
Route::apiResource('profiles', \App\Http\Controllers\ProfileController::class)->only(['store', 'update'])->middleware(['auth:sanctum', 'ability:write']);
Route::apiResource('profiles', \App\Http\Controllers\ProfileController::class)->only(['destroy'])->middleware(['auth:sanctum', 'ability:delete']);
