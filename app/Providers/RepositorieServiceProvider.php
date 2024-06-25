<?php

namespace App\Providers;

use App\interfaces\UserInterface;
use App\repositories\UserRepositories;
use Illuminate\Support\ServiceProvider;

class RepositorieServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(UserInterface::class, UserRepositories::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
