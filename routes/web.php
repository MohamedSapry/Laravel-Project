<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UserTableSelfImpl;
use App\Http\Livewire\UserFrom;

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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/addressestable', [App\Http\Controllers\AddressController::class, 'index'])->name('addressestable');
Route::get('/addresses', UserTableSelfImpl::class)->name('addresses');
Route::get('/newAddress', UserFrom::class);
