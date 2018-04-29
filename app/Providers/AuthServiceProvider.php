<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: System management
        Gate::define('system_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: User actions
        Gate::define('user_action_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Club management
        Gate::define('club_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Clubs
        Gate::define('club_access', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('club_create', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('club_edit', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('club_view', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });
        Gate::define('club_delete', function ($user) {
            return in_array($user->role_id, [1, 3, 4]);
        });

        // Auth gates for: Schools
        Gate::define('school_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('school_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('school_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('school_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('school_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
