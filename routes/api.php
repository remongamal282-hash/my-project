<?php

use App\Http\Controllers\ProdectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['check.api.key', 'throttle:api-prodects'])->group(function (): void {
    Route::apiResource('prodects', ProdectController::class);
});
