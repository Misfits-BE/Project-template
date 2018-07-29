<?php

namespace App\Http\Controllers\Users;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Repositories\RoleRepository;
use App\Http\Requests\Account\InformationValidation;
use App\User;

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
        $this->middleware(['auth', 'role:admin', 'forbid-banned-user']);
        $this->userRepository = $userRepository;
    }

    /**
     * Index view for the user management.
     *
     * @todo Implement phpunit test 
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
     * @todo Implement phpunit test 
     * 
     * @param  RoleRepository $roleRepository Abstraction layer for the role resources from the storage
     * @return View
     */
    public function create(RoleRepository $roleRepository): View
    {
        return view('users.create', ['roles' => $roleRepository->all(['name'])]);
    }

    /**
     * Create a new user resource in the storage 
     * 
     * @see \App\Observers\UserObserver::created For the password registration and activity log.
     * 
     * @param  InformationValidation $input The form request class that handles the input validation.
     * @return RedirectResponse
     */
    public function store(InformationValidation $input): RedirectResponse 
    {
        if ($user = $this->userRepository->create($input->all())) {
            $user->assignRole('user');
            flash("The user account for {$user->firstname} {$user->lastname} has been created.")->success();
        }

        return redirect()->route('users.show', $user);
    }

    /**
     * Method for deleting a user resource in the storage
     * 
     * @param  Request  $request    The collection bag that holds all the request data.
     * @param  User     $user       The user entity from the storage
     * @return View|RedirectResponse
     */
    public function destroy(Request $request, User $user)
    {
        if ($request->isMethod('GET')) {
            return view('users.delete', ['user' => $this->userRepository->getUser($user->id)]);
        }

        // ELSE proceed delete operation
        $this->userRepository->performUserDelete($request, $user);
        return redirect()->route('users.index');
    }
}