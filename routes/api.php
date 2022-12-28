<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettlementController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ZipCodeController;

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
Route::get('settlement/types', [SettlementController::class, 'types'])->name('settlement.types');
Route::post('data/save', [DataController::class, 'save'])->name('data.save');
Route::get('zip-codes/{zip_code}', [ZipCodeController::class, 'settlements'])->name('zip-code.settlements');

