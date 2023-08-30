<?php

use Illuminate\Support\Facades\Route;
use Erjon\Cone\App\Http\Controllers\{
    LicenseController,
    LanguageController
};


Route::group(['middleware' => ['web', 'not-licensed']], function () {
    Route::get('provide-license', [LicenseController::class, 'showLicenseForm'])->name('show-license-form');
    Route::post('activate-license', [LicenseController::class, 'activateLicense'])->name('activate-license')->middleware('throttle:6,1');
    Route::get('cone-language/{locale}', [LanguageController::class, 'index'])->name('cone-language');
});
