<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Models\Vehicle' => 'App\Policies\VehiclePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if(!$this->app->routesAreCached())
        {
            Passport::routes();

//            Gate::before(function (User $user)
//            {
//                return $user->isSuperAdmin();
//            });
//            Gate::after(function (User $user)
//            {
//                return $user->isSuperAdmin();
//            });
            Gate::define('admin',function (User $user,Vehicle $vehicle)
            {

            return $user->id == $vehicle->users->id;
            });

            
             Gate::define('deny',function (User $user,Vehicle $vehicle)
            {

            $user->id != $vehicle->users->id;

            return back();
            });

        }

        //
    }
}
