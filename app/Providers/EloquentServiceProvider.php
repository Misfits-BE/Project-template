<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\UserObserver;
use App\User;

/**
 * Class EloquentServiceProvider 
 * 
 * @package App\Providers
 */
class EloquentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
    }
}
