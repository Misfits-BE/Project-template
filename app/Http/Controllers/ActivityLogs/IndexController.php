<?php

namespace App\Http\Controllers\ActivityLogs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ActivityRepository;
use Illuminate\Contracts\View\View;

/**
 * Class IndexController 
 * 
 * @package App\Http\Controllers\ActivityLog
 */
class IndexController extends Controller
{
    /** @var \App\Repositories\ActivityRepository $activityRepository */
    private $activityRepository; 

    /**
     * IndexController Constructor
     * 
     * @param  
     * @return void
     */
    public function __construct(ActivityRepository $activityRepository) 
    {
        $this->middleware(['auth', 'role:admin', 'forbid-banned-user']);
        $this->activityRepository = $activityRepository;
    }

    /**
     * Index view for the internal logs. 
     * 
     * @todo Implement phpunit tests
     * 
     * @param  Request $request The request information collection bag. 
     * @return View
     */
    public function index(Request $request): View
    {
        $activities = $this->activityRepository->getLogs(25, $request->get('filter'));
        return view('activities.index', compact('activities'));
    }

    /**
     * Search for a specific log in the application
     * 
     * @todo Implement route
     * @todo Implement phpunit tests (ROUTE = activity.search)
     * 
     * @param  Request $request The request information collection bag. 
     * @return View
     */
    public function search(Request $request): View
    {
        $activities = $this->activityRepository->getSearch($request->get('term')); 
        return view('activities.index', compact('activities'));
    }
}
