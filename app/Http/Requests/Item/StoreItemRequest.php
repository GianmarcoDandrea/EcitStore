<?php

namespace App\Http\Requests\Item;

use GuzzleHttp\Psr7\Message;
use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
            'name' => ['required', 'min:5', 'max:300',],
            'description' => ['required'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'image', 'max:2048'],
            'tags' => ['exists:tags,id']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name of the item is required',
            'name.min' => 'Name lenght must be at least of :min letters',
            'name.max' => 'Name lenght must max of :max letters',
            'description.required' => 'Description of the item is required',
            'tags.exists' => 'Select a valid tags option',
            'image.image' => 'Wrong format',
            'image.max' => 'Image to big',
            'price.required' => 'Price is required',
            'price.numeric' => 'Only numeric values',
            'price.min' => 'The price number must be positive',
        ];
    }
}
