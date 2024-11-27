<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

Route::prefix('/api/properties')->group(function () {
    Route::post('/', [PropertyController::class, 'store']);
    Route::get('/', [PropertyController::class, 'search']);
    Route::get('/nearby', [PropertyController::class, 'nearby']);
});
