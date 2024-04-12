<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user)],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name of the user is required',
            'name.string' => 'Name of the user must contains only letters',
            'name.max' => 'Name lenght must max of :max letters',
            'surname.required' => 'Last name of the user is required',
            'surname.string' => 'Last name of the user must contains only letters',
            'surname.max' => 'Last name lenght must max of :max letters',
            'email.required' => 'Email of the user is required',
            'email.email' => 'Email of the user must be of email format',
            'email.max' => 'Email lenght must max of :max letters',
        ];
    }
}
