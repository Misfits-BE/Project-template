<?php

use Illuminate\Database\Seeder;
use App\Models\Fragment;
use App\Repositories\FragmentsRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class PageFragmentSeeder
 */
class PageFragmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param  FragmentsRepository $fragmentRepository Abstraction layer between seeder an resource.
     * @return void
     */
    public function run(FragmentsRepository $fragmentRepository): void
    {
        // truncate the database table. 
        DB::table('fragments')->delete();

        $fragmentRepository->create(
            ['is_public' => true, 'route' => 'policies.privacy', 'title' => 'Privacy terms', 'content' => 'Privacy disclaimer']
        ); 
        
        $fragmentRepository->create(
            ['is_public' => true, 'route' => 'policys.tems', 'title' => 'Terms of service', 'content' => 'Terms of service' ]
        );
    }
}
