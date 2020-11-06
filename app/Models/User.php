<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
    ];

    public static function validationRules() : array
    {
        return [
            'name'          => 'string|min:1|max:150',
            'email'         => 'string|max:150|email',
            'password'      => 'string|max:150',
            'address'       => 'string|max:150'
        ];
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all "Jobs" belonging to a "User" (creator of the job)
     *
     * @return HasMany
     */
    public function getJobs()
    {
        return $this->hasMany('App\Models\Job');
    }

    /**
     * Get all "Companies" belonging to a "User" (creator of the company)
     *
     * @return HasMany
     */
    public function getCreatedCompanies()
    {
        return $this->hasMany('App\Models\Company');
    }

    /**
     * Get all "Companies" belonging to a "User" (not the creator of the company)
     *
     * @return BelongsToMany
     */
    public function getCompanies()
    {
        return $this->belongsToMany('App\Models\Company', 'users_companies');
    }
}
