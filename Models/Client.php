<?php

namespace App\Containers\Vendor\Uuider\Models;

use Laravel\Passport\Client as OAuthClient;
use App\Containers\Vendor\Uuider\Traits\HasUuid;

class Client extends OAuthClient
{
    use HasUuid;
}
