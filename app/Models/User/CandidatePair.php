<?php

namespace App\Models\User;

use App\Models\Election\ElectionResult;
use App\Models\Election\ElectionSession;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Candidate Pair Model
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 *
 * @property string id
 * @property string election_session_id
 * @property string first_name
 * @property string last_name
 * @property string description
 * @property string image_url
 * @property string number
 */
class CandidatePair extends Model
{
    use HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'election_session_id',
        'first_name',
        'last_name',
        'description',
        'image_url',
        'number'
    ];

    // Relation Methods
    // Belongs To
    /**
     * Get the election session that owns the voter
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function election_session(): BelongsTo
    {
        return $this->belongsTo(ElectionSession::class, 'election_session_id', 'id');
    }

    // Has Many

    /**
     * Get the election results for the candidate pair
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function election_results(): HasMany
    {
        return $this->hasMany(ElectionResult::class, 'candidate_pair_id', 'id');
    }
}
