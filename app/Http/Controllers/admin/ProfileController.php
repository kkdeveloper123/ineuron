<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $user_info = Auth::guard('admin')->user();
        return view('admin.profile.profile', compact('user_info'));
    }

    public function save_profile(Request $req)
    {
        $req->validate([
            'fullname' => 'required|min:3|max:15',
            'email' => 'required|email',
            'dob' => 'required',        
            'mobile' => 'required|numeric',
            'image' => 'mimes:jpg,jpeg,png',
        ]);

        $inputs = $req->input();

        $data = User::find(auth::id());
        $data->fullname = $inputs['fullname'];
        $data->email = $inputs['email'];
        $data->dob = $inputs['dob'];
        $data->mobile = $inputs['mobile'];

        if ($req->file('image') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $req->file('image')->getClientOriginalName()))->substr(0, 50) . '.' . $req->file('image')->extension();
            $path = $req->file('image')->storeAs('admin/img/avatar/', $img_name);
            unlink('public/admin/img/avatar/' . $data->getAttributes()['avatar']);
            $data->avatar = $img_name;
        }

        if ($data->save()) {
            return redirect()->route('admin.getProfile')->with('flash-success', 'Profile updated successfully');
        } else {
            return redirect()->route('admin.getProfile')->with('flash-success', 'Error occured in updating profile');
        }
    }

}
