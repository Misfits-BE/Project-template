<?php 

namespace App\Repositories;

use App\User;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

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

    public function getUsers(): array 
    {
        $collection = $this->simplePaginate(15);
        return ['collection' => $collection, 'count' => $this->model->count()];
    }
}