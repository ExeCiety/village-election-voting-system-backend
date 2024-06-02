<?php

namespace App\Models\User;

use App\Models\Election\ElectionSession;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Voter Model
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 *
 * @property string id
 * @property string election_session_id
 * @property string nik
 * @property string full_name
 * @property string birth_date
 * @property string address
 * @property string gender
 * @property string otp
 * @property string otp_status
 */
class Voter extends Model
{
    use HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'election_session_id',
        'nik',
        'full_name',
        'birth_date',
        'address',
        'gender',
        'otp',
        'otp_status'
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
}
