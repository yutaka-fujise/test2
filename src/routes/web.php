<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

Route::get('/', [ContactController::class, 'index']);

Route::resource('products', ProductController::class);