<?php

namespace App\Http\Controllers\Users;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

/**
 * Class DestroyController 
 * 
 * @package App\Http\Controllers\Users
 */
class DestroyController extends Controller
{
    /**
     * DestroyController constructor 
     * 
     * @return void
     */
    public function __construct() 
    {
        $this->middleware(['auth', 'role:admin', 'forbid-banned-user']);
    }

    /**
     * Undo the user delation. 
     * 
     * @param  User $user The resource entity model for the storage. 
     * @return RedirectResponse
     */
    public function undo(int $user, UserRepository $userRepository): RedirectResponse 
    {
        $user = User::withTrashed()->find($user); 
        $user->restore();
        
        $this->logHandlingOnUsers($user, 'His login has been restored');

        return redirect()->route('users.index');
    }
}
