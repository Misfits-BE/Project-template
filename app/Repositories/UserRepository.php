<?php 

namespace App\Repositories;

use App\Repositories\Criteria\Users\DeactivatedScope;
use App\User;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use App\Repositories\Criteria\Users\AdminScope;
use App\Repositories\Criteria\Users\SortRecentScope;
use App\Repositories\Criteria\Users\DeletedScope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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
    public function getUser($userId = null, array $columns = ['*']): User
    {
        $userId = is_null($userId) ? auth()->user()->id : $userId;
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
            case 'admins':      $this->pushCriteria(new AdminScope());       break;
            case 'recent':      $this->pushCriteria(new SortRecentScope());  break;
            case 'deleted':     $this->pushCriteria(new DeletedScope());     break;  
            case 'deactivated': $this->pushCriteria(new DeactivatedScope()); break;
        }

        return ['collection' => $this->simplePaginate(15), 'count' => $this->model->count()];
    }

    /**
     * Perform the delete operation for a user in the storage.
     *
     * @see    /App/Observers/UserObserver::deleted For the activity log.
     * @throws \Exception When no resource is found in the storage.
     *
     * @param  Request $input The collection bag that holds all the request information
     * @param  User $user The user resource entity from the storage.
     * @return void
     */
    public function performUserDelete(Request $input, $user): void 
    {
        Validator::make($input->all(), ['password' => 'string|required'])->validate();

        if (Hash::check($input->password, $this->getUser()->password)) { // The password match 
            $user->delete();
            flash("The login for {$user->firstname} {$user->lastname} has been deleted.")->success()->important();
        }
    }

    /**
     * The resource array for all the deactivation timespans.
     *
     * @return array
     */
    public function getDeactivatedPeriods(): array
    {
        return [
            '+1 week'  => 'Deactivate the user for one week.', '+2 weeks' => 'Deactivate the user for 2 weeks.',
            '+3 weeks' => 'Deactivate the user for 3 weeks',   '+4 weeks' => 'Deactivate the user for 4 weeks.'
        ];
    }
}