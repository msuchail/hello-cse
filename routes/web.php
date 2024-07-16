<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('profiles.index');
});
Route::get('profiles', \App\Livewire\Profile::class)->name('profiles.index');
