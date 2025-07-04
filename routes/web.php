<?php

use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\PageVideosController;
use App\Http\Controllers\PageDashboardController;
use App\Http\Controllers\PageCourseDetailsController;
use Illuminate\Container\Attributes\Log;

Route::get('/', PageHomeController::class)->name('pages.home');

 Route::view('/login','livewire.auth.login')->name('login');

Route::get('courses/{course:slug}', PageCourseDetailsController::class)->name('pages.course-details');
 
Route::get('videos/{course:slug}', PageVideosController::class)->name('pages.course-video');
 

 Route::get('/dashboard', PageDashboardController::class)
    ->middleware(['auth', 'verified'])
   ->name('pages.dashboard'); 

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
