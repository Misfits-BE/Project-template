<?php

namespace App\Helpers; 

/**
 * Trait Activitylog 
 * ----
 * Helper trait for logging user activity in the admin panel. 
 * 
 * @package App\Helpers;
 */
trait ActivityLog 
{
    /**
     * Create a new log resource in the storage
     * 
     * @param  mixed  $model   The resource entity were the handling happend on.
     * @param  string $message The message string that needs to be logged
     * @param  string $logName The name for the log stack where the message needs to be added
     * @return void
     */
    public function addActivityLog($model, string $message, string $logName = 'General log'): void 
    {
        $authUser = auth()->user();
        activity($logName)->performedOn($model)->causedBy($authUser)->log($message);
    }

    /**
     * Helper for logging a handling on the user resources
     * 
     * @param  mixed  $model    The resource entity were the handling happend on.
     * @param  string $message  The message string that needs to be logged.
     * @return void
     */
    public function logHandlingOnUsers($model, string $message): void 
    {
        $this->addActivityLog($model, $message, 'users');
    }

    /** 
     * Helper for logging a handling on the page fragments resources. 
     * 
     * @param  mixed  $model    The resource entity where the handling happend on. 
     * @param  string $message  The message string that needs to be logged. 
     * @return void 
     */
    public function logHandlingOnFragments($model, string $message): void 
    {
        $this->addActivityLog($model, $message, 'fragments');
    }
}