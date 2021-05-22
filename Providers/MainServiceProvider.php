<?php

namespace App\Containers\Vendor\Uuider\Providers;

use App\Ship\Parents\Providers\MainProvider;
use Laravel\Passport\Passport;

class MainServiceProvider extends MainProvider
{
    public function boot(): void
    {
        // To use customize passport models to replace primary key type from auto-increment to uuid.
        Passport::useClientModel(config('uuider.models.client',\App\Containers\Vendor\Uuider\Models\Client::class));
        Passport::usePersonalAccessClientModel(config('uuider.models.personal_access_client',\App\Containers\Vendor\Uuider\Models\PersonalAccessClient::class));
    }

    public function register(): void
    {
        // Over-write permission configuration on run time to
        // update role and permissions models
        config(['permission.models.permission' => config('beaner.models.permission', \App\Containers\Vendor\Beaner\Models\Permission::class)]);
        config(['permission.models.role' => config('beaner.models.role', \App\Containers\Vendor\Beaner\Models\Role::class)]);
    }

}
