<?php

namespace App\Http\Requests;

use App\Models\Subject;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\Common_trait;

class SubjectRequest extends FormRequest
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
                // 'name' => "required|min:3|max:30|unique:" . CATE . ",cate_name,{$slug},slug",
                "name" => [
                    'required',
                    'max:255',
                    'min:3',
                    'max:30',
                    function ($attribute, $value, $fail) {
                        $old_slug = $this->route('slug');
                        $info = Subject::where('slug', Str::slug($old_slug))->first('id');
                        $sub_info = Subject::where('slug', Str::slug($value))->whereNotIn('id', [$info->id])->first();
                        if ($sub_info) {
                            $fail('This subject is already exist');
                        }
                    },
                ],
                'cate_id'=>'required|integer',
                'subcate_id'=>'required|integer',
                'description' => 'required|max:200',
                'status' => 'required|in:0,1',
                'image' => 'mimes:jpg,jpeg,png',
            ];
        } else {
            // ADD
            return [
                // 'name' => "required|min:3|max:30|unique:" . CATE . ",cate_name",
                "name" => [
                    'required',
                    'min:3',
                    'max:30',
                    function ($attribute, $value, $fail) {
                        $info = Subject::where('slug', Str::slug($value))->first();
                        if ($info) {
                            $fail('This subject is already exist');
                        }
                    },
                ],
                'cate_id'=>'required|integer',
                'subcate_id'=>'required|integer',
                'description' => 'required|max:200',
                'status' => 'required|in:0,1',
                'image' => 'required|mimes:jpg,jpeg,png',
            ];
        }
    }
    public function messages()
    {
        return [
            'name.required' => 'The subject name field is required.',
            'name.unique' => 'The subject name must be unique.',
            'image.mimes' => 'Please Select a appropriate Image for Categories.',
        ];
    }
}
