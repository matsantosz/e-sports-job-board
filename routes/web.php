<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'landing')->name('landing');

Route::view('/jobs', 'jobs')->name('jobs');

Route::view('/jobs/create', 'jobs-create')
    ->middleware(['auth'])
    ->name('jobs.create');

Route::view('/profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
