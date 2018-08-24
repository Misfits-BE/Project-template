<?php

namespace App\Providers;

use App\Observers\BanObserver;
use Cog\Laravel\Ban\Models\Ban;
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
        Ban::observe(BanObserver::class);
    }
}
