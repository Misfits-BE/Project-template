<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * Class HomeController 
 * 
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin', 'forbid-banned-user'])->only(['index']);
    }

    /**
     * Show the application welcome page 
     * 
     * @return View 
     */
    public function welcome(): View 
    {
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @see \App\Composers\HomeComposer::class for the default data in the view
     * 
     * @return View
     */
    public function index(): View
    {
        return view('home');
    }
}
