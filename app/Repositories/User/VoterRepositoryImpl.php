<?php

namespace App\Repositories\User;

use App\Models\User\Voter;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

readonly class VoterRepositoryImpl implements VoterRepository
{
    public function __construct(private Voter $voter)
    {
        //
    }

    /**
     * Get All Voters
     *
     * @param array $payload
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Contracts\Pagination\Paginator
     */
    public function getAll(array $payload = []): Collection|Paginator
    {
        if (isset($payload['paginate']) && $payload['paginate'])
            return $this->voter->simplePaginate($payload['per_page'] ?? null);

        return $this->voter->get();
    }

    /**
     * Get Voter By Param
     *
     * @param string|null $param
     * @param array $payload
     * @return \App\Models\User\Voter|null
     */
    public function getByParam(?string $param = null, array $payload = []): Voter|null
    {
        $voter = $this->voter->when($param, function ($query) use ($param) {
            return $query->where('id', $param);
        });

        if ($payload['fail'] ?? false) return $voter->firstOrFail();
        return $voter->first();
    }

    /**
     * Check If OTP Exists
     *
     * @param string $otp
     * @return bool
     */
    public function isOtpExists(string $otp): bool
    {
        return $this->voter->where('otp', $otp)->exists();
    }

    /**
     * Create Voter
     *
     * @param array $data
     * @return Voter
     */
    public function create(array $data): Voter
    {
        return $this->voter->create(
            array_filter([
                'election_session_id' => $data['election_session_id'] ?? null,
                'nik' => $data['nik'] ?? null,
                'full_name' => $data['full_name'] ?? null,
                'birth_date' => $data['birth_date'] ?? null,
                'address' => $data['address'] ?? null,
                'gender' => $data['gender'] ?? null,
                'otp' => $data['otp'] ?? null
            ], isNotNullArrayFilter())
        );
    }
}
