<?php

use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\WithdrawalController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', HomeController::class)->name('home');
});

Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::post('/login', LoginController::class)->name('login');
Route::get('/deposit', [DepositController::class, 'index'])->name('deposits.index');
Route::post('/deposit', [DepositController::class, 'deposit'])->name('deposits.deposit');
Route::get('/withdrawal', [WithdrawalController::class, 'index'])->name('withdrawals.index');
Route::post('/withdrawal', [WithdrawalController::class, 'withdraw'])->name('withdrawals.withdraw');
