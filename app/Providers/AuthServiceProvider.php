<?php

namespace App\Providers;
use Auth;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('acceder_a_la_validation', function () {
            return Auth::user();
        });

        Gate::define('acceder_au_back_office', function ($user) {
            return $user ->isAdmin(); //condition à satisfaire pour passer le gate
        });
    }

    
}
