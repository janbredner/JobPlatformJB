<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_categories')->insert( [ [
                'name' => 'cooler IT Job',
                'description' => 'alle coolen IT Jobs in einer Kategorie!'
            ], [
                'name' => 'der Rest',
                'description' => 'alle anderen Jobs'
        ] ] );
    }
}
