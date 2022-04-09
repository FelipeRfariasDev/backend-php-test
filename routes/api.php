<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->resource('/products', ProductsController::class);