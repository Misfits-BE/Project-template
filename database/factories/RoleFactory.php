<?php

use Faker\Generator as Faker;
use Spatie\Permission\Models\Role;

/**
 * FragmentFactory
 *
 * @param  Faker $faker The instance for creating dummy data that will be used in the storage.
 * @return array
 */
$factory->define(Role::class, function (Faker $faker): array {
    return ['name' => $faker->name];
});
