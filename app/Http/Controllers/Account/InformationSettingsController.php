<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\Account\InformationValidation;
use Illuminate\Http\RedirectResponse;
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

    /**
     * Update the account information resource in the storage.
     *
     * @todo Implement phpunit tests
     *
     * @param  InformationValidation $input Form request class That handles the validation.
     * @return RedirectResponse
     */
    public function update(InformationValidation $input): RedirectResponse
    {
        // TODO: Implement function
    }
}
