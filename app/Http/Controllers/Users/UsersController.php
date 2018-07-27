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
     * @param  Request $params The filter paramfor the user resource collection from the storage.
     * @return View
     */
    public function index(Request $params): View
    {
        $users = $this->userRepository->getUsers($params->get('filter'));
        return view('users.index', compact('users'));
    }

    /**
     * Application view for creating a new user in the application.
     *
     * @return View
     */
    public function create(): View
    {

    }
}
