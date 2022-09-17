<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'login_email' => 'required|email|exists:' . LOGIN . ',email',
            'login_password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'login_email.required' => 'The email field is required.',
            'login_email.email' => 'The email must be a valid email address.',
            'login_email.exists' => 'The email does not match to our records.',
            'login_password.required' => 'The password field is required.',
        ];
    }
}
