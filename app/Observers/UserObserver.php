<?php

namespace App\Observers;

use App\User;
use App\Helpers\ActivityLog;
use App\Notifications\LoginCreated;

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
     * @todo Convert first if/else to gate authorization checker.
     * 
     * @param  \App\User  $user The entity for the created user resource in the storage
     * @return void
     */
    public function created(User $user): void
    {
        if (auth()->check() && auth()->user()->hasRole('admin')) {
            $password = str_random(15);
            $this->logHandlingOnUsers($user, "Has created an login for {$user->firstname} {$user->lastname}");
            
            if ($user->update(['password' => $password])) { // Password registration
                $when = now()->addMinute();
                $user->notify((new LoginCreated($user, $password))->delay($when));
            }
        }
    }
}
