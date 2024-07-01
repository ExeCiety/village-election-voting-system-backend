<?php

namespace App\Http\Resources\ElectionSession;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Election Session For General Resource
 *
 * @property string id
 * @property string name
 * @property string start_date
 * @property string end_date
 * @property string created_at
 * @property string updated_at
 */
class ElectionSessionForGeneralResource extends JsonResource
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
            'name' => $this->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
