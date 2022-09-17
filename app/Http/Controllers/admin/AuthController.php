<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\AuthMail;
use App\Models\User;
use App\Models\LoginCredentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function loginAuth(Request $req)
    {
        $credentials = $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user_info = LoginCredentials::where('email', $credentials)->whereIn('role_status', [1, 2])->first();

        if ($user_info) {
            $user['email'] = $user_info['email'];
            $user['password'] = $credentials['password'];

            if (Auth::guard('admin')->attempt($user)) {

                return redirect()->route('admin.dashboard');
            } else {
                return back()->with('flash-error', 'Invalid credentials')->withInput();
            }
        } else {
            return back()->with('flash-error', "You dont have access to login")->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function forgotEmailVerify(Request $req)
    {
        $validated = $req->validate(
            [
                'email' => 'required|email|exists:' . USERS,
            ],
            [
                'email.exists' => 'This email not exist in our records',
            ]
        );

        $input = $req->input();

        $token = Str::random(40);
        $expire_key_time = date("Y-m-d H:i:s", strtotime("+15 minutes"));

        $data = [
            'forget_key' => $token,
            'expire_forget_key' => $expire_key_time,
        ];

        $result = User::where('email', $input['email'])->update($data);
        $data = [
            'link' => $token,
            'msg' => $expire_key_time,
        ];

        $mail_data = [
            "heading" => "Reset Password",
            "link" => URL('project-admin-panel/reset-password/' . $token),
            "msg" => "If you've lost password or wish to reset it, use the link below to get started.",
            "btn_text" => "Reset Your Password",
            "footer" => 'If you did not request a password reset, you can safely ignore this email. Only a person with access to your email can reset your account password.',
        ];

        // $mail_status = Mail::to($input['email'])->send(new AuthMail($mail_data));

        if ($result) {
            return back()->with('flash-success', 'A password reset link has been sent to your email')->withInput();
        } else {
            return back()->with('flash-error', 'Some error occurred')->withInput();
        }
    }

    public function resetPassword($token = '')
    {
        $info = User::where('forget_key', $token)->firstOrFail();
        return view('admin/auth/reset-password', ['token' => $token]);
    }

    public function verifyResetPassword(Request $req, $token)
    {
        $validated = $req->validate(
            [
                'password' => 'required|min:6|max:15',
                'password_confirmation' => 'required|same:password',
            ],
            [
                'password_confirmation.confirmed' => 'The password confirmatoin does not match',
            ]
        );

        $input = $req->input();

        $current_time = date("Y-m-d H:i:s");

        $info = User::where('forget_key', $token)->first();

        if (strtotime($info->expire_forget_key) < strtotime($current_time)) {
            return back()->with('flash-success', 'Password reset link has been expired');
        } else {
            $data = User::where('forget_key', $token)->first();
            $data->password = Hash::make($input['password']);

            if ($data->save()) {
                return redirect()->route('admin.login')->with('flash-success', 'Password changed successfully');
            } else {
                return back()->with('flash-error', 'Some error occurred in changing password');
            }
        }
    }
}
