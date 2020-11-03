<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class JobTag extends Model
{
    use HasFactory;
    //public $table="job_tags";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get all "Job" for a specific "JobTag"
     *
     * @return BelongsToMany
     */
    public function jobs()
    {
        return $this->belongsToMany('App\Models\Job', 'jobs_job_tags');
    }
}
