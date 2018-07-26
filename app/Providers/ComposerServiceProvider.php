<?php

namespace App\Providers;

use App\Composers\GlobalComposer;
use Illuminate\Support\ServiceProvider;

/**
 * Class ComposerServiceProvider
 *
 * @package App\Providers
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        view()->composer('*', GlobalComposer::class);
    }
}
