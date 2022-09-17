<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Emailing;
use App\Http\Requests\AdminEmailingRequest;

use Illuminate\Support\Str;

class EmailingController extends Controller
{
  public function index($url = '')
  {
    if ($url == 'inbox'){
      $sent_mails = Emailing::all();
    }else{
    }
    return view('admin.emailing.index', compact('sent_mails'));
  }

  public function email_compose_page()
  {
    return view('admin.emailing.compose');
  }

  public function compose_emails(AdminEmailingRequest $req)
  {
    $input = $req->input();

    $mail = new Emailing;

    $mail->email_to = $input["to"];
    $mail->email_cc = $input["cc"];
    $mail->email_bcc = $input["bcc"];
    $mail->subject = $input["subject"];
    $mail->content = $input["message"];
    $mail->type = 1;
    $mail->trash = 0;
    pre($mail);

    // return $mail;
    if ($mail->save()) {
      return back()->with('flash-success', 'Email sent successfully');
    } else {
      return back()->with('flash-error', 'Error occured while sending the email. Please try again after some time');
    }

    pre($input);
    //if () {
    //  return redirect()->route('admin.dashboard');
    //} else {
    //  return back()->with('flash-error', 'Invalid credentials')->withInput();
    //}
  }
}
