<?php

namespace App\Repositories\User;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Builder;

interface UserRepository
{
    /**
     * Find user for login
     *
     * @param array $payload
     * @return \Illuminate\Database\Eloquent\Builder|\App\Models\User\User|null
     */
    public function findForLogin(array $payload): User|Builder|null;

    /**
     * Create user
     *
     * @param array $payload
     * @return \App\Models\User\User
     */
    public function create(array $payload): User;
}
