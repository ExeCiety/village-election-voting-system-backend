<?php

namespace App\Repositories\User;

use App\Models\User\User;

interface UserRepository
{
    /**
     * Find user for login
     *
     * @param array $payload
     * @return \App\Models\User\User|null
     */
    public function findForLogin(array $payload): ?User;
}
