<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class SecuritySettingsController 
 * 
 * @package App\Http\Controllers\Account
 */
class SecuritySettingsController extends Controller
{
    /** @var \App\Repositories\UserRepository $userRepository */
    private $userRepository; 

    /**
     * SecuritySettingsConstructor 
     * 
     * @param  UserRepository $userRepository The user resource abstraction layer from the storage.
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware(['auth']);
        $this->userRepository = $userRepository;
    }

    /**
     * View for the account security settings. 
     * 
     * @todo Implement phpunit test
     * 
     * @return View
     */
    public function index(): View
    {
        return view('account.settings-security');
    }

    /**
     * @todo Implement phpunit test
     */
    public function update(): RedirectResponse
    {
        return redirect()->route('account.security');
    }
}
