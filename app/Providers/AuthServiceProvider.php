<?php

namespace App\Providers;

use App\Models\JobTag;
use App\Policies\JobTagPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Job' => 'App\Policies\JobPolicy',
        'App\Models\JobTag' => 'App\Policies\JobTagPolicy',
        'App\Models\Company' => 'App\Policies\CompanyPolicy',
        'App\Models\JobCategory' => 'App\Policies\JobCategoryPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
