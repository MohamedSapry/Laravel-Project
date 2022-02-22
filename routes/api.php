<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\UserTableController;
use App\Http\Livewire\UserTableSelfImpl;
use App\Http\Livewire\UserFrom;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('usersdata', [AddressController::class, 'getAlladdresses'] );
Route::get('addresses/{id}', [AddressController::class, 'getAddress'] );
Route::put('addresses/{id}',  [AddressController::class, 'updateAddress']);
Route::delete('addresses/{id}', [AddressController::class, 'deleteAddress']);

Route::get('/area', [AreaController::class, 'getAllAreas']);
Route::get('area/{id}', [AreaController::class, 'getArea']);
Route::post('area', [AreaController::class, 'createArea']);
Route::put('area/{id}', [AreaController::class, 'updateArea']);
Route::delete('area/{id}',[AreaController::class, 'deleteArea']);


