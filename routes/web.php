<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/',[CustomerController::class,'index'])->name('home');
Route::resource('customers',CustomerController::class);