> [Larabeans](README.md) > Uuider

---

# Uuider

> APIATO container to modify/replace primary key type from auto-increment to UUID.

* [Overview](#overview)
* [Migrations](#migrations)
* [Models](#models)
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

- User, Role and Permission models are used that are provided in core container. If you want to use your own
  models, write your own model and use HasUuid trait in your custom models. Or just extend existing models and add your
  custom functionality in those models. You also have to update core config file models values to make this
  work for your custom models

---

## Environment File

- Update env file user namespace as USER_NAMESPACE=App\Containers\Larabeans\Core\Models\

OR

Create you own user model and use trait from core container as

```phpt
    use HasUuid;
```

---
> [Larabeans](README.md) > Uuider [⬆](#uuider)
