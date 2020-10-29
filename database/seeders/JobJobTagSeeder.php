<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobJobTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('jobs_job_tags')->insert( [ [
            'job_id' => '1',
            'job_tag_id' => '1'
        ], [
            'job_id' => '1',
            'job_tag_id' => '2'
        ], [
            'job_id' => '1',
            'job_tag_id' => '3'
        ], [
            'job_id' => '2',
            'job_tag_id' => '1'
        ], [
            'job_id' => '3',
            'job_tag_id' => '1'
        ], [
            'job_id' => '3',
            'job_tag_id' => '2'
        ], [
            'job_id' => '3',
            'job_tag_id' => '4'
        ] ] );
    }
}
