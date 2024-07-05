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
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();


        // Gate for admin permission

        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });

        // Gate for /dashboard/doc permission

        Gate::define('create-doc', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('edit-doc', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('delete-doc', function (User $user) {
            return $user->is_admin;
        });
    }
}
