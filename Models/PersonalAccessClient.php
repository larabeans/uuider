<?php

namespace App\Containers\Larabeans\Uuider\Models;

use Laravel\Passport\PersonalAccessClient as OAuthPersonalAccessClient;
use App\Containers\Larabeans\Uuider\Traits\HasUuid;

class PersonalAccessClient extends OAuthPersonalAccessClient
{
    use HasUuid;
}
