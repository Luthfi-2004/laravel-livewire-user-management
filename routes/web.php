<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Users;
use App\Livewire\About;
use App\Livewire\Contact;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (Bisa diakses siapa saja)
|--------------------------------------------------------------------------
*/
Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/contact', Contact::class)->name('contact');

// PINDAHKAN KE SINI (Agar bisa diakses tamu)
Route::get('/users', Users::class)->name('users');

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES (Harus Login Dulu)
|--------------------------------------------------------------------------
*/

// Route Dashboard lempar ke users
Route::get('/dashboard', function () {
    return redirect()->route('users');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';