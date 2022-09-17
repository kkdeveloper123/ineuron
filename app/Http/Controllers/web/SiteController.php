<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\LoginCredentials;

class SiteController extends Controller
{
    public function index(Request $req)
    {
        return view('web.layouts.index');
    }

    public function userAuth()
    {
        return view('web.auth.auth');
    }

    public function userAuthSignup(RegisterRequest $req)
    {
        $input = $req->input();

        $user = new User();

        $user->fullname = $input['name'];
        $user->email = $input['email'];
        $user->email = $input['email'];
        $user->password = Hash::make(trim($input['password']));
        $user->login_type = 'email';
        $user->role_status = 3;

        if ($user->save()) {
            $token = Str::random(40);
            $expire_key_time = date("Y-m-d H:i:s", strtotime("+15 minutes"));


            $user_info = User::where('email', $input['email'])->first();
            // $msg_data = [
            //     'link' => $token,
            //     'msg' => $expire_key_time,
            // ];

            $user_info->token = $token;
            $user_info->expire_token = $expire_key_time;
            $link = route('web.userAuthVerify', ['email=' . $user->email . '&token=' . $token]);

            if ($user_info->save()) {
                return back()->with('site-flash-success', 'A verification code has been sent to your mail');
            } else {
                return back()->with('site-flash-error', 'Error occured in signup');
            }
        } else {
            return back()->with('site-flash-error', 'Error occured in signup');
        }
    }

    public function userAuthVerify(Request $req)
    {
        $input = $req->input();

        $user_info = User::where(['email' => $input['email'], 'token' => $input['token']])->first();

        if ($user_info) {
            $current_time = Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
            $expire_time = Carbon::createFromFormat('Y-m-d H:i:s', $user_info->expire_token);

            if ($expire_time < $current_time) {
                return redirect()->route('web.auth')->with('site-flash-error', 'Your verification link is expired.');
            } else {
                $user_info->user_status = 1;
                // $user_info->token = null;
                // $user_info->expire_token = null;

                if ($user_info->save()) {

                    $login = new LoginCredentials;
                    $login->auth_id = $user_info->id;
                    $login->email = $input['email'];
                    // $login->password = $user_info->password;
                    $login->password = Hash::make('1234');
                    $login->role_status = 3;
                    $login->save();
                    if (Auth::guard('web')->attempt(['email' => $input['email'], 'password' => '1234'])) {
                        return redirect()->route('web.index')->with('site-flash-success', "Welcome to " . env('APP_NAME') . " Start purchasing");
                    }
                } else {
                    return redirect()->route('web.index')->with('site-flash-error', 'No data found');
                }
            }
        } else {
            return redirect()->route('web.index')->with('site-flash-error', 'No user found');
        }
    }


    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $google_info = Socialite::driver('google')->user();

        $user = User::where('email', $google_info->email)->first();

        if (!$user) {
            $user = new User();
        }
        $user->fullname = $google_info->name;
        $user->email = $google_info->email;
        $user->avatar = $google_info->avatar;
        $user->google_id = $google_info->id;
        $user->login_type = 'google';

        if ($user->save()) {

            if (Auth::guard('web')->attempt(['email' => $google_info->email, 'role_status' => 3])) {
                return redirect()->route('web.index')->with('site-flash-success', "Welcome to " . env('APP_NAME') . " Start purchasing");
            } else {
                return back()->with('site-flash-error', 'Some error occurred in google login');
            }
        } else {
            return back()->with('site-flash-error', 'Some error occured in google login');
        }
    }

    public function fbLogin()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function fbCallback()
    {
        $fb_info = Socialite::driver('facebook')->user();

        $user = User::where('email', $fb_info->email)->first();

        if (!$user) {
            $user = new User();
        }
        $user->fullname = $fb_info->name;
        $user->email = $fb_info->email;
        $user->avatar = $fb_info->avatar;
        $user->fb_id = $fb_info->id;
        $user->login_type = 'fb';

        if ($user->save()) {
            return redirect()->route('web.layouts.index')->with('site-flash-success', "Welcome to env('APP_NAME'), <br>Start purchasing");
        } else {
            return back()->with('site-flash-error', 'Error occured in signup');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('web.auth');
    }

    public function loginVerify(LoginRequest $req)
    {
        $input = $req->input();

        $user_info = LoginCredentials::where('email', $input['login_email'])->first();

        if ($user_info->user_block_status == 1) {
            if (Auth::guard('web')->attempt(['email' => $input['login_email'], 'password' => $input['login_password'], 'role_status' => 3])) {
                return redirect()->route('web.index')->with('site-flash-success', "Welcome to " . env('APP_NAME') . " Start purchasing");
            } else {
                return back()->with('site-flash-error', 'wrong password');
            }
        } else {
            return back()->with('site-flash-error', 'Your account is blocked.');
        }
    }

    public function forgotPasswordVerify(Request $req)
    {
        $validator = $req->validate([
            'email' => 'required|email|exists:' . LOGIN . ',email',
        ], [
            'email.exists' => 'The email does not match to our records.',
        ]);

        $input = $req->input();

        $user_info = LoginCredentials::where('email', $input['email'])->first();

        $token = Str::random(40);
        $expire_key_time = date("Y-m-d H:i:s", strtotime("+15 minutes"));


        $user_info = User::where('email', $input['email'])->first();

        $user_info->token = $token;
        $user_info->expire_token = $expire_key_time;
        $link = route('web.userAuthVerify', ['email=' . $user->email . '&token=' . $token]);
    }
}
