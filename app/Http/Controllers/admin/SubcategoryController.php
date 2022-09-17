<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoriesRequest;
use App\Models\Categories;
use App\Models\Subcategory;
use App\Traits\Common_trait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    use Common_trait;
    
    public function index()
    {
        $all_info = Subcategory::with('categories')->get();
        $cate_info = Categories::all();
        return view('admin.sub-category.index', compact('all_info', 'cate_info'));
    }

    public function insert_subcategories(SubCategoriesRequest $req)
    {
        $validated = $req->validate([
            'name' => 'required|min:3|max:20|unique:pro_subcategory,subcate_name',
            'cat_id' => 'required',
        ],
        [
            'cat_id.required' => 'The category field is required.',
        ]);
        
        $input = $req->input();
        $subcate_info = new Subcategory;
                $subcate_info->figure = $this->fileUpload(files: $req->file('image'), path: "admin/img/sub-categories/");
        $subcate_info->subcate_name = $input['name'];
        $subcate_info->slug = Str::slug($input['name'], '-');
        $subcate_info->cate_id = $input['category'];
        $subcate_info->parent_id = $input['subcategory'];
        $subcate_info->descr = $input['description'];
        $subcate_info->status = $input['status'];
        
        if ($subcate_info->save()) {
            return back()->with('flash-success', 'Sub category added successfully');
        } else {
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }
    
    public function edit_subcategory($slug = '')
    {
        $single_data = Subcategory::where('slug', $slug)->firstOrFail();
        $subcate_data = Subcategory::all();
        $cate_info = Categories::all();
        return view('admin/sub-category/edit', compact('single_data', 'subcate_data', 'cate_info'));
    }

    public function update_subcategory(SubCategoriesRequest $req, $slug = '')
    {
        $input = $req->input();
        
        $subcate_info = Subcategory::where('slug', $slug)->firstOrFail();
        
        $subcate_info->subcate_name = $input['name'];
        $subcate_info->slug = Str::slug($input['name'], '-');
        $subcate_info->cate_id = $input['category'];
        $subcate_info->parent_id = $input['subcategory'];
        $subcate_info->descr = $input['description'];
        $subcate_info->figure = $req->hasFile('image') ?
            $this->fileUpload(files: $req->file('image'), path: "admin/img/sub-categories/", unlinkName: $subcate_info->figure) :
            $subcate_info->figure;
        $subcate_info->status = $input['status'];

        if ($subcate_info->save()) {
            return redirect()->route('admin.editSubcategory', [$subcate_info->slug])->with('flash-success', 'Sub category updated successfully');
        } else {
            return redirect()->route('admin.editSubcategory', [$slug])->with('flash-error', 'Error occured in updating data');
        }
    }
}
