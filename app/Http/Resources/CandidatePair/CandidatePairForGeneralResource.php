<?php

namespace App\Http\Resources\CandidatePair;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Candidate Pair For General Resource
 *
 * @mixin \App\Models\User\CandidatePair
 */
class CandidatePairForGeneralResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_candidate_name' => $this->first_candidate_name,
            'second_candidate_name' => $this->second_candidate_name,
            'description' => $this->description,
            'image_url' => $this->image_url,
            'number' => intval($this->number),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
