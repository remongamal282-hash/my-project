<?php

use App\Http\Controllers\ProdectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('prodects')->group(function (): void {
    Route::get('/', [ProdectController::class, 'index'])->middleware('throttle:prodects-read');
    Route::get('/{prodect}', [ProdectController::class, 'show'])->middleware('throttle:prodects-read');
});

Route::prefix('prodects')->middleware('check.admin.key')->group(function (): void {
    Route::post('/', [ProdectController::class, 'store'])->middleware('throttle:prodects-write');
    Route::put('/{prodect}', [ProdectController::class, 'update']);
    Route::delete('/{prodect}', [ProdectController::class, 'destroy']);
});
