<?php

use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\PagePollDetailsController;
use Illuminate\Support\Facades\Route;

Route::get('/', PageHomeController::class)->name('home');
Route::get('/poll/{poll}', PagePollDetailsController::class)->name('poll');
