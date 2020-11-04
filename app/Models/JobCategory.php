<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobCategory extends Model
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
    ];

    public static function validationRules() : array
    {
        return [
            'name'          => 'string|min:1|max:150',
            'description'   => 'string|max:150|nullable',
        ];
    }

    /**
     * Get all "Jobs" belonging to a "JobCategory"
     *
     * @return HasMany
     */
    public function getJobs()
    {
        return $this->hasMany('App\Models\Job');
    }
}
