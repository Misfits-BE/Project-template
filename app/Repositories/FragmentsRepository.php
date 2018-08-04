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

    /**
     * Get the page fragments for the index management page. 
     * 
     * @param  int $perPage The amount of resources you want to display per page. 
     * @return array
     */
    public function getIndexResults(int $perPage = 15): array 
    {
        return ['content' => $this->simplePaginate($perPage), 'count' => $this->model->count()];
    }

    /**
     * Search for a specific fragment resource in the storage. 
     * 
     * @param  string $term The user given search term. 
     * @return array 
     */
    public function getSearch(string $term): array 
    {
        $dbQuery = $this->model->search($term); 
        return ['content' => $dbQuery->paginate(), 'count' => count($dbQuery->get())];
    }

    /**
     * Update the page fragment public status. 
     * 
     * @param  Fragment $fragment   The fragment entity from the resource.
     * @param  string   $status     The is_pulic status identifier for the resource.
     * @return RedirectResponse
     */
    public function updateStatus(Fragment $fragment, string $status): bool 
    {
        switch ($status) {
            case 'public': return $fragment->update(['is_public' => true]); 
            case 'draft':  return $fragment->update(['is_public' => false]);

            // NO valid option given so return a fasle by default/ 
            default: return false;
        }
    }
}