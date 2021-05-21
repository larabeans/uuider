<?php

namespace App\Containers\Vendor\Uuider\Models;

Use App\Containers\AppSection\Authorization\Models\Role as ApiatoRole;
use App\Containers\Vendor\Beaner\Traits\HasUuid;
use App\Containers\Vendor\Beaner\Traits\MultiTenantable;

class Role extends ApiatoRole
{
    use HasUuid;
    use MultiTenantable;
}
