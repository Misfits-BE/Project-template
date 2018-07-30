<?php

namespace App\Repositories\Criteria\Users;

use ActivismeBE\DatabaseLayering\Repositories\Criteria\Criteria;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class DeactivatedScope
 *
 * @package App\Repositories\Criteria\Users
 */
class DeactivatedScope extends Criteria
{
    /**
     * Method for attaching query qcopes to the main query
     *
     * @param  mixed                $model      The eloquent model where the scopes should be applied on.
     * @param  RepositoryInterface  $repository The interface from the repository class.
     * @return Builder
     */
    public function apply($model, RepositoryInterface $repository): Builder
    {
        return $model->onlyBanned();
    }
}