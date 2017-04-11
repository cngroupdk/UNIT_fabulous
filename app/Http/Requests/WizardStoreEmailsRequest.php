<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WizardStoreEmailsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'emails.*' => 'required|email|max:255',
            'text'     => 'string|max:255'
        ];
    }
}
