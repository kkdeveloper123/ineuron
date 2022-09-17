<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\Common_trait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Country;
use Illuminate\Support\Facades\Hash;


class UsersAdminController extends Controller
{
    use Common_trait;

    public function index()
    {
        $all_info = User::all();
        return view('admin/users/index', compact('all_info'));
    }

    public function edit_users($id = '')
    {
        $single_data = User::where('id', $id)->firstOrFail();
        $all_country = Country::all();
        return view('admin/users/edit', compact('single_data','all_country'));
    }

    public function update_users(Request $req, $id = '')
    {
        
        $validated = $req->validate(
            [
                'fullname' => 'required|min:4|max:20',
                'username' => 'required|min:4|max:20|unique:pro_users,username,'.$id,
                'email' => 'required|min:4|max:20|unique:pro_users,email,'.$id,
                'mobile' => 'required|min:7|max:10|unique:pro_users,mobile,'.$id,
                'dob' => 'required',
                'website' =>'required|min:4|max:20',
                'user_status' => 'required',
            ]
        );
        $input = $req->input();
        $single_data = User::where('id', $id)->firstOrFail();


        $data = [
            'fullname' => $req->input('fullname'),
            'username' => $req->input('username'),
            'email' => $req->input('email'),
            'password' => Hash::make(trim($req->input('password'))),
            'mobile' => $req->input('mobile'),
            'dob' => $req->input('dob'),
            'country' => $req->input('country'),
            'address' => $req->input('address'),
            'website' => $req->input('website'),
            'role_status' => 3,
            'product_services' => $req->input('product_services'),
            'user_status' => $req->input('user_status'),
        ];

        if ($req->file('avatar') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $req->file('avatar')->getClientOriginalName()))->substr(0, 50) . '.' . $req->file('avatar')->extension();
            $path = $req->file('avatar')->storeAs('admin/img/user-avatar/', $img_name);

            if($single_data->getAttributes()['avatar'] && file_exists($single_data->avatar))

            {

                unlink('public/admin/img/user-avatar/' . $single_data->getAttributes()['avatar']);
            }
         
            $data['avatar'] = $img_name;
        }

        $result = User::where('id', $id)->update($data);

        if ($result) {
            return redirect()->route('admin.editUsers', [$id])->with('flash-success', 'User updated successfully');
        } else {
            return redirect()->route('admin.editUsers', [$id])->with('flash-error', 'Error occured in updating data');
        }
    }

    
}
