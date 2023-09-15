<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // 2ème gate : vérifie que le user est connecté pour pouvoir accéder à la validation de commande
        Gate::define('access_order_validation', function () {
            return Auth::user();
        });

        Gate::define('access_backoffice', function () {
            return Auth::user()->role_id==2;
        });
    }
}
