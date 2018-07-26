<?php

use Illuminate\Support\Facades\Route;

if (! function_exists('isActiveRoute')) {
    
    /**
     * Detect active route
     * ----
     * Compare given route with current route and return output if they match. 
     * Very useful for navigation, marking if the link is active. 
     * 
     * USAGE:
     *  
     * <li class="{{ isActiveRoute('home') }}">
     *      <a href="{{ route('home') }}">Home</a>
     * </li>
     * 
     * 
     * @param  string  $route   The route u want to match against.
     * @param  string  $output  The active class in your css. Defaults to active
     * @return mixed
     */
    function isActiveRoute(string $route, string $output = 'active') 
    {
        if (Route::currentRouteName() == $route) {
            return $output;
        } 
    }

}

if (! function_exists('areActiveRoutes')) {
    
    /**
     * Detect active routes 
     * ----
     * Compare given routes with the current route and return output if they match. 
     * Very useful for navigation, marking if the link is active. 
     * 
     * USAGE: 
     * 
     * <li class="{{ areActiveRoutes(['client.index', 'client.create', 'client.show']) }}">
     *      <a href="{{ route('client.index') }}"><i class="fa fa-users"></i> Clients</a>
     * </li>
     * 
     * @param  array  $routes   The routes u want to match against the current route. 
     * @param  string $output   The class in your css. Defaults to active
     * @return mixed
     */
    function areActiveRoutes(array $routes, string $output = 'active') 
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route) {
                return $output;
            } 
        }     
    }

}

