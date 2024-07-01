<?php

namespace App\Services\User;

use App\Models\User\CandidatePair;
use App\Repositories\User\CandidatePairRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

readonly class CandidatePairServiceImpl implements CandidatePairService
{
    public function __construct(private CandidatePairRepository $candidatePairRepo)
    {
        //
    }

    /**
     * Get All Candidate Pairs
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Contracts\Pagination\Paginator
     */
    public function getAllCandidatePairs(Request $request): Collection|Paginator
    {
        return $this->candidatePairRepo->getAll([
            'paginate' => $request->input('paginate') === 'true',
            'per_page' => $request->input('per_page'),
            'page' => $request->input('page')
        ]);
    }

    /**
     * Get Candidate Pair By Param
     *
     * @param \Illuminate\Http\Request $request
     * @param string $param
     * @return \App\Models\User\CandidatePair|null
     */
    public function getCandidatePairByParam(Request $request, string $param): CandidatePair|null
    {
        return $this->candidatePairRepo->getByParam($param, [
            'fail' => true
        ]);
    }

    /**
     * Create Candidate Pair
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function createCandidatePair(Request $request): void
    {
        $this->candidatePairRepo->create([
            'election_session_id' => $request->input('election_session_id'),
            'name' => $request->input('name'),
            'first_candidate_name' => $request->input('first_candidate_name'),
            'second_candidate_name' => $request->input('second_candidate_name'),
            'description' => $request->input('description'),
            'image_url' => $request->input('image_url'),
            'number' => $request->input('number')
        ]);
    }

    /**
     * Update Candidate Pair
     *
     * @param \Illuminate\Http\Request $request
     * @param string $param
     * @return void
     */
    public function updateCandidatePairByParam(Request $request, string $param): void
    {
        $this->candidatePairRepo->updateByParam($param, [
            'election_session_id' => $request->input('election_session_id'),
            'name' => $request->input('name'),
            'first_candidate_name' => $request->input('first_candidate_name'),
            'second_candidate_name' => $request->input('second_candidate_name'),
            'description' => $request->input('description'),
            'image_url' => $request->input('image_url'),
            'number' => $request->input('number')
        ]);
    }

    /**
     * Bulk Delete Candidate Pair
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function bulkDeleteCandidatePairs(Request $request): void
    {
        $this->candidatePairRepo->bulkDelete([
            'ids' => $request->input('ids')
        ]);
    }
}
