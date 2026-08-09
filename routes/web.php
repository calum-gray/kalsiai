<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HealthCheckController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/case_study', 'caseStudy')->name('case_study');
    Route::get('/health-check', 'healthCheck')->name('health-check');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/services', 'services')->name('services');
});

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::post('/health-check', [HealthCheckController::class, 'submit'])->name('health-check.submit');
