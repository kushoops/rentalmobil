<?php

use App\Livewire\Pages\Admin\Bookings;
use App\Livewire\Pages\Admin\Dashboard;
use App\Livewire\Pages\Admin\Messages;
use App\Livewire\Pages\Admin\Products;
use App\Livewire\Pages\Admin\Settings as AdminSettings;
use App\Livewire\Pages\Public\Booking;
use App\Livewire\Pages\Public\Home;
use App\Livewire\Pages\Public\Kontak;
use App\Livewire\Pages\Public\Profil;
use App\Livewire\Pages\Public\Settings;
use App\Livewire\Pages\Public\UnitMobil;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');

Route::get('/', Home::class)->name('home');
Route::get('profil', Profil::class)->name('profil');
Route::get('unit-mobil', UnitMobil::class)->name('unit-mobil');
Route::get('kontak', Kontak::class)->name('kontak');
Route::get('booking/{mobil}', Booking::class)->name('booking')->middleware(['auth', 'verified']);
Route::get('settings', Settings::class)->name('settings')->middleware(['auth', 'verified', 'role:user']);

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', Dashboard::class)->name('admin.dashboard');
        Route::get('products', Products::class)->name('admin.products');
        Route::get('bookings', Bookings::class)->name('admin.bookings');
        Route::get('messages', Messages::class)->name('admin.messages');
        Route::get('settings', AdminSettings::class)->name('admin.settings');
    });
});

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

require __DIR__.'/auth.php';
