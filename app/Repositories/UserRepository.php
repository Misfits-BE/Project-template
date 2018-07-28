<?php 

namespace App\Repositories;

use App\User;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use App\Repositories\Criteria\Users\AdminScope;
use App\Repositories\Criteria\Users\SortRecent;

/**
 * Class UserRepository
 *
 * @package App\Repositories
 */
class UserRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }

    /**
     * Get a user resource out off the storage.
     *
     * @param  int|null $userId     The unique identifier from the resource. Defaults to auth user.
     * @param  array    $columns    The columns attributes u need from the resource
     * @return User
     */
    public function getUser(?int $userId = null, array $columns = ['*']): User
    {
        if (is_null($userId)) {
            return $this->findOrFail(auth()->user()->id, $columns);
        }

        return $this->findOrFail($userId, $columns);
    }

    /**
     * Function to determine the user collection out of the database.
     *
     * @param  null|string $filter The filter parameter for query builder instance.
     * @return array
     */
    public function getUsers(?string $filter): array
    {
        switch ($filter) {
            case 'admins': $this->pushCriteria(new AdminScope()); break;
            case 'recent': $this->pushCriteria(new SortRecent()); break;
        }

        return ['collection' => $this->simplePaginate(15), 'count' => $this->model->count()];
    }
}