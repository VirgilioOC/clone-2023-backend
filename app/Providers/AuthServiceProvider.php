<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {   
        $this->registerPolicies();

        Gate::define('accessAnyone', [UserPolicy::class, 'accessAnyone']);
        Gate::define('accessOnlyAdmin', [UserPolicy::class, 'accessOnlyAdmin']);
        Gate::resource('item', 'App\Policies\UserPolicy');
        Gate::resource('pedido', 'App\Policies\UserPolicy');
        Gate::resource('tipo', 'App\Policies\UserPolicy');
    }
}
