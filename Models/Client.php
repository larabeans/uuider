<?php

namespace App\Containers\Larabeans\Uuider\Models;

use Laravel\Passport\Client as OAuthClient;
use App\Containers\Larabeans\Uuider\Traits\HasUuid;

class Client extends OAuthClient
{
    use HasUuid;
}
