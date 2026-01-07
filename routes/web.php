<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LandingController,
    FaqController,
    PricingPlanController,
    ReachUsController,
    SettingController
};

Route::get('/', function () {
    return view('welcome');
});

// Landing Page Data
Route::get('/landing-data', [LandingController::class, 'index']);

// Specific Data Routes
Route::get('/faqs', [FaqController::class, 'index']);
Route::get('/pricing', [PricingPlanController::class, 'index']);
Route::get('/reach-us', [ReachUsController::class, 'index']);
Route::get('/settings', [SettingController::class, 'index']);

// Handle localized admin redirects to prevent 404
// Route::group([
//     'prefix' => '{locale}',
//     'where' => ['locale' => 'en|ar'],
//     'middleware' => ['web']
// ], function () {
//     Route::get('/admin', function ($locale) {
//         if (!in_array($locale, ['en', 'ar'])) abort(404);
//         App::setLocale($locale);
//         session(['locale' => $locale]);
//         return redirect()->to(url('/admin'));
//     });

//     Route::get('/admin/{any}', function ($locale, $any) {
//         if (!in_array($locale, ['en', 'ar'])) abort(404);
//         App::setLocale($locale);
//         session(['locale' => $locale]);
//         return redirect()->to(url('/admin/' . $any));
//     })->where('any', '.*');
// });


route::view('/front', 'front')->name('front');
