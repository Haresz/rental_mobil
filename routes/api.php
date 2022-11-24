<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentalController;

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

Route::get('/rentals', [RentalController::class, 'index']);
Route::get('/rentals/{id}', [RentalController::class, 'show']);
Route::post('/rentals', [RentalController::class, 'store']);
Route::put('/rentals/{id}', [RentalController::class, 'update']);
Route::delete('/rentals/{id}', [RentalController::class, 'destroy']);

Route::resource('rentals', RentalController::class)->except(
    ['create', 'edit']
);

