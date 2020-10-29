<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_tags') -> insert( [ [
            'name' => 'Vollzeit',
            'description' => '40h/Woche'
        ], [
            'name' => 'Homeoffice',
            'description' => 'Arbeit im home office möglich.'
        ], [
            'name' => 'Chef',
            'description' => 'Chef von allen sein.'
        ], [
            'name' => 'Praktikant',
            'description' => 'Fähigkeit Kaffee kochen zu können ist notwendig.'
        ] ] );
    }
}
