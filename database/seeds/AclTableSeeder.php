<?php

use App\User;
use Illuminate\Database\Seeder;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use Spatie\Permission\Models\Role;

/**
 * Class AclTableSeeder
 */
class AclTableSeeder extends Seeder
{
    /** @var \App\Repositories\RoleRepository $roleRepository */
    private $roleRepository;

    /** @var \App\Repositories\PermissionRepository $permissionRepository */
    private $permissionRepository;

    /**
     * AclTableSeeder Constructor
     *
     * @param  RoleRepository       $roleRepository         Abstraction layer for the ACL roles.
     * @param  PermissionRepository $permissionRepository   Abstraction layer for the ACL permissions.
     * @return void
     */
    public function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Seed the default permissions
        foreach ($this->permissionRepository->defaultPermissions() as $permission) {
            // TODO: Document the ->defaultPermissions() function
            $this->permissionRepository->firstOrCreate(['name' => $permission]);
        }

        $this->command->info('Default permissions added.');

        // Confirm roles needed.
        if ($this->command->confirm('Create roles for user, default is admin and user?', true)) {
            // Ask roles from input
            $inputRoles = $this->command->ask('Enter roles in comma separated format.', 'admin, user');

            foreach (explode(',', $inputRoles) as $role) { // Application roles
                $role = $this->roleRepository->firstOrCreate(['name' => trim($role)]);

                if ($role->name == 'admin') { // Assign all roles
                    $role->syncPermissions($this->permissionRepository->all());
                    $this->command->info('Admin granted all permissions');
                } else { // For others by default only read access
                    $role->syncPermissions($this->permissionRepository->getUserPermissions());
                }

                // Create one user for each role
                $this->createUser($role);
            }

            $this->command->info("Roles {$inputRoles} added successfully.");
        } else {
            $this->roleRepository->firstOrCreate(['name' => 'user']);
            $this->command->info('Added only default user role.');
        }
    }

    /**
     * Create a user with given role.
     *
     * @param  Role $role   The resource entity from the role
     * @return void
     */
    private function createUser(Role $role): void
    {
        $user = factory(User::class)->create(['password' => 'secret']);
        $user->assignRole($role->name);

        if ($role->name == 'admin') {
            $this->command->info('Here are your admin details to login:');
            $this->command->warn($user->email);
            $this->command->warn('Password is "secret"');
        }
    }
}
