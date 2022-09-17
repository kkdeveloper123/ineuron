<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Payments;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $categories = Categories::count();
        $users = User::count();

        return view('admin.dashboard', compact('categories', 'users'));
    }

    public function changeStatus(Request $req)
    {

        $status = array("INACTIVE", "ACTIVE", "PENDING");
        $reqStatus = $req->input('status');
        // pre($status);
        if(in_array($reqStatus, $status)){
            $status_val = array_search($reqStatus, $status);

            $model = '\\App\\Models\\' . $req->input('table');
    
            $affected = $model::where('slug', $req->input('slug'))->update(['status' => $status_val]);
    
            if ($affected) {
                echo 'success';
            } else {
                echo 'error';
            }
        }else{
            echo "error";
        }
    }

    public function delete_data($table = '', $slug = '')
    {
        $model = '\\App\\Models\\' . $table;

        $result = $model::where('slug', $slug)->delete();
        if ($result) {
            return back()->with('flash-success', 'Deleted successfully');
        } else {
            return back()->with('flash-error', 'Error occured in deleting data');
        }
    }
}
