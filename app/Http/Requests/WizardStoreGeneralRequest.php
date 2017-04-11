<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WizardStoreGeneralRequest extends FormRequest
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
            'name'        => 'required|string|max:255|unique:name,boxes_boxes',
            'private'     => 'required|numeric|min:0|max:1',
            'description' => 'string|max:255'
        ];
    }
}