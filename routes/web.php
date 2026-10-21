<?php

use Illuminate\Http\Response;
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

Route::get('/sitemap.xml', function (): Response {
    return response()->view('sitemap', [
        'baseUrl' => rtrim(config('app.url'), '/'),
    ])->header('Content-Type', 'application/xml; charset=UTF-8');
})->name('sitemap');

Route::get('/robots.txt', function (): Response {
    return response()->view('robots', [
        'baseUrl' => rtrim(config('app.url'), '/'),
    ])->header('Content-Type', 'text/plain; charset=UTF-8');
})->name('robots');
