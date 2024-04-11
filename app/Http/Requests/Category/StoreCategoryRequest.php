<?php

namespace App\Http\Requests\Category;


use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:50', 'unique:categories'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name of the category is required',
            'name.max' => 'Name lenght must max of :max letters',
            'name.unique' => 'This name is already used. Try another'
        ];
    }
}
