<?php

namespace App\Repositories\User;

use App\Models\User\Voter;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

interface VoterRepository
{
    /**
     * Get All Voters
     *
     * @param array $payload
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Contracts\Pagination\Paginator
     */
    public function getAll(array $payload = []): Collection|Paginator;

    /**
     * Get Voter By Param
     *
     * @param string|null $param
     * @param array $payload
     * @return \App\Models\User\Voter|null
     */
    public function getByParam(?string $param = null, array $payload = []): Voter|null;

    /**
     * Check If OTP Exists
     *
     * @param string $otp
     * @return bool
     */
    public function isOtpExists(string $otp): bool;

    /**
     * Create Voter
     *
     * @param array $data
     * @return Voter
     */
    public function create(array $data): Voter;
}
