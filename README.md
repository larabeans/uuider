>[Larabeans](README.md) > Uuider

---

# Uuider

> APIATO container to modify/replace primary key type from auto-increment to UUID.

* [Overview](#overview)
* [Migrations](#migrations)
* [Models](#models)
* [Apiato Container Conflicts](#apiato-container-conflicts)
    * [Authorization Container](#authorization-container)
    * [User Container](#user-container)
* [Environment File](#environment-file)

---

## Overview

---

## Migrations
Contains new migrations to update core tables primary key type to uuid, which is incremental by default.

---

## Models
Adds new models.

- Client
- PersonalAccessClient

- User, Role and Permission models are used that are provided in core (beaner container). If you want to use your own models, write your own model and use HasUuid trait in your custom models. Or just extend existing models and add your custom functionality in those models. You also have to update core (beaner) config file models values to make this work for your custom models
---

## Apiato Container Conflicts

### Authorization Container

#### Tasks
> - Task accepts id or name, and search in database table column id or name based on type of provided param. i.e. if param is of int type it will search in id column otherwise in name column.
    After updating id type to uuid this check fails. So we need to update this as if type is numeric or string is uuid, look into id column else in name column.
> - Below tasks need to be updated, these changes will not affect Apiato repo, try to create pull requets talk to Apiato maintainers.

- FindRoleTask.php

  Update check as below
    ```phpt
        $query = (is_numeric($roleNameOrId) || Str::isUuid($roleNameOrId)) ? ['id' => $roleNameOrId] : ['name' => $roleNameOrId];
    ```
- FindPermissionTask.php

  Update check as below
    ```phpt
        $query = (is_numeric($permissionNameOrId) || Str::isUuid($permissionNameOrId)) ? ['id' => $permissionNameOrId] : ['name' => $permissionNameOrId];
    ```

#### Repositories
> Below repositories are using hardcoded models which limits the spatie package option for extending models. Need to replace from configuration to allow
model overriding option provided in spatie package.

- PermissionRepository.php

  Find and remove below statement
    ```phpt
        use App\Containers\AppSection\Authorization\Models\Permission;
    ```
  Then find below
    ```phpt
        return Permission::class;
    ```
  and replace with
    ```phpt
        return config('permission.models.permission');
    ```
- RoleRepository.php

  Find and remove below statement
    ```phpt
        use App\Containers\AppSection\Authorization\Models\Role;
    ```
  Then find below
    ```phpt
        return Role::class;
    ```
  and replace with
    ```phpt
        return return config('permission.models.role');
    ```

---

### User Container

#### Repositories
> Below repositories are using hardcoded models which limits the spatie package option for extending models. Need to replace from configuration to allow
model overriding option provided in spatie package.

- UserRepository.php

  Add below function
    ```phpt
        public function model(): string
        {
            return config('auth.providers.users.model');
        }
    ```

---

## Environment File
- Update env file user namespace as USER_NAMESPACE=App\Containers\Vendor\Beaner\Models\

OR 

Create you own user model and use trait from core (beaner) container as 

```phpt
    use HasUuid;
```

---
>[Larabeans](README.md) > Uuider [⬆](#uuider)
