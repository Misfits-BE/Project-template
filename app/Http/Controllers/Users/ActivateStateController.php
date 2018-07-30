<?php

namespace App\Http\Controllers\Users;

use App\Http\Requests\Users\DeactivationValidation;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

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

    /**
     * View for the deactivation from a user. 
     * 
     * @param  User $user The resource entity from the user in the application. 
     * @return View
     */
    public function create(User $user): View 
    {   
        return view('users.deactivate', [
            'user' => $user, 'periods' => $this->userRepository->getDeactivatedPeriods()
        ]);
    }

    /**
     * Store the deactivation for a user in the storage 
     *
     * @param  DeactivationValidation   $input The form request class that handles all the validation.
     * @param  User                     $user  The resource entity form the user in the application.
     * @return RedirectResponse
     */
    public function store(DeactivationValidation $input, User $user): RedirectResponse
    {
        if (Hash::check($input->password, $this->userRepository->getUser()->password)) {
            $user->ban($input->except('password'));
        }

        return redirect()->route('users.index');
    }

    /**
     * Delete the deactivation for the user in the storage 
     * 
     * @param  User $user The resource entity from the user in the storage
     * @return RedirectReponse
     */
    public function destroy(User $user): RedirectResponse 
    {
        
    }
}
