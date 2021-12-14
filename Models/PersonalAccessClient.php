<?php

namespace App\Containers\Vendor\Uuider\Models;

use Laravel\Passport\PersonalAccessClient as OAuthPersonalAccessClient;
use App\Containers\Vendor\Uuider\Traits\HasUuid;

class PersonalAccessClient extends OAuthPersonalAccessClient
{
    use HasUuid;
}
