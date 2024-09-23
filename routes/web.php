<?php

use App\Livewire\Board\Show;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/boards/{board}');

Route::get('/boards/{board}', Show::class);
