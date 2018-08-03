<?php

namespace App\Http\Controllers\Fragments;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\FragmentsRepository;

/**
 * Class IndexController
 * 
 * @package App\Http\Controllers\Fragments
 */
class IndexController extends Controller
{
    /** @var \App/Repositories\FragmentsRepository $fragmentRepository */
    private $fragmentRepository; 

    /**
     * IndexController constructor. 
     * 
     * @param  FragmentsRepository The abstraction layer between controller and fragments storage table. 
     * @return void
     */
    public function __construct(FragmentsRepository $fragmentRepository)
    {
        $this->middleware(['auth', 'role:admin', 'forbid-banned-user']); 
        $this->fragmentRepository = $fragmentRepository;
    }

    /**
     * Get the management index view for page fragments. 
     * 
     * @todo Build up the application view. 
     * 
     * @return View 
     */
    public function index(): View
    {
        $fragments = $this->fragmentRepository->getIndexResults();
        return view('fragments.index', compact('fragments'));
    }
}
