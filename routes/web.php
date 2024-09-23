<?php

use App\Livewire\Kanban\Index;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/kanban');

Route::get('/kanban', Index::class);
