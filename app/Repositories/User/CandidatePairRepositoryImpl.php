<?php

namespace App\Repositories\User;

use App\Models\User\CandidatePair;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

readonly class CandidatePairRepositoryImpl implements CandidatePairRepository
{
    public function __construct(private CandidatePair $candidatePair)
    {
        //
    }

    /**
     * Get Election Sessions
     *
     * @param array $payload
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Contracts\Pagination\Paginator
     */
    public function getAll(array $payload = []): Collection|Paginator
    {
        if (isset($payload['paginate']) && $payload['paginate'])
            return $this->candidatePair->simplePaginate($payload['per_page'] ?? null);

        return $this->candidatePair->get();
    }

    /**
     * Get Election Session By Param
     *
     * @param string|null $param
     * @param array $payload
     * @return \App\Models\User\CandidatePair|null
     */
    public function getByParam(?string $param = null, array $payload = []): CandidatePair|null
    {
        $candidatePair = $this->candidatePair->when($param, function ($query) use ($param) {
            return $query->where('id', $param);
        });

        if ($payload['fail'] ?? false) return $candidatePair->firstOrFail();
        return $candidatePair->first();
    }

    /**
     * Create Election Session
     *
     * @param array $payload
     * @return \App\Models\User\CandidatePair
     */
    public function create(array $payload): CandidatePair
    {
        return $this->candidatePair->create(
            array_filter([
                'election_session_id' => $payload['election_session_id'] ?? null,
                'first_candidate_name' => $payload['first_candidate_name'] ?? null,
                'second_candidate_name' => $payload['second_candidate_name'] ?? null,
                'description' => $payload['description'] ?? null,
                'image_url' => $payload['image_url'] ?? null,
                'number' => $payload['number'] ?? null
            ], isNotNullArrayFilter())
        );
    }

    /**
     * Update Election Session
     *
     * @param string $param
     * @param array $payload
     * @return \App\Models\User\CandidatePair
     */
    public function updateByParam(string $param, array $payload): CandidatePair
    {
        $candidatePair = $this->getByParam($param, ['fail' => true]);

        $candidatePair->update(
            array_filter([
                'election_session_id' => $payload['election_session_id'] ?? null,
                'first_candidate_name' => $payload['first_candidate_name'] ?? null,
                'second_candidate_name' => $payload['second_candidate_name'] ?? null,
                'description' => $payload['description'] ?? null,
                'image_url' => $payload['image_url'] ?? null,
                'number' => $payload['number'] ?? null
            ], isNotNullArrayFilter())
        );

        return $candidatePair->refresh();
    }

    /**
     * Bulk Delete Election Sessions
     *
     * @param array $payload
     * @return bool|null
     */
    public function bulkDelete(array $payload): bool|null
    {
        return $this->candidatePair->whereIn('id', $payload['ids'])->delete();
    }
}
