<?php

use AlexanderA2\PuzzleLaravel\Controllers\PuzzleController;
use Illuminate\Support\Facades\Route;


Route::any('/puzzle', [PuzzleController::class, 'index']);
Route::get('/puzzle/{imageDir}/{imageName}', [PuzzleController::class, 'showImage'])->name('show.image');
