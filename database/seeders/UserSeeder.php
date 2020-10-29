<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert( [ [
            'name' => 'Jan',
            'email' => 'jan@web.de',
            'password' => Hash::make('jan'),
            'address' => 'Da wo es am schönsten ist.'
        ], [
            'name' => 'Hugo',
            'email' => 'hugo@web.de',
            'password' => Hash::make('hugo'),
            'address' => 'Bei Peter.'
        ], [
            'name' => 'Peter',
            'email' => 'peter@web.de',
            'password' => Hash::make('peter'),
            'address' => 'Bei Hugo.'
        ] ] );
    }
}
