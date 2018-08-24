<?php

namespace App\Models;

/**
 * Class Activity 
 * ----
 * Model extends the base package model. Because we need to Laravel Scout package driver
 * To make the internal logging system searchable. 
 * 
 * @package App\Models
 */
class Activity extends \Spatie\Activitylog\Models\Activity
{
    use \Laravel\Scout\Searchable;
}
