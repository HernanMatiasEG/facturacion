<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacturacionController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;

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

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/', [FacturacionController::class, 'index']);

Route::controller(FacturacionController::class)->group(function () {
    // Route::get('/cliente/{id}', 'show');
    Route::get('/', 'index');
    Route::post('/storeFactura', 'storeFactura');
});

Route::controller(ClienteController::class)->group(function () {
    // Route::get('/cliente/{id}', 'show');
    Route::post('/cliente', 'store');
});

Route::controller(ProductoController::class)->group(function () {
    // Route::get('/producto/{id}', 'show');
    Route::post('/producto', 'store');
});