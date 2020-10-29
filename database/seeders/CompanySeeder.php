<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert( [ [
            'name' => 'tolles Unternehmen',
            'address' => 'Berlin Mitte',
            'description' => 'Ein tolles Unternehmen in Berlin Mitte!',
            'user_id' => '1'
        ] ] );
    }
}
