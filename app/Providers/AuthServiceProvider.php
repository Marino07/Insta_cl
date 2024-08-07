<?php
namespace App\Providers;


use App\Models\Post;
use App\Models\Profile;
use App\Policies\ProfilePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Profile::class => ProfilePolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('profiles.edit', function ($user) {
            return $user->isAdmin();
        });
    }
}
