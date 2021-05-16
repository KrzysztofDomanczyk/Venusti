<?php

namespace App\Providers;

use App\Console\Commands\UpdatePostsAndUsers;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UpdatePostsAndUsers::class, function ($app) {
            return new UpdatePostsAndUsers();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
