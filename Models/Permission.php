<?php

namespace App\Containers\Vendor\Uuider\Models;

use App\Containers\AppSection\Authorization\Models\Permission as ApiatoPermission;
use App\Containers\Vendor\Beaner\Traits\HasUuid;
use App\Containers\Vendor\Beaner\Traits\MultiTenantable;

class Permission extends ApiatoPermission
{
    use HasUuid;
    use MultiTenantable;
}
