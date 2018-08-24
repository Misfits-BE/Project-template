<?php 

namespace App\Repositories;

use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use App\Repositories\Criteria\Activities\LogIdentifierScope;
use App\Models\Activity; 

/**
 * Class ActivityRepository
 *
 * @package App\Repositories
 */
class ActivityRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return Activity::class;
    }

    /**
     * Get the logs out of the storage for displaying them in the view. 
     * 
     * @param  int         $perPage The amount of resultes u want to display per page. 
     * @param  null|string $filter  The filter parameter for the query builder instance. 
     * @return array
     */
    public function getLogs(int $perPage = 15, ?string $filter): array 
    {
        switch ($filter) { 
            case 'users':       $this->pushCriteria(new LogIdentifierScope('user'));      break; 
            case 'fragments':   $this->pushCriteria(new LogIdentifierScope('fragments')); break; 
        }

        return ['collection' => $this->simplePaginate($perPage), 'count' => $this->model->count()];
    }

    /**
     * Search for a specific log resource in the storage.
     * 
     * @param  string $term The user given search term.
     * @return array
     */
    public function getSearch(string $term):  array 
    {
        $dbQuery = $this->model->search($term);
        return ['collection' => $dbQuery->paginate(), 'count' => count($dbQuery->get())];
    }
}