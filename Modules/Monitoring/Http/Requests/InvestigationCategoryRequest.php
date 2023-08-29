<?php

namespace Modules\Monitoring\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestigationCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_name' => 'required|string|max:100'
        ];
    }

    /**
     * validation messages
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'category_name.required' => 'Investigation Category name is required',
            'category_name.string' => 'Investigation Category name must be string',
            'category_name.max' => 'Investigation Category name must be less than 100 characters',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
