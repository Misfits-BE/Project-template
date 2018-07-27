<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Ask for DB migration refresh, default is no
        if ($this->command->confirm('Do you wish to refresh migrations before seeding, it will clear all old data?')) {
            // Call the php artisan migrate:refresh
            $this->command->call('migrate:refresh');
            $this->command->warn('Data cleared, starting from blank database.');
        }

        // Run other seeders in the system.
        $this->call(AclTableSeeder::class);
    }
}
