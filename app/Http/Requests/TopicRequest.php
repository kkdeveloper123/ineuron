<?php

namespace App\Http\Requests;

use App\Models\Topic;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class TopicRequest extends FormRequest
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
                    'max:255',
                    'min:3',
                    'max:30',
                    function ($attribute, $value, $fail) {
                        $old_slug = $this->route('slug');
                        $info = Topic::where('slug', Str::slug($old_slug))->first('id');

                        $sub_info = Topic::where('slug', Str::slug($value))
                                ->whereIn('subject_id',[request('subject_id')])
                                ->whereNotIn('id', [$info->id])->first();

                        if ($sub_info) {
                            $fail('This topic is already exist');
                        }
                    },
                ],
                'subject_id'=>'required|integer',
                'description' => 'required|max:200',
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
                        
                        $info = Topic::where('slug', Str::slug($value))
                                ->whereIn('subject_id',[request('subject_id')])->first();

                        if ($info) {
                            $fail("This topic $attribute is already exist");
                        }
                    },
                ],
                'subject_id'=>'required|integer',
                'description' => 'required|max:200',
                'status' => 'required|in:0,1',
            ];
        }
    }
    public function messages()
    {
        return [
            'name.required' => 'The subject name field is required.',
            'name.unique' => 'The subject name must be unique.',
        ];
    }
}
