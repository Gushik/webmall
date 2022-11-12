<?php

namespace App\Providers;

use App\Models\Shop;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [

        // Shop::class => ShopPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('seller', function($user){

            $role = $user->role->name ?? '';

            if ($role == 'seller') {
                return true;
            }

            return false;
        });

        Gate::define('customer', function($user){

            $role = $user->role->name ?? '';

            if ($role == 'user') {
                return true;
            }

            return false;
        });

        Gate::define('admin', function($user){

            $role = $user->role->name ?? '';

            if ($role == 'admin') {
                return true;
            }

            return false;
        });
    }
}
