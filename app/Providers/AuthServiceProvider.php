<?php

namespace App\Providers;

use App\Http\Controllers\RoleConstant;
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

        Gate::define('create', function ($user) {
            foreach ($user->roles as $role) {
                if ($role->id == RoleConstant::CREATE) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('delete', function ($user) {
            foreach ($user->roles as $role) {
                if ($role->id == RoleConstant::DELETE) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('update', function ($user) {
            foreach ($user->roles as $role) {
                if ($role->id == RoleConstant::EDIT) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('admin', function ($user) {
            foreach ($user->roles as $role) {
                if ($role->id == RoleConstant::ADMIN) {
                    return true;
                }
            }
            return false;
        });
    }
}
