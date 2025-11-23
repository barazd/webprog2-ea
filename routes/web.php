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
use App\Http\Controllers\MessageController;

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

Route::get('messages/create', [MessageController::class, 'create'])->name('messages.create');
Route::post('messages/create', [MessageController::class, 'store'])->name('messages.store');
Route::get('messages', [MessageController::class, 'index'])->name('messages.index');

Route::middleware(['auth'])->group(function () {

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
