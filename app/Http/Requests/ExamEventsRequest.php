<?php

namespace App\Http\Requests;

use App\Models\ExamEvents;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ExamEventsRequest extends FormRequest
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
                "name" => [
                    'required',
                    'min:3',
                    'max:30',
                    function ($attribute, $value, $fail) {
                        $old_slug = $this->route('slug');
                        $info = ExamEvents::where('slug', Str::slug($old_slug))->first();
                        $event_info = ExamEvents::where('slug', Str::slug($value))->whereNotIn('id', [$info->id])->first();
                        if ($event_info) {
                            $fail('This exam event already exists');
                        }
                    },
                ],
                'subcategories' => ['required', 'array', 'min:1', 'max:16'],
                'status' => 'required|in:0,1',
            ];
        } else {
            // ADD
            return [
                "name" => [
                    'required',
                    'min:3',
                    'max:30',
                    function ($attribute, $value, $fail) {
                        $info = ExamEvents::where('slug', Str::slug($value))->first();
                        if ($info) {
                            $fail('This exam event already exists');
                        }
                    },
                ],
                'subcategories' => ['required', 'array', 'min:1', 'max:16'],
                'status' => 'required|in:0,1',
            ];
        }
    }
    public function messages()
    {
        return   [
            'name.required' => 'The event name field is required.',
            'subcategories.min' => 'Please select at least 10 subcategories.',
            'subcategories.max' => 'Can\'t select more than 10 subcategories.'
        ];
    }
}
