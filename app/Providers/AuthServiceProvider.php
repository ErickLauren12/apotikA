<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

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
        
        Gate::define('delete-permission','App\Policies\SupplierPolicy@delete');
        Gate::define('checkmember','App\Policies\checkmember@checkmember');
        /*
        Gate::define('delete-permission', function($user){
            return ($user->sebagai == 'owner'
            ? Response::allow()
            : Response::deny('You must be a super admin')
            );
        });*/
    }
}
