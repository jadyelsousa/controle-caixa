<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
})->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::controller(AccountController::class)->prefix('account')->group(function () {
    Route::get('/create', 'create')->middleware(['auth'])->name('account.create');
    Route::post('/store', 'store')->middleware(['auth'])->name('account.store');
    Route::get('/searchSuggestion', 'searchSuggestion')->middleware(['auth'])->name('account.searchSuggestion');
    Route::any('/search', 'search')->middleware(['auth'])->name('account.search');
    Route::post('/update', 'update')->middleware(['auth'])->name('account.update');
    Route::delete('/destroy', 'destroy')->middleware(['auth'])->name('account.destroy');
});

require __DIR__.'/auth.php';
