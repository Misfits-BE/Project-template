<?php 

namespace App\Repositories;

use Spatie\Permission\Models\Role;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class RoleRepository
 *
 * @package App\Repositories
 */
class RoleRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return Role::class;
    }

    /**
     * Find or create a role resource in the storage
     *
     * @param  array $data The resource that needs to be find or created.
     * @return Role
     */
    public function firstOrCreate(array $data): Role
    {
        return $this->model->firstOrCreate($data);
    }
}