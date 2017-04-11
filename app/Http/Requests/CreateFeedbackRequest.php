<?php

namespace App\Http\Requests;

use Facades\App\Services\BoxService;
use Illuminate\Foundation\Http\FormRequest;

class CreateFeedbackRequest extends FormRequest
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
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function rules()
    {
        $box = BoxService::getByCode($this->box_code);
        if ($box == null) {
            return redirect()->back()->withInput($this->all())->withErrors($this, 'Box not found');
        }

        $rules = [];
        foreach ($box->categories as $category) {
            $rules[ 'category_'.$category->id ] = 'required';
        }

        return $rules;
    }
}
