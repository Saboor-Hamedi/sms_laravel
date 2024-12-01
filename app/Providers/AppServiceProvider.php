<?php

namespace App\Providers;

use App\Models\Posts;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
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
    public function boot(): void
    {

        // Gate::define('update', function (User $user, Posts $post) {
        //     return $user->id === $post->user_id;
        // });
        // Gate::before(function ($user, $ability) {
        //     if ($user->hasRole('admin')) {
        //         return true;
        //     }
        // });
    }
}
