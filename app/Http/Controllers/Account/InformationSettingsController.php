<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

/**
 * Class InformationSettingsController
 * 
 * @package App\Http\Controllers\Account
 */
class InformationSettingsController extends Controller
{
    /**
     * InformationSettingsController Constructor
     * 
     * @return void
     */
    public function __construct() 
    {
        $this->middleware(['auth']);
    }

    /**
     * Get the account information settings view. 
     * 
     * @todo Implement phpunit test
     * 
     * @return View
     */
    public function index(): View
    {
        return view('account.settings-info');
    }
}
