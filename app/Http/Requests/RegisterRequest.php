<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
Use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => ['required', 'email', 'string', Rule::unique(User::class, 'email')],
            'password' => 'required|string|min:8'
        ];
    }
}
