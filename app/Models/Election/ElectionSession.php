<?php

namespace App\Models\Election;

use App\Models\User\CandidatePair;
use App\Models\User\Voter;
use App\Traits\DefaultTimestampsFormat;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * Election Session Model
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 *
 * @property string id
 * @property string name
 * @property string start_date
 * @property string end_date
 */
class ElectionSession extends Model
{
    use HasUuids, DefaultTimestampsFormat;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'start_date',
        'end_date'
    ];

    // Accessor Methods

    /**
     * Get the start date attribute
     *
     * @param $value
     * @return string
     */
    public function getStartDateAttribute($value): string
    {
        return Carbon::parse($value)->format(config('app.timestamp_format'));
    }

    /**
     * Get the end date attribute
     *
     * @param $value
     * @return string
     */
    public function getEndDateAttribute($value): string
    {
        return Carbon::parse($value)->format(config('app.timestamp_format'));
    }

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
