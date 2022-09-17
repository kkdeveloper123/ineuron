<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\LoginCredentials;
use App\Models\Subadminaccess;
use App\Traits\Common_trait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SubadminController extends Controller
{
    use Common_trait;
    public function index()
    {
        $subadmin = Admin::where('role_status', 2)->get();
        return view('admin.subadmin.index', compact('subadmin'));
    }

    public function insert_admin(Request $req)
    {
        $validated = $req->validate(
            [
                'username' => 'required|min:4|max:20|unique:' . USERS,
                'email' => 'required|email|unique:' . USERS,
                'mobile' => 'required|min:10|max:10|unique:' . USERS,
                'password' => 'required|min:6|max:15',
            ]);

        $inputs = $req->input();
        $subadmin_info = new Admin;

        $admin_id = Auth::user()->id;

        if ($req->file('image')) {
            $img_name = time() . '-' . Str::of(md5(time() . $req->file('image')->getClientOriginalName()))->substr(0, 50) . '.' . $req->file('image')->extension();
            $path = $req->file('image')->storeAs('admin/subadmin/image', $img_name);
            $subadmin_info->avatar = $img_name;
        }

        $subadmin_info->username = $inputs['username'];
        $subadmin_info->email = $inputs['email'];
        $subadmin_info->mobile = $inputs['mobile'];
        $subadmin_info->login_type = 'email';
        $subadmin_info->role_status = 2;
        $subadmin_info->user_status = 1;
        $subadmin_info->created_by = $admin_id;

        if ($subadmin_info->save()) {
            $last_id = $subadmin_info->id;

            $login = new LoginCredentials;

            $login->auth_id = $last_id;
            $login->email = $inputs['email'];
            $login->password = Hash::make(trim($req->input('password')));
            $login->role_status = 2;

            $login->save();

            $subadmin_access = new Subadminaccess;

            $subadmin_access->subadmin_id = $last_id;
            $subadmin_access->access = '{}';
            if ($subadmin_access->save()) {
                return back()->with('flash-success', 'Subadmin added successfully');
            } else {
                $last_id->delete();
                return back()->with('flash-error', 'Error occured in adding data');
            }
        } else {
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }

    public function subadmin_access($username = '')
    {
        $subadmin_data = Admin::where('username', $username)->first();
        $access_data = Subadminaccess::where('subadmin_id', $subadmin_data->id)->first();
        return view('admin.subadmin.subadmin_access', compact('subadmin_data','access_data'));
    }

    public function insert_subadmin_access(Request $request, $username = '')
    {

        $subadmin_data = Admin::where('username', $username)->firstOrFail();

        $subadmin_access_data = Subadminaccess::where('subadmin_id', $subadmin_data->id)->firstOrFail();

        $inputs = $request->input();

        if (isset($inputs['fields'])) {
            $field_data = json_encode($inputs['fields'], JSON_FORCE_OBJECT);
        } else {
            $field_data = '{}';
        }
        

        // if (count($inputs['fields']) > 0) {
        //     $field_data = json_encode($inputs['fields'], JSON_FORCE_OBJECT);
        // } else {
        //     $field_data = '{}';
        // }

        $subadmin_access_data->access = $field_data;

        if ($subadmin_access_data->save()) {
            return redirect()->route('admin.subadminAccess', [$username])->with('flash-success', 'Subadmin access updated successfully');
        } else {
            return redirect()->route('admin.subadminAccess', [$username])->with('flash-error', 'Error occured in updating data');
        }
    }

}
