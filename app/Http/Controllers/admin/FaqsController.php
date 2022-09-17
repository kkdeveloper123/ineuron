<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Faq_cate;
use App\Models\Faqs;
use App\Traits\Common_trait;

class FaqsController extends Controller
{
  use Common_trait;

  public function index(Request $req)
  {
    $all_info = Faqs::all();
    return view('admin/faqs/index', compact('all_info'));
  }

  public function add_faqs_page()
  {
    $all_info = Faq_cate::all();
    return view('admin/faqs/add', compact('all_info'));
  }

  public function insert_faqs(Request $req)
  {
    $validated = $req->validate(
      [
        'heading' => 'required|min:4|max:150',
        'cate_id' => 'required',
        'content' => 'required|min:10',
        'status' => 'required|in:0,1',
      ],
      [
        'cate_id.required' => 'The category field is required.',
      ]
    );

    $input = $req->input();
    $faq_info = new Faqs;
    $faq_info->heading = $input['heading'];
    $faq_info->slug = $this->create_unique_slug($req->input('heading'), FAQS);
    $faq_info->cate_id = $input['cate_id'];
    $faq_info->content = $input['content'];
    $faq_info->status = $input['status'];

    if ($faq_info->save()) {
      return back()->with('flash-success', 'FAQ added successfully');
    } else {
      return back()->with('flash-error', 'Error occured in adding data');
    }
  }

  public function edit_faqs($slug = '')
  {
    $single_data = Faqs::where('slug', $slug)->firstOrFail();
    $faqs_cate = Faq_cate::all();
    return view('admin/faqs/edit', compact('single_data', 'faqs_cate'));
  }

  public function update_faq(Request $req, $slug = '')
  {
    $validated = $req->validate(
      [
        'heading' => 'required|min:4|max:150',
        'cate_id' => 'required',
        'content' => 'required|min:10',
        'status' => 'required|in:0,1',
      ],
      [
        'cate_id.required' => 'The category field is required.',
      ]
    );

    $input = $req->input();
    $faq_info = Faqs::where('slug', $slug)->firstOrFail();
    $faq_info->heading = $input['heading'];
    $faq_info->slug = $this->create_unique_slug($req->input('heading'), FAQS, 'slug', 'slug', $faq_info->slug);
    $faq_info->cate_id = $input['cate_id'];
    $faq_info->content = $input['content'];
    $faq_info->status = $input['status'];

    if ($faq_info->save()) {
      return redirect()->route('admin.editFaqs', [$faq_info->slug])->with('flash-success', 'FAQ updated successfully');
    } else {
      return back()->with('flash-error', 'Error occured in adding data');
    }
  }

  // ------------------------------FAQS CATEGORY------------------------------

  public function faq_cate($slug = '')
  {
    $all_info = Faq_cate::all();
    $single_info = '';
    if ($slug) {
      $single_info = Faq_cate::where('slug', $slug)->firstOrFail();
    }
    return view('admin/faqs/category', compact('all_info', 'single_info'));
  }

  public function faq_cate_modify(Request $req, $slug = '')
  {
    $validator = $req->validate([
      'cate_name' => 'required|max:300',
    ]);

    $input = $req->input();
    $faq_slug = $this->create_unique_slug($req->input('cate_name'), FAQ_CATE, 'slug', 'slug', $slug);

    $faq = Faq_cate::updateOrCreate(
      ['slug' => $slug],
      ['cate_name' => $input['cate_name'], 'slug' => $faq_slug]
    );

    $msg = $slug ? 'updated' : 'added';

    if ($faq) {
      if ($slug) {
        return redirect()->route('admin.editFaqCategory', [$faq_slug])->with('flash-success', 'Faq ' . $msg . ' successfully');
      } else {
        return back()->with('flash-success', 'Faq ' . $msg . ' successfully');
      }
    } else {
      return back()->with('flash-error', 'Error occured in adding data');
    }
  }
}
