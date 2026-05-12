<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ImageUploadController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/slabs', [PageController::class, 'slabs'])->name('slabs');

Route::prefix('tools')->name('tools.')->group(function () {
    Route::get('/salary-tax', [PageController::class, 'salary'])->name('salary');

    Route::get('/freelancer-tax', [PageController::class, 'freelancer'])->name('freelancer');

    Route::get('/youtuber-tax', [PageController::class, 'youtuber'])->name('youtuber');

    Route::get('/rental-tax', [PageController::class, 'rental'])->name('rental');

    Route::get('/capital-gain-tax', [PageController::class, 'capitalGain'])->name('capital-gain');
    Route::get('/capital-gain', [PageController::class, 'capitalGain']);
});

Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog-{post:slug}', [PageController::class, 'blogDetail'])->name('blog.detail');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::post('/contact-submit', [PageController::class, 'storeInquiry'])->name('contact.store');
Route::get('/about-us', [PageController::class, 'about'])->name('about');


Route::post('/admin/upload-image', [ImageUploadController::class, 'upload'])
    ->middleware(['web'])
    ->name('admin.upload.image');
