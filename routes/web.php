<?php

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/portfolio', function (): View {
    return view('portfolio', [
        'videos' => config('portfolio.videos'),
    ]);
})->name('portfolio');
