<?php

namespace App\Containers\Larabeans\Uuider\Providers;

use App\Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;
use Laravel\Passport\Passport;

class MainServiceProvider extends ParentMainServiceProvider
{
    public function boot(): void
    {
        // To use customize passport models to replace primary key type from auto-increment to uuid.
        Passport::useClientModel(config('uuider.models.client', \App\Containers\Larabeans\Uuider\Models\Client::class));
        Passport::usePersonalAccessClientModel(config('uuider.models.personal_access_client', \App\Containers\Larabeans\Uuider\Models\PersonalAccessClient::class));
    }

    public function register(): void
    {
        // Over-write permission configuration on run time to
        // update role and permissions models
        config(['permission.models.permission' => config('core.models.permission', \App\Containers\Larabeans\Core\Models\Permission::class)]);
        config(['permission.models.role' => config('core.models.role', \App\Containers\Larabeans\Core\Models\Role::class)]);
    }

}
