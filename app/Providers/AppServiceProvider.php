<?php

namespace App\Providers;

use App\Models\Posts;
use App\Policies\PostPolicy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    // protected $policies = [
    //     Posts::class => PostPolicy::class,
    // ];

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}
}
