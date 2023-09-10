<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShippingController;

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

Route::get('/shipping_calculator', [ShippingController::class, 'showShippingForm']);
Route::post('/shipping_calculator', [ShippingController::class, 'getShippingCost']);
