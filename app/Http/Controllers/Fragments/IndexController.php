<?php

namespace App\Http\Controllers\Fragments;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Repositories\FragmentsRepository;
use App\Models\Fragment;
use App\Http\Requests\Fragments\FragmentValidator;

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
     * @todo Implement phpunit view. 
     * 
     * @return View 
     */
    public function index(): View
    {
        $fragments = $this->fragmentRepository->getIndexResults(15);
        return view('fragments.index', compact('fragments'));
    }

    /**
     * Search for a specific page fragment in the application. 
     * 
     * @todo Implement phpunit test 
     * 
     * @param  Request $request The request information collection bag. 
     * @return View
     */
    public function search(Request $request): View
    {
        $fragments = $this->fragmentRepository->getSearch($request->get('term')); 
        return view('fragments.index', compact('fragments'));
    }

    /**
     * Update the visibility status for the page fragment.
     * 
     * @todo Implement phpunit test
     * @todo Implement log to Model observer.
     * 
     * @param  Fragment $user   The resource entoty from the page fragment
     * @param  string   $status The newly given status from the page fragment. 
     * @return RedirectResponse
     */
    public function status(Fragment $fragment, string $status): RedirectResponse 
    {
        if ($this->fragmentRepository->updateStatus($fragment, $status)) { 
            $this->logHandlingOnFragments($fragment, "Has changed to page fragment status from {$fragment->title} to {$status}");
        } 

        return redirect()->route('fragments.index');
    }

    /**
     * Edit view for a page fragment. 
     * 
     * @todo Implement phpunit test
     * 
     * @param  Fragment $fragment The resource entity form the page fragment.
     * @return View
     */
    public function edit(Fragment $fragment): View 
    {
        return view('fragments.edit', compact('fragment'));
    }

    /**
     * Method for updating a page fragment in the storage
     * 
     * @todo Implement phpunit testcase
     * 
     * @param  FragmentValidator $input    The form request class that handles the validation. 
     * @param  Fragment          $fragment The fragment entity from the storage
     * @return RedirectResponse
     */
    public function update(FragmentValidator $input, Fragment $fragment): RedirectResponse
    {
        if ($fragment->update($input->all())) {
            $fragment->editor()->associate($input->user())->save();

            $this->logHandlingOnFragments($fragment, "Updated the page fragment '{$fragment->title}'");
            flash("The page fragment '{$fragment->title} has been updated.'")->success()->important();
        }

        return redirect()->route('fragments.index');
    }
}
