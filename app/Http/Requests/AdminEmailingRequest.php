<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminEmailingRequest extends FormRequest
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
        // if condition check for at the edit
        if ($this->method() == 'PUT') {
            // EDIT
            return [
                'to' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ];
        } else {
            // ADD
            return [
                'to' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'to.required' => 'Please enter an email address.',
            'subject.required' => 'Please enter subject for email.',
        ];
    }
}
