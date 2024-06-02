<?php

namespace App\Models\Election;

use App\Models\User\CandidatePair;
use App\Models\User\Voter;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Election Session Model
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 *
 * @property string id
 * @property string start_date
 * @property string end_date
 */
class ElectionSession extends Model
{
    use HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'start_date',
        'end_date'
    ];

    // Relation Methods
    // Has Many
    /**
     * Get the candidate pairs for the election session
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function candidate_pairs(): HasMany
    {
        return $this->hasMany(CandidatePair::class, 'election_session_id', 'id');
    }

    /**
     * Get the voters for the election session
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function voters(): HasMany
    {
        return $this->hasMany(Voter::class, 'election_session_id', 'id');
    }

    /**
     * Get the election results for the election session
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function election_results(): HasMany
    {
        return $this->hasMany(ElectionResult::class, 'election_session_id', 'id');
    }
}
