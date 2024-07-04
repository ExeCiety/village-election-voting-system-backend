<?php

namespace App\Services\User;

use App\Models\User\Voter;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface VoterService
{
    /**
     * Get All Candidate Pairs
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Contracts\Pagination\Paginator
     */
    public function getAllVoters(Request $request): Collection|Paginator;

    /**
     * Get Candidate Pair By Param
     *
     * @param \Illuminate\Http\Request $request
     * @param string $param
     * @return \App\Models\User\Voter|null
     */
    public function getVoterByParam(Request $request, string $param): Voter|null;

    /**
     * Create Voter
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Models\User\Voter
     */
    public function createVoter(Request $request): Voter;

    /**
     * Update Voter
     *
     * @param \Illuminate\Http\Request $request
     * @param string $param
     * @return void
     * @throws \Throwable
     */
    public function updateVoterByParam(Request $request, string $param): void;

    /**
     * Bulk Delete Voters
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     * @throws \Throwable
     */
    public function bulkDeleteVoters(Request $request): void;
}
