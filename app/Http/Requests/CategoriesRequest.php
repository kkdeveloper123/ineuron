<?php

namespace App\Http\Requests;

use App\Models\Categories;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoriesRequest extends FormRequest
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
                    'min:3',
                    'max:30',
                    function ($attribute, $value, $fail) {
                        $old_slug = $this->route('slug');
                        $info = Categories::where('slug', Str::slug($old_slug))->first('id');
                        $cate_info = Categories::where('slug', Str::slug($value))->whereNotIn('id', [$info->id])->first();
                        if ($cate_info) {
                            $fail('This category is already exist');
                        }
                    },
                ],
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
                        $info = Categories::where('slug', Str::slug($value))->first();
                        if ($info) {
                            $fail('This category is already exist');
                        }
                    },
                ],
                'description' => 'required|max:200',
                'status' => 'required|in:0,1',
                'image' => 'required|mimes:jpg,jpeg,png',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'The category name field is required.',
            'name.unique' => 'The Category name must be unique.',
            'image.mimes' => 'Please Select a appropriate Image for Categories.',
        ];
    }
}
