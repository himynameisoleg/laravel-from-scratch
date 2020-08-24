<?php

namespace App\Policies;

use App\Conversation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Conversation  $conversation
     * @return mixed
     */

    // regular way of setting up auth in the policy
    // public function view(User $user, Conversation $conversation)
    // {
    //     return $conversation->user->is($user);
    // }

    // If we dont want to do this for every Policy we can simple move this up to the global level.
    // public function before(User $user)
    // {
    //     // make sure we use the IF condition instead of immediately returning so that we also hit the 
    //     // update function
    //     if ($user->id == 7) { // admin
    //         return true;
    //     }
    // }
    public function update(User $user, Conversation $conversation)
    {
        return $conversation->user->is($user);
    }

}
