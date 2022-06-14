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
    return view('auth.login');
})->middleware('guest');

Route::controller(AccountController::class)->middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/create', 'create')->name('account.create');
    Route::post('/store', 'store')->name('account.store');
    Route::get('/edit/{account}', 'edit')->name('account.edit');
    Route::put('/update/{account}', 'update')->name('account.update');
    Route::get('/searchSuggestion', 'searchSuggestion')->name('account.searchSuggestion');
    Route::any('/search', 'search')->name('account.search');
    Route::delete('/destroy', 'destroy')->name('account.destroy');
});

require __DIR__.'/auth.php';
