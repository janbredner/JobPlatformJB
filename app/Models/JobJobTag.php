<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobJobTag extends Model
{
    use HasFactory;

    protected $table = 'jobs_job_tags';

    protected $fillable = [
        'job_id',
        'job_tag_id',
    ];
}
