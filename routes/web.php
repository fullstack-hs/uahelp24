<?php

use Illuminate\Support\Facades\Route;
use Modules\Client\Http\Controllers\ClientController;
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

Route::get('/admin/login', [\Modules\Admin\Http\Controllers\LoginController::class, "auth"])->name("login");
Route::get('/', [ClientController::class, "index"])->name("home");
Route::get('/phone', [ClientController::class, "phone"])->name("phone");
Route::get('/data', [ClientController::class, "data"])->name("data");
Route::post('/store', [ClientController::class, "store"])->name("reg.store");
Route::post('/store-phone', [ClientController::class, "storeByPhone"])->name("reg.storeByPhone");

Route::get('/success', [ClientController::class, "success"]);
Route::get('/fail', [ClientController::class, "fail"]);

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize');
});
