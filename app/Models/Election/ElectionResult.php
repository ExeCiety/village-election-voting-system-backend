<?php

namespace App\Models\Election;

use App\Models\User\CandidatePair;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Election Result Model
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 *
 * @property string id
 * @property string election_session_id
 * @property string candidate_pair_id
 * @property int total_vote
 */
class ElectionResult extends Model
{
    use HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'election_session_id',
        'candidate_pair_id',
        'total_vote'
    ];

    // Relation Methods
    // Belongs To
    /**
     * Get the election session that owns the election result
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function election_session(): BelongsTo
    {
        return $this->belongsTo(ElectionSession::class, 'election_session_id', 'id');
    }

    /**
     * Get the candidate pair that owns the election result
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function candidate_pair(): BelongsTo
    {
        return $this->belongsTo(CandidatePair::class, 'candidate_pair_id', 'id');
    }
}
