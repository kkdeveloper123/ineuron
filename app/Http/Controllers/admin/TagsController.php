<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tags;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TagsController extends Controller
{
     public function index($slug = '')
  {
    $all_info = Tags::all();
    $single_info = '';
    if ($slug) {
      $single_info = Tags::where('slug', $slug)->firstOrFail();
    }
    return view('admin/tags/index', compact('all_info', 'single_info'));
  }

  public function tags_modify(Request $req, $slug = '')
  {
    $validator = $req->validate([
      'tags_name' => 'required|max:300|unique:'.TAGS,
    ]);

    $input = $req->input();
    $tags_slug = Str::slug($req->input('tags_name'),'-', $slug);

    $tags = Tags::updateOrCreate(
      ['slug' => $slug],
      ['tags_name' => $input['tags_name'], 'slug' => $tags_slug]
    );

    $msg = $slug ? 'updated' : 'added';

    if ($tags) {
      if ($slug) {
        return redirect()->route('admin.editTags', [$tags_slug])->with('flash-success', 'Tags ' . $msg . ' successfully');
      } else {
        return back()->with('flash-success', 'Tags ' . $msg . ' successfully');
      }
    } else {
      return back()->with('flash-error', 'Error occured in adding data');
    }
  }
}
