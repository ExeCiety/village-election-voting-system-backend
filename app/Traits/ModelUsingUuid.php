<?php

namespace App\Traits;

use Illuminate\Support\Str;

/**
 * Model Using Uuid Trait
 *
 * @method static creating(\Closure $param)
 */
trait ModelUsingUuid
{
    /**
     * Boot the trait
     *
     * @return void
     */
    protected static function bootUsesUuid(): void
    {
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string)Str::uuid();
            }
        });
    }

    /**
     * Get the incrementing value
     *
     * @return false
     */
    public function getIncrementing(): bool
    {
        return false;
    }

    /**
     * Get the key type
     *
     * @return string
     */
    public function getKeyType(): string
    {
        return 'string';
    }
}
