<?php

use Faker\Generator as Faker;
use App\Models\Fragment; 
use App\User;

/**
 * FragmentFactory 
 * 
 * @param  Faker $faker The instance for creating dummy data that will be used in the storage. 
 * @return array
 */
$factory->define(Fragment::class, function (Faker $faker): array {
    return [
        'editor_id' => factory(User::class)->create()->id,
        'is_public' => $faker->boolean, 
        'route' => 'factory.route', 
        'title' => $faker->sentence, 
        'content' => $faker->paragraph,
    ];
});
