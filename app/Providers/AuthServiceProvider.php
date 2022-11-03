<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Enums\UserType;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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

        Gate::define('isAdmin',function (User $user){
           return  $user->role == UserType::Admin;
        });

        Gate::define('isSeller',function (User $user){
            return $user->role == UserType::Seller;
        });

        Gate::define('sellerComplete',function (User $user){
          return  DB::table('restaurants')->where('user_id', $user->id)->exists();
        });

    }
}
