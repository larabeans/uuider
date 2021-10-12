<?php

namespace App\Containers\Vendor\Uuider\Models;

use Laravel\Passport\PersonalAccessClient as OAuthPersonalAccessClient;
use App\Containers\Vendor\Beaner\Traits\HasUuid;

class PersonalAccessClient extends OAuthPersonalAccessClient
{
    use HasUuid;
}
