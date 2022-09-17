<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Pages;

class PagesController extends Controller
{
  public function privacy_policy(Request $req)
  {
    $all_info = Pages::where('slug', 'privacy-policy')->first();
    return view('admin.pages.privacy-policy', compact('all_info'));
  }

  public function update_privacy_policy(Request $req)
  {
    $validator = $req->validate([
      'content' => 'required',
    ]);

    $input = $req->input();

    $privacy_data = Pages::where('slug', 'privacy-policy')->first();

    $privacy_data->name = 'Privacy policy';
    $privacy_data->heading = 'Privacy policy';
    $privacy_data->content = $req->input('content');
    $privacy_data->slug = 'privacy-policy';

    if ($privacy_data->save()) {
      return back()->with('flash-success', 'Privacy policy page has been added successfully');
    } else {
      return back()->with('flash-error', 'Some error occurred in adding data');
    }
  }
}
