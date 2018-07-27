<?php 

namespace App\Repositories;

use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRepository
 *
 * @package App\Repositories
 */
class PermissionRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return Permission::class;
    }

    /**
     * The array form all the default permissions in the application.
     *
     * @return array
     */
    public function defaultPermissions(): array
    {
        return [];
    }

    /**
     * Find aresource in the database or create one.
     *
     * @param  array $data The resource that needs to be find or created
     * @return Permission
     */
    public function firstOrCreate(array $data): Permission
    {
        return $this->firstOrCreate($data);
    }

    /**
     * Get all the permission resources for normal users.
     *
     * @return Collection
     */
    public function getUserPermissions(): Collection
    {
        return $this->model->where('name', 'LIKE', 'view_%')->get();
    }
}