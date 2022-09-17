<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\Categories;
use App\Models\Subcategory;
use App\Models\Subject;
use App\Traits\Common_trait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SubjectController extends Controller
{
  use Common_trait;
  public function index(Request $req)
  {
    $all_info = Subject::with('Categories')->get();
    $cate_info = Categories::all();
    $sub_cate_info = Subcategory::all();
    return view('admin.subject.index', compact('all_info','cate_info','sub_cate_info'));
  }
  
  public function insert_subject(SubjectRequest $req)
  {
    $input = $req->input();
    
    $sub_info = new Subject;
    $sub_info->img = $this->fileUpload(files: $req->file('image'), path: "admin/img/subjects/");
    
    $sub_info->user_id = Auth::user()->id;
    $sub_info->name = $input['name'];
    $sub_info->slug = Str::slug($input['name']);
    $sub_info->cate_id = $input['cate_id'];
    $sub_info->sub_cate_id = $input['subcate_id'];
    $sub_info->description = $input['description'];
    $sub_info->status = $input['status'];
    
    if ($sub_info->save()) {
      return back()->with('flash-success', 'Subject added successfully');
    } else {
      return back()->with('flash-error', 'Error occured in adding data');
    }
  }
  
  public function edit_subject($slug = '')
  {
    $single_data = Subject::where('slug', $slug)->firstOrFail();
    $cate_info = Categories::all();
    $sub_cate_info = Subcategory::all();
    return view('admin/subject/edit', compact('single_data','cate_info','sub_cate_info'));
  }
  
  public function update_subject(SubjectRequest $req, $slug = '')
  {
    $input = $req->input();
    
    $sub_info = Subject::where('slug', $slug)->firstOrFail();
    
    $sub_info->img = $req->hasFile('image') ?
    $this->fileUpload(files: $req->file('image'), path: "admin/img/subjects/", unlinkName: $sub_info->img) :
    $sub_info->img;
    
    $sub_info->user_id = Auth::user()->id;
    $sub_info->name = $input['name'];
    $sub_info->slug = Str::slug($input['name']);
    $sub_info->cate_id = $input['cate_id'];
    $sub_info->sub_cate_id = $input['subcate_id'];
    $sub_info->description = $input['description'];
    $sub_info->status = $input['status'];
    
    if ($sub_info->save()) {
      return redirect()->route('admin.editSubject', [$sub_info->slug])->with('flash-success', 'Subject updated successfully');
    } else {
      return redirect()->route('admin.editSubject', [$slug])->with('flash-error', 'Error occured in updating data');
    }
  }
}
