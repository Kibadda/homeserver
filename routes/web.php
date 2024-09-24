<?php

use App\Livewire\Board\Show;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/boards/1');

Route::post('/logout', function () {
    Auth::logout();

    return redirect('/');
});

Route::get('/boards/{board}', Show::class)->middleware('auth.basic:,name');
