<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('waste', \App\Http\Controllers\Api\WasteController::class);
