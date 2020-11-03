<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'description',
        'user_id',
    ];

    /**
     * Get all "Jobs" belonging to a "Company"
     *
     * @return HasMany
     */
    public function getJobs()
    {
        return $this->hasMany('App\Models\Job');
    }

    /**
     * Get the "User" (the creator) for a specific "Company"
     *
     * @return BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }


    /**
     * Get all "Companies" belonging to a "User" (not the creator of the company)
     *
     * @return BelongsToMany
     */
    public function getUsers()
    {
        return $this->belongsToMany('App\Models\User', 'users_companies');
    }
}
