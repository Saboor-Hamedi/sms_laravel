<?php

namespace App\Providers;

use App\Models\Posts;
use App\Models\Scores;
use App\Policies\PostPolicy;
use App\Policies\ScorePolicy;
// use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Posts::class => PostPolicy::class,
        Scores::class => ScorePolicy::class,
    ];

    public function register(): void {}

    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('delete-score', [ScorePolicy::class, 'delete']);
    }
}
