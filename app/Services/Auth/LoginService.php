<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;

interface LoginService
{
    /**
     * Login
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function login(Request $request): array;

    /**
     * Logout
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function logout(Request $request): void;
}
