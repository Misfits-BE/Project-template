<?php 

namespace App\Composers; 

use Illuminate\Contracts\View\View;
use App\User;
use App\Models\Activity;
use App\Models\Fragment;

/**
 * Class HomeComposers 
 * 
 * @package App\Composers 
 */
class HomeComposer 
{
    /**
     * Bind data to the view 
     * 
     * @param  View $view The view builder instance
     * @return void
     */
    public function compose(View $view): void 
    {
        // Widget counters
        $view->with('usersTotal', User::count());
        $view->with('usersToday', User::whereDate('created_at', now()->today())->count());

        $view->with('activityTotal', Activity::count());
        $view->with('activityToday', Activity::whereDate('created_at', now()->today())->count());

        $view->with('fragmentsTotal', Fragment::count());
        $view->with('fragmentsToday', Fragment::whereDate('created_at', now()->today())->count());
    }
}