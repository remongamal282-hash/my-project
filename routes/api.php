<?php

use App\Http\Controllers\ProdectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('prodects', [ProdectController::class, 'index']);
Route::get('prodects/{prodect}', [ProdectController::class, 'show']);

Route::middleware(['web', 'simple.auth'])->group(function (): void {
    Route::post('prodects', [ProdectController::class, 'store']);
    Route::put('prodects/{prodect}', [ProdectController::class, 'update']);
    Route::patch('prodects/{prodect}', [ProdectController::class, 'update']);
    Route::delete('prodects/{prodect}', [ProdectController::class, 'destroy']);
});
