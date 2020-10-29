<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsJobTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_job_tags', function (Blueprint $table) {
            //$table->id();
            $table->foreignId('job_id')->constrained();
            $table->foreignId('job_tag_id')->constrained();
            $table->index(['job_id', 'job_tag_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs_job_tags');
    }
}
