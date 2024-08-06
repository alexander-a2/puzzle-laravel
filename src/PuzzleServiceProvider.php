<?php

namespace AlexanderA2\PuzzleLaravel;

use Illuminate\Support\ServiceProvider;

class PuzzleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'puzzle');
//        $this->publishes([
//            __DIR__.'/views' => resource_path('views/alexander-a2/Puzzle-laravel'),
//        ]);
    }

    public function register()
    {
    }
}