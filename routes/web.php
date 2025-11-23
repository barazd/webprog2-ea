<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Middleware\UserHasRole;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\EmployeeController;

Route::redirect('/', '/home');

Route::view('home', 'home')
    ->name('home');

Route::get('engineers', [EngineerController::class, 'index'])->name('engineers');

Route::view('admin', 'admin')
    ->middleware(['auth', 'verified', UserHasRole::class . ':admin'])
    ->name('admin');

Route::prefix('crud')->name('crud.')->group(function () {
    Route::resource('cities', CityController::class)->except(['show']);
    Route::resource('sites', SiteController::class)->except(['show']);
    Route::resource('employees', EmployeeController::class)->except(['show']);
});

Route::get('messages/create', [MessgaeController::class, 'create'])->name('messages.create');
Route::post('messages', [MessgaeController::class, 'store'])->name('messages.store');

Route::middleware(['auth'])->group(function () {
    Route::get('messages/index', [MessgaeController::class, 'index'])->name('messages.index');

    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
