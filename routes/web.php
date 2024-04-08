<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboardGet');
Route::post('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/books',[MainController::class, 'books'])
->middleware(['auth', 'verified'])->name('books');
Route::post('/books',[MainController::class, 'booked'])
->middleware(['auth', 'verified'])->name('booked');

Route::post('/books_detail',[MainController::class, 'booksDetail'])
->middleware(['auth', 'verified'])->name('booksDetail');

Route::get('/db/create',[MainController::class, 'create'])
->middleware(['auth', 'verified'])->name('create');
Route::post('/db/create',[MainController::class, 'created'])
->middleware(['auth', 'verified'])->name('created');

Route::post('/db/store',[MainController::class, 'stored'])
->middleware(['auth', 'verified'])->name('store');

Route::post('/db/deleteOrUpdate',[MainController::class, 'deleteOrUpdate'])
->middleware(['auth', 'verified'])->name('deleteOrUpdate');
Route::post('/db/remove',[MainController::class, 'remove'])
->middleware(['auth', 'verified'])->name('remove');
Route::post('/db/update',[MainController::class, 'update'])
->middleware(['auth', 'verified'])->name('update');
Route::post('/db/updateEnd',[MainController::class, 'updateEnd'])
->middleware(['auth', 'verified'])->name('updateEnd');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
