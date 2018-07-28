<?php

namespace App\Observers;

use App\User;
use App\Helpers\ActivityLog;

/**
 * Class UserObserver 
 * 
 * @package App\Observers
 */
class UserObserver
{
    use ActivityLog; 

    /**
     * Handle to the user "created" event.
     *
     * @param  \App\User  $user The entity for the created user resource in the storage
     * @return void
     */
    public function created(User $user): void
    {
        if (auth()->check()) {
            $this->logHandlingOnUsers($user, "Has created an login for {$user->firstname} {$user->lastname}");
        }
    }
}
