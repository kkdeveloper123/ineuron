<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Str;

use App\Models\Enquiry;

class WebPagesController extends Controller
{

  public function contactUsPage()
  {
    return view('web.pages.contact');
  }

  public function blogsPage()
  {
    return view('web.pages.blog');
  }


  public function blogDetailPage()
  {
    return view('web.pages.blog-details');
  }

  public function sendEnquiry(ContactRequest $req)
  {
    $input = $req->input();
    $enq_info = new Enquiry;

    $enq_info->fullname = $input['fullname'];
    $enq_info->email = $input['email'];
    $enq_info->subject = $input['subject'];
    $enq_info->phone = $input['phone'];
    $enq_info->query = $input['query'];

    if ($enq_info->save()) {
      return back()->with('site-flash-success', 'Thank you contacting us. We will get back to you soon.');
    } else {
      return back()->with('site-flash-error', 'Some error occurred in sending enquiry');
    }
  }
}
