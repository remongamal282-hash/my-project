<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdectWebController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::middleware('simple.auth')->group(function (): void {
    Route::get('/', [ProdectWebController::class, 'index'])->name('home');
    Route::get('/ProdectWebController', [ProdectWebController::class, 'index'])->name('web.prodects.index');
    Route::get('/prodects/create', [ProdectWebController::class, 'create'])->name('web.prodects.create');
    Route::post('/prodects', [ProdectWebController::class, 'store'])->name('web.prodects.store');
    Route::get('/prodects/{prodect}/edit', [ProdectWebController::class, 'edit'])->name('web.prodects.edit');
    Route::put('/prodects/{prodect}', [ProdectWebController::class, 'update'])->name('web.prodects.update');
    Route::delete('/prodects/{prodect}', [ProdectWebController::class, 'destroy'])->name('web.prodects.destroy');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

