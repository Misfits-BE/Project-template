<?php

namespace Tests;

use App\User;
use Spatie\Permission\Models\Role;

/**
 * Trait CreatesUser
 *
 * @package Tests
 */
trait CreatesUser
{
    /**
     * Function for creating a new role in the testing database.
     *
     * @param  string $name The name for the role that needs to be created.
     * @return string
     */
    protected function createRole(string $name): string
    {
        return factory(Role::class)->create(['name' => $name])->name;
    }

    /**
     * Create an normal user in the testing database.
     *
     * @param  string $role The name from the ACL access role.
     * @return User
     */
    public function createUser(string $role): User
    {
        return factory(User::class)->create()->assignRole(
            $this->createRole($role)
        );
    }

    /**
     * Create an inactive user in the testing database.
     *
     * @return User
     */
    public function createUserInactive(): User
    {
        $role = $this->createRole('admin');
        $user = factory(User::class)->create()->assignRole($role)->ban();

        return User::find($user->id);
    }
}