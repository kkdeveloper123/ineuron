<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductController extends Controller
{
  public function cartPage()
  {
    return view('web.products.cart');
  }

  public function checkoutPage()
  {
    return view('web.products.checkout');
  }

  public function productDetails()
  {
    return view('web.products.product-detail');
  }


  
  public function test(Request $req)
  {
    $validator = $req->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    $input = $req->input();

    //if () {
    //  return redirect()->route('admin.dashboard');
    //} else {
    //  return back()->with('flash-error', 'Invalid credentials')->withInput();
    //}
  }
}
