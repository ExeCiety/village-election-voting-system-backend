<?php

namespace App\Services\Auth;

use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

readonly class LoginServiceImpl implements LoginService
{
    public function __construct(private UserRepository $userRepository)
    {
        //
    }

    /**
     * Login
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     * @throws \Exception
     */
    public function login(Request $request): array
    {
        $user = $this->userRepository->findForLogin($request->only('username'));
        if (!$user) {
            throw new \Exception(
                trans('auth.incorrect_credentials'),
                Response::HTTP_BAD_REQUEST
            );
        }

        if (!password_verify($request->input('password'), $user->password)) {
            throw new \Exception(
                trans('auth.incorrect_credentials'),
                Response::HTTP_BAD_REQUEST
            );
        }

        $token = $user->createToken('auth_token');

        return [
            'user' => $user,
            'bearer_token' => $token->accessToken,
            'expired_at' => $token->token->expires_at
        ];
    }

    /**
     * Logout
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     * @throws \Exception
     */
    public function logout(Request $request): void
    {
        $user = $request->user();
        if (!$user) return;

        try {
            DB::beginTransaction();

            $user->tokens()->each(fn($token) => $token->revoke());

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
