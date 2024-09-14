<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use InstallerErag\Main\EnvironmentManager as BaseEnvironmentManager;
use App\Services\CustomEnvironmentManager;

class ExtendedInstallerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(BaseEnvironmentManager::class, function ($app) {
            return new CustomEnvironmentManager();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // 
    }
}
