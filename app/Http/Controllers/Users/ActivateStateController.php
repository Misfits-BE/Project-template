<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

/**
 * Class DeactivateController
 * 
 * @package App\Http\Controllers\Users
 */
class ActiveStateController extends Controller
{
    /** @var \App\Repositories\UserRepository $userRepository */
    private $userRepository;

    /**
     * ActiveStateConstructor 
     * 
     * @param  UserRepository $userRepository Abstraction layer between controller and user data storage.
     * @return void
     */
    public function __construct(UserRepository $userRepository) 
    {
        $this->middleware(['auth', 'role:admin', 'forbid-banned-user']);
        $this->userRepository = $userRepository;
    }

    public function create(): View 
    {

    }

    public function store(): RedirectResponse 
    {
        
    }
}
