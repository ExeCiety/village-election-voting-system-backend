<?php

namespace App\Services\Election;

use App\Models\Election\ElectionSession;
use App\Repositories\Election\ElectionSessionRepository;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

readonly class ElectionSessionServiceImpl implements ElectionSessionService
{
    public function __construct(private ElectionSessionRepository $electionSessionRepo)
    {
        //
    }

    /**
     * Get All Election Sessions
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Pagination\LengthAwarePaginator
     */
    public function getAllElectionSessions(Request $request): Collection|Paginator
    {
        return $this->electionSessionRepo->getAll([
            'paginate' => $request->input('paginate') === 'true',
            'per_page' => $request->input('per_page'),
            'page' => $request->input('page')
        ]);
    }

    /**
     * Get Election Session By Param
     *
     * @param \Illuminate\Http\Request $request
     * @param string $param
     * @return \App\Models\Election\ElectionSession|null
     */
    public function getElectionSessionByParam(Request $request, string $param): ElectionSession|null
    {
        return $this->electionSessionRepo->getByParam($param, [
            'fail' => true
        ]);
    }

    /**
     * Create Election Session
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function createElectionSession(Request $request): void
    {
        $this->electionSessionRepo->create([
            'name' => $request->input('name'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date')
        ]);
    }

    /**
     * Update Election Session
     *
     * @param \Illuminate\Http\Request $request
     * @param string $param
     * @return void
     */
    public function updateElectionSessionByParam(Request $request, string $param): void
    {
        $this->electionSessionRepo->updateByParam($param, [
            'name' => $request->input('name'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date')
        ]);
    }

    /**
     * Bulk Delete Election Session
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function bulkDeleteElectionSessions(Request $request): void
    {
        $this->electionSessionRepo->bulkDelete([
            'ids' => $request->input('ids')
        ]);
    }
}
