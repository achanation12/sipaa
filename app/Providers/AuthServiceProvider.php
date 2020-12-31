<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //ROOT
        Gate::define('root', function ($user){
            return $user->hasAnyRoles(['root']);
        });
        // ROOT-ADMIN
        Gate::define('rootadmin', function ($user){
            return $user->hasAnyRoles(['root', 'admin']);
        });
    }
}
