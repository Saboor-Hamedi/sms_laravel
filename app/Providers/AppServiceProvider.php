<?php

namespace App\Providers;

use App\Models\Posts;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;

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
    public function boot(): void
    {
        Cache::rememberForever('permissions', function () {
            return Permission::all();
        });
    }
}
