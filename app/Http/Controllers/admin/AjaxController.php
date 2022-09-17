<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
  public function get_subcategory_by_cate(Request $req)
  {
    $input = $req->input();
    $subcate_data = Subcategory::where('id', $input['id'])->get();

    echo count($subcate_data) > 0 ? json_encode(['status' => 'success', 'data' => $subcate_data]) : json_encode(['status' => 'error', 'data' => $subcate_data]);
  }
}
