<?php

namespace App\Http\Controllers\Users;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class UsersController
 *
 * @package App\Http\Controllers\Users
 */
class UsersController extends Controller
{
    /** @var \App\Repositories\UserRepository $userRepository */
    private $userRepository;

    /**
     * UsersController constructor.
     *
     * @param  UserRepository $userRepository Abstraction layer for the users database table.
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware(['auth', 'role:admin']);
        $this->userRepository = $userRepository;
    }

    /**
     * Index view for the user management.
     *
     * @return View
     */
    public function index(): View
    {
        $users = $this->userRepository->getUsers();
        return view('users.index', compact('users'));
    }
}
