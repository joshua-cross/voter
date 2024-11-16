<?php

use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\PageLoginController;
use App\Http\Controllers\PagePollDetailsController;
use App\Http\Controllers\PageUserDetailsController;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Route;

Route::get('/', PageHomeController::class)->name('home');
Route::get('/poll/{poll}', PagePollDetailsController::class)->name('poll');
Route::get('/user/{user}', PageUserDetailsController::class)->name('user');
Route::post('/response', [ResponseController::class, "create"])->name('submit-response');
//Route::get('/login', PageLoginController::class)->name('login');
//Route::get("/logout", fn() => Auth::logout())->name('logout');