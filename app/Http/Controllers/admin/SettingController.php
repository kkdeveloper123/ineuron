<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\EmailConfig;
use App\Models\Payment_setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $all_info = Payment_setting::all();

        return view('admin.settings.payment', compact('all_info'));
    }

    public function insert_payment_setting(Request $req, $type = '')
    {
        if ($type == 'paypal') {
            $validator = $req->validate([
                'paypal_key' => 'required',
                'paypal_secret' => 'required',
            ]);
        }
        if ($type == 'stripe') {
            $validator = $req->validate([
                'stripe_key' => 'required',
                'stripe_secret' => 'required',
            ]);
        }

        $input = $req->input();

        if ($type == 'paypal') {
            $api_keys = json_encode(['key' => $input['paypal_key'], 'secret' => $input['paypal_secret']]);
            $Payment_mode = $input['payment_mode'];
        }
        if ($type == 'stripe') {
            $api_keys = json_encode(['key' => $input['stripe_key'], 'secret' => $input['stripe_secret']]);
            $Payment_mode  = $input['payment_mode'];

        }

        $setting_info = Payment_setting::where('type', $type)->firstOrFail();
        if (!$setting_info) {
            $setting_info = new Payment_setting;
        }
        $setting_info->api_keys = $api_keys;
        $setting_info->type = $type;
        $setting_info->mode = $Payment_mode;

        $setting_info->status = $input['status'];


        if ($setting_info->save()) {
            return back()->with('flash-success', 'Setting updated successfully');
        } else {
            return back()->with('flash-error', 'Error occured in updating data');
        }
    }

    public function email_config_index()
    {
        $all_info = EmailConfig::find(1);
        return view('admin.settings.email', compact('all_info'));
    }

    public function email_config_modify(Request $req)
    {
        $validator = $req->validate([
            'name' => 'required',
            'smtp_host' => 'required',
            'smtp_port' => 'required',
            'smtp_user' => 'required',
            'smtp_pass' => 'required',
            'smtp_encryption' => 'required',
        ]);

        $input = $req->input();

        $email_info = EmailConfig::find(1);
        
        if ($email_info) {
            $email_info->name = $input['name'];
            $email_info->smtp_host = $input['smtp_host'];
            $email_info->smtp_port = $input['smtp_port'];
            $email_info->smtp_user = $input['smtp_user'];
            $email_info->smtp_pass = $input['smtp_pass'];
            $email_info->smtp_encryption = $input['smtp_encryption'];

            if ($email_info->save()) {
                return back()->with('flash-success', 'Setting updated successfully');
            } else {
                return back()->with('flash-error', 'Error occured in updating data');
            }
        } else {
            return back()->with('flash-error', 'Error occured in updating data');
        }
    }

}
