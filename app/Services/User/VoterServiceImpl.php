<?php

namespace App\Services\User;

use App\Models\User\Voter;
use App\Repositories\User\VoterRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

readonly class VoterServiceImpl implements VoterService
{
    public function __construct(private VoterRepository $voterRepo)
    {
        //
    }

    /**
     * Get All Voters
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Contracts\Pagination\Paginator
     */
    public function getAllVoters(Request $request): Collection|Paginator
    {
        return $this->voterRepo->getAll([
            'paginate' => $request->input('paginate') === 'true',
            'per_page' => $request->input('per_page'),
            'page' => $request->input('page')
        ]);
    }

    /**
     * Get Voter By Param
     *
     * @param \Illuminate\Http\Request $request
     * @param string $param
     * @return \App\Models\User\Voter|null
     */
    public function getVoterByParam(Request $request, string $param): Voter|null
    {
        return $this->voterRepo->getByParam($param, [
            'fail' => true
        ]);
    }

    /**
     * Create Voter
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\User\Voter
     */
    public function createVoter(Request $request): Voter
    {
        return $this->voterRepo->create([
            'election_session_id' => $request->input('election_session_id'),
            'nik' => $request->input('nik'),
            'full_name' => $request->input('full_name'),
            'birth_date' => $request->input('birth_date'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'otp' => $this->generateUniqueOtp()
        ]);
    }

    /**
     * Generate Unique OTP
     *
     * @return string
     */
    private function generateUniqueOtp(): string
    {
        $otp = Str::upper(Str::random(8));
        if (!$this->voterRepo->isOtpExists($otp)) return $otp;

        return $this->generateUniqueOtp();
    }
}
