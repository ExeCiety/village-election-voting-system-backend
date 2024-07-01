<?php

namespace App\Http\Requests\CandidatePair;

use Illuminate\Foundation\Http\FormRequest;

class CreateCandidatePairRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<int, string>
     */
    public function rules(): array
    {
        return [
            'election_session_id' => [
                'required',
                'uuid',
                'exists:election_sessions,id'
            ],
            'first_candidate_name' => [
                'required',
                'string'
            ],
            'second_candidate_name' => [
                'required',
                'string'
            ],
            'description' => [
                'required',
                'string'
            ],
            'image_url' => [
                'required',
                'string'
            ],
            'number' => [
                'required',
                'integer',
                'unique:candidate_pairs,number'
            ]
        ];
    }
}
