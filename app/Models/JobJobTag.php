<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class JobJobTag extends Pivot //Model in pivot ändern
{
    use HasFactory;

    protected $table = 'jobs_job_tags';

    protected $fillable = [
        'job_id',
        'job_tag_id',
    ];
}
