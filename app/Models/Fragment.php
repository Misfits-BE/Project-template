<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fragment 
 * 
 * @package App\Models
 */
class Fragment extends Model
{
    /**
     * Mass-assign field for the page fragments. 
     * 
     * @var array
     */
    protected $fillable = ['editor_id', 'is_public', 'route', 'title', 'content'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = ['is_public' => 'boolean'];
}
