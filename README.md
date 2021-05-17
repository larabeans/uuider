# Uuider

APIATO container to modify/replace primary key type from auto-increment to UUID.

## Migration
Contains new migrations to update core tables primary key type to uuid, which is incremental by default.

## Models
Adds new models.

- Models/Permission.php
- Models/Role.php
- Models/User.php
- Models/Client.php
- Models/PersonalAccessClient.php

## .env file
- Update user namespace as USER_NAMESPACE=App\Containers\Vendor\Uuider\Models\
