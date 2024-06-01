<?php

namespace App\Repositories\User;

use App\Models\User\User;

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
     * @return \App\Models\User\User|null
     */
    public function findForLogin(array $payload): ?User
    {
        return $this->user->where('username', $payload['username'])->first();
    }
}
