<?php 

namespace App\Repositories\Criteria\Activities; 

use ActivismeBE\DatabaseLayering\Repositories\Criteria\Criteria; 
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface; 
use Illuminate\Database\Eloquent\Builder;

/**
 * Class LogIdentifierScope
 * 
 * @package App\Repositories\Criteria\Activities
 */
class LogIdentifierScope extends Criteria
{
    /** @var string $identifier */
    public $identifier; 

    /**
     * LogIdentifierScope constructor. 
     * 
     * @param  string $identifier The log name u want to display 
     * @return void
     */
    public function __construct(string $identifier) 
    {
        $this->identifier = $identifier;
    }

    /**
     * Methodfor attaching query scopes to the main query 
     * 
     * @param  mixed                $model       The eloquent model where the scopes should be applied. 
     * @param  RepositoryInterface  $repository  The interface form the repository class. 
     * @return Builder
     */
    public function apply($model, RepositoryInterface $repository): Builder 
    {
        return $model->where('log_name', $this->identifier);
    }
}