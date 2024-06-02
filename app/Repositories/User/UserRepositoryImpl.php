<?php

namespace App\Repositories\User;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Builder;

readonly class UserRepositoryImpl implements UserRepository
{
    public function __construct(private User $user)
    {
        //
    }

    /**
     * Find user for login
     *
     * @param array $payload
     * @return \Illuminate\Database\Eloquent\Builder|\App\Models\User\User|null
     */
    public function findForLogin(array $payload): User|Builder|null
    {
        return $this->user
            ->where('username', $payload['username'])
            ->with([
                'roles' => function ($query) {
                    return $query->select([
                        'id', 'name'
                    ]);
                }
            ])
            ->first();
    }

    /**
     * Create user
     *
     * @param array $payload
     * @return \App\Models\User\User
     */
    public function create(array $payload): User
    {
        return $this->user->create(
            array_filter([
                'name' => $payload['name'] ?? null,
                'username' => $payload['username'] ?? null,
                'password' => $payload['password'] ?? null
            ], isNotNullArrayFilter())
        );
    }
}
