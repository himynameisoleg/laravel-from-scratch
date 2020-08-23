<?php

namespace App\Providers;

use App\Conversation;
use App\User;
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

        Gate::before(function (User $user) {
            if ($user->id == 7) { // admin
                return true;
            }
        });
        // REMOVED BECAUSE we are now using a ConversationPolicy policy class instead of writing custom definitions
        // Gate::define('update-conversation', function (User $user, Conversation $conversation) {
        //     return $conversation->user->is($user);
        // });
    }
}
