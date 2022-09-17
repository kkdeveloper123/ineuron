<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoPages;
use App\Traits\Common_trait;
use App\Models\SeoPagesContent;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SeoController extends Controller
{
    use Common_trait;

  public function index(Request $req)
  {
    $all_info = SeoPagesContent::all();
    return view('admin/seo-pages/index', compact('all_info'));
  }

  public function add_seo_content()
  {
    $all_info = SeoPagesContent::all();
    return view('admin/seo-pages/add', compact('all_info'));
  }

  public function insert_seo_content(Request $req)
  {
    $validated = $req->validate(
      [
        'meta_description' => 'required|max:500',
        'meta_title' => 'required||max:200',
        'og_url' => 'required|url',
        'og_title' => 'required|max:200',
        'og_description' => 'required|max:500',
        'keywords' => 'required|max:500',
      ]);

    $input = $req->input();
    $seo_info = new SeoPagesContent;
    $seo_info->meta_description = $input['meta_description'];
    $seo_info->og_url = $input['og_url'];
    $seo_info->meta_title = $input['meta_title'];
    $seo_info->og_title = $input['og_title'];
    $seo_info->og_description = $input['og_description'];
    $seo_info->keywords = $input['keywords'];

    if ($seo_info->save()) {
      return back()->with('flash-success', 'SEO content added successfully');
    } else {
      return back()->with('flash-error', 'Error occured in adding data');
    }
  }

  public function edit_seo_content($id = '')
  {
    $single_data = SeoPagesContent::where('id', $id)->firstOrFail();
    return view('admin/seo-pages/edit', compact('single_data'));
  }

  public function update_seo_content(Request $req, $id = '')
  {
     $validated = $req->validate(
      [
        'meta_description' => 'required|max:500',
        'meta_title' => 'required||max:200',
        'og_url' => 'required|url',
        'og_title' => 'required|max:200',
        'og_description' => 'required|max:500',
        'keywords' => 'required||max:500',
      ]);

    $input = $req->input();

    $seo_info = SeoPagesContent::where('id', $id)->firstOrFail();
    $seo_info->meta_description = $input['meta_description'];
    $seo_info->og_url = $input['og_url'];
    $seo_info->meta_title = $input['meta_title'];
    $seo_info->og_title = $input['og_title'];
    $seo_info->og_description = $input['og_description'];
    $seo_info->keywords = $input['keywords'];




    if ($seo_info->save()) {
      return redirect()->route('admin.editSeoContent', [$seo_info->id])->with('flash-success', 'SEO content updated successfully');
    } else {
      return back()->with('flash-error', 'Error occured in adding data');
    }
  }


  /*--------------------------SEO PAGES----------------------------------------------*/


    public function seo_pages($slug = '')
  {
    $all_info = SeoPages::all();
    $single_info = '';
    if ($slug) {
      $single_info = SeoPages::where('slug', $slug)->firstOrFail();
    }
    return view('admin/seo-pages/seo-pages', compact('all_info', 'single_info'));
  }

  public function seo_pages_modify(Request $req, $slug = '')
  {
    $validator = $req->validate([
      'page_name' => 'required|max:50|unique:'.SEOPAGES,
    ]);

    $input = $req->input();
    $seo_page_slug =
     $this->create_unique_slug($req->input('page_name'), SEOPAGES, 'slug', 'slug', $slug);

    $faq = SeoPages::updateOrCreate(
      ['slug' => $slug],
      ['page_name' => $input['page_name'], 'slug' => $seo_page_slug ]
    );

    $msg = $slug ? 'updated' : 'added';

    if ($faq) {
      if ($slug) {
        return redirect()->route('admin.editSeoPages', [$seo_page_slug])->with('flash-success', 'Seo Pages ' . $msg . ' successfully');
      } else {
        return back()->with('flash-success', 'Seo Pages ' . $msg . ' successfully');
      }
    } else {
      return back()->with('flash-error', 'Error occured in adding data');
    }
  }
  
}
