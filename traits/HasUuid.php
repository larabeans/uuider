<?php

namespace App\Containers\Vendor\Uuider\Traits;

use Facades\Str;

/**
 * Class HasUuid.
 *
 * @author  Syed Ali Kazmi <ali@kazmi.me>
 */
trait HasUuid
{
    /**
     * Boot function from laravel.
     */
    protected static function bootHasUuid()
    {
        if (config('uuider.installed', false)) {
            static::creating(function ($model) {
                if (!$model->getIncrementing()) {
                    $model->keyType = 'string';
                    $model->incrementing = false;
                    $model->{$model->getKeyName()} = $model->{$model->getKeyName()} ?: (string)Str::orderedUuid();
                }
            });
        }
    }

    public function getIncrementing()
    {
        return !config('uuider.installed', false);
    }

    public function getKeyType()
    {
        return config('uuider.installed', false) ? 'string' : 'integer';
    }
}
