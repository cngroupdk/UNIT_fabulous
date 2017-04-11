<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReactionToFeedbackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'feedback_ids.*'   => 'required|exists:boxes_feedbacks,id',
            'feedback_notes.*' => 'string|max:255',
            'feedback_stars.*' => 'required|numeric|min:-2|max:2'
        ];
    }
}
