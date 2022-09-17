<?php

namespace App\Http\Requests;

use App\Models\Subcategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class SubCategoriesRequest extends FormRequest
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
        if ($this->method() == 'PUT') {
            // EDIT
            return [
                "name" => [
                    'required',
                    'min:3',
                    'max:30',
                    function ($attribute, $value, $fail) {
                        $old_slug = $this->route('slug');
                        $info = Subcategory::where('slug', Str::slug($old_slug))->first('id');
                        $subcate_info = Subcategory::where(['slug' => Str::slug($value), 'cate_id' => $this->get('category')])->whereNotIn('id', [$info->id])->first();
                        if ($subcate_info) {
                            $fail('This sub category is already exist.');
                        }
                    },
                ],
                'category' => "required|exists:" . CATE . ",id",
                'subcategory' => "nullable|exists:" . SUBCATE . ",id",
                'status' => "required|in:0,1",
                'description' => 'required',
                'image' => 'mimes:jpg,jpeg,png',
            ];
        } else {
            // ADD
            return [
                "name" => [
                    'required',
                    'min:3',
                    'max:30',
                    function ($attribute, $value, $fail) {
                        $info = Subcategory::where('slug', Str::slug($value))->first();
                        if ($info) {
                            $fail('This sub category is already exist.');
                        }
                    },
                ],
                'category' => "required|exists:" . CATE . ",id",
                'subcategory' => "nullable|exists:" . SUBCATE . ",id",
                'status' => "required|in:0,1",
                'description' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png',
            ];
        }
    }

    public function messages()
    {
        return [
            'category.required' => 'The category field is required.',
            'category.exists' => 'This category does not exist.',
            'subcategory.exists' => 'This sub category does not exist.',
        ];
    }
}
