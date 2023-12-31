<?php

use App\Http\Controllers\api\v1\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('v1')->group(function () {

    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customers', 'index');
        Route::post('/customers', 'store');
        Route::put('/customers/{customer}', 'update');
        Route::delete('/customers/{customer}', 'destroy');
    });
});

