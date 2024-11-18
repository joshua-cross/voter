<?php

use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\PagePollDetailsController;
use App\Http\Controllers\PageResultsController;
use App\Http\Controllers\PageUserDetailsController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Route;

Route::get('/', PageHomeController::class)->name('home');
Route::get('/poll/create', [PollController::class, "store"])->name('poll.create')->middleware('auth');
Route::get('/poll/{poll}', PagePollDetailsController::class)->name('poll');
Route::get('/user/{user}', PageUserDetailsController::class)->name('user');
Route::post('/response', [ResponseController::class, "create"])->name('submit-response')->middleware('auth');
Route::get('/results/{poll}', PageResultsController::class)->name('results');
