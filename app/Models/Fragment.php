<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\User;
use Laravel\Scout\Searchable;

/**
 * Class Fragment 
 * 
 * @package App\Models
 */
class Fragment extends Model
{
    use Searchable; 
    
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

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * Data relation for the page fragment editor information. 
     * 
     * @return BelongsTo 
     */
    public function editor(): BelongsTo 
    {
        return $this->belongsTo(User::class)->withDefault(['name' => config('app.name')]);
    }
}
