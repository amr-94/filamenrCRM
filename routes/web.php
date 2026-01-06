<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Handle localized admin redirects to prevent 404
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => 'en|ar'],
    'middleware' => ['web']
], function () {
    Route::get('/admin', function ($locale) {
        if (!in_array($locale, ['en', 'ar'])) abort(404);
        App::setLocale($locale);
        session(['locale' => $locale]);
        return redirect()->to(url('/admin'));
    });

    Route::get('/admin/{any}', function ($locale, $any) {
        if (!in_array($locale, ['en', 'ar'])) abort(404);
        App::setLocale($locale);
        session(['locale' => $locale]);
        return redirect()->to(url('/admin/' . $any));
    })->where('any', '.*');
});
