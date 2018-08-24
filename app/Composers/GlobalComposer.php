<?php

namespace App\Composers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\View\View;

/**
 * Class GlobalComposer
 *
 * @package App\Composers
 */
class GlobalComposer
{
    /** @var \Illuminate\Contracts\Auth\Guard $auth*/
    protected $auth;

    /**
     * Create a new global layout composer
     *
     * @param  Guard $auth   The authentication guard
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Bind data to the view
     *
     * @param  View $view   The view builder instance
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with('authUser', $this->auth->user());
    }
}

