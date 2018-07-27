<?php

namespace App\Http\Controllers\Users;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class UsersController
 *
 * @package App\Http\Controllers\Users
 */
class UsersController extends Controller
{
    /**
     * UsersController constructor.
     *
     * @param  UserRepository $userRepository Abstraction layer for the users database table.
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin'])
    }
}
