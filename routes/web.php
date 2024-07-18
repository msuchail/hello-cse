<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('profiles.index');
});
Route::get('profiles', \App\Livewire\Profile::class)->name('profiles.index');
Route::get('login', \App\Livewire\Login::class)->name('login');
Route::get('logout', \App\Http\Controllers\LogoutController::class)->name('logout');
Route::get('get-token', \App\Livewire\GetToken::class)->name('get-token');

