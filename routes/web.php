<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {


    Route::get('customers/trash', [CustomerController::class, 'trashIndex'])->name('customers.trash');
    Route::resource('customers', CustomerController::class);



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// **********
// **********
// **********
// **********
// **********
// **********
// ********** Calendar Routes   **************

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/test', [UserController::class, 'test']);

// Calendar routes
Route::get('calendar/index', [CalendarController::class, 'index'])->name('calendar.index');
Route::post('calendar', [CalendarController::class, 'store'])->name('calendar.store');
Route::patch('calendar/update/{id}', [CalendarController::class, 'update'])->name('calendar.update');
Route::delete('calendar/destroy/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');

Route::get('books', [BookController::class, 'index'])->name('books.index');
Route::post('books', [BookController::class, 'store'])->name('books.store');

Route::get('/export-db', function() {
    return "Exporting";
});
