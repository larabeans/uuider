<?php

namespace App\Containers\Vendor\Uuider\Providers;

use App\Ship\Parents\Providers\MainProvider;
use Laravel\Passport\Passport;

class MainServiceProvider extends MainProvider
{
    public function boot(): void
    {
        // To use customize passport models to replace primary key type from auto-increment to uuid.
        Passport::useClientModel(\App\Containers\Vendor\Uuider\Models\Client::class);
        Passport::usePersonalAccessClientModel(\App\Containers\Vendor\Uuider\PersonalAccessClient::class);
    }

    public function register(): void
    {
        // Over-write permission configuration on run time to
        // update role and permissions models
        config(['permission.models.permission' => config('uuider.models.permission', \App\Containers\Vendor\Uuider\Models\Permission::class)]);
        config(['permission.models.permission' => config('uuider.models.role', \App\Containers\Vendor\Uuider\Models\Role::class)]);
    }

}
