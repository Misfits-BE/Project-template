<?php 

namespace App\Repositories;

use App\Models\Fragment;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class FragmentsRepository
 *
 * @package App\Repositories
 */
class FragmentsRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return Fragment::class;
    }

    public function getIndexResults(int $perPage = 15): array 
    {
        return ['content' => $this->simplePaginate($perPage), 'count' => $this->model->count()];
    }
}