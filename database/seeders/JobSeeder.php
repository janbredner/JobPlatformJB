<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert( [ [
            'name' => 'Ein cooler Job!',
            'description' => 'Ein wirklich toller und voll cooler Job!',
            'user_id' => '1',
            'company_id' => '1',
            'job_category_id' => '1'
        ], [
            'name' => 'Ein langweiliger Job!',
            'description' => 'Ein wirklich langweiliger Job! Zum einschlafen!',
            'user_id' => '1',
            'company_id' => '1',
            'job_category_id' => '2'
        ],[
            'name' => 'Ein Praktikantenjob!',
            'description' => 'Übe schon mal Kaffeekochen!',
            'user_id' => '1',
            'company_id' => '1',
            'job_category_id' => '1'
        ] ] );
    }
}
