<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Traits\Common_trait;
use Illuminate\Support\Str;
use App\Http\Requests\CategoriesRequest;


class CategoriesController extends Controller
{
    use Common_trait;

    public function index()
    {
        $all_info = Categories::all();
        return view('admin.category.index', compact('all_info'));
    }

    public function insert_categories(CategoriesRequest $req)
    {
        $input = $req->input();

        $cate_info = new Categories;
        $cate_info->img = $this->fileUpload(files: $req->file('image'), path: "admin/img/categories/");

        $cate_info->cate_name = $input['name'];
        $cate_info->slug = Str::slug($input['name']);
        $cate_info->description = $input['description'];
        $cate_info->status = $input['status'];

        if ($cate_info->save()) {
            return back()->with('flash-success', 'Category added successfully');
        } else {
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }

    public function edit_category($slug = '')
    {
        $single_data = Categories::where('slug', $slug)->firstOrFail();
        return view('admin/category/edit', compact('single_data'));
    }

    public function update_category(CategoriesRequest $req, $slug = '')
    {
        $input = $req->input();

        $cate_info = Categories::where('slug', $slug)->firstOrFail();

        $cate_info->img = $req->hasFile('image') ?
            $this->fileUpload(files: $req->file('image'), path: "admin/img/categories/", unlinkName: $cate_info->img) :
            $cate_info->img;

        $cate_info->cate_name = $input['name'];
        $cate_info->slug = Str::slug($input['name']);
        $cate_info->description = $input['description'];
        $cate_info->status = $input['status'];

        if ($cate_info->save()) {
            return redirect()->route('admin.editCategory', [$cate_info->slug])->with('flash-success', 'Category updated successfully');
        } else {
            return redirect()->route('admin.editCategory', [$slug])->with('flash-error', 'Error occured in updating data');
        }
    }
}
