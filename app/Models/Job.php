<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'company_id',
        'job_category_id',
    ];

    /**
     * Get the "JobCategory" for a specific "Job"
     *
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\JobCategory', 'job_category_id');
    }

    /**
     * Get the "Company" for a specific "Job"
     *
     * @return BelongsTo
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    /**
     * Get the "User" (the creator) for a specific "Job"
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get all "JobTag" for a specific "Job"
     *
     * @return BelongsToMany
     */
    public function jobTags()
    {
        return $this->belongsToMany('App\Models\JobTag', 'jobs_job_tags');
    }
}
