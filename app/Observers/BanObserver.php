<?php

namespace App\Observers;

use App\Helpers\ActivityLog;
use Cog\Laravel\Ban\Models\Ban;

/**
 * Class BanObserver
 *
 * @package App\Observers
 */
class BanObserver
{
    use ActivityLog;

    /**
     * Handle the ban "created" event.
     *
     * @param  Ban $ban The bannable resource model entity in the application.
     * @return void
     */
    public function created(Ban $ban): void
    {
        $this->logHandlingOnUsers($ban, 'Has deactivated a user in the application.');
    }

    /**
     * Handle the ban "deleted" event.
     *
     * @param  Ban $ban The bannable resource model entity in the application.
     * @return void
     */
    public function deleted(Ban $ban): void
    {
        $this->logHandlingOnUsers($ban, 'Has activated a user in the application.');
    }
}
