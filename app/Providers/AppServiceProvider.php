<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('pagination::default');
        Gate::define('admin-only-action', function (User $user)
        {
            return($user->is_admin);
        });
        Gate::define('admin-and-self-only-action', function (User $user, User $target)
        {
           return ($user->is_admin or $user->id == $target->id);
        });
    }
}
