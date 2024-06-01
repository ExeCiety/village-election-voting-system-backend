<?php

namespace App\Models\User;

use App\Traits\ModelUsingUuid;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

/**
 * User Model
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 *
 * @property string name
 * @property string username
 * @property string password
 */
class User extends Authenticatable
{
    use ModelUsingUuid, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
