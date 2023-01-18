<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    public function rules():array
    {
        return match ($this->method()) {
            'POST' => [
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
            ],
            'PUT' => [
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email,' . $this->user->id,
                'password' => 'required|string|min:8',
            ],
            default => [],
        };
    }
}
