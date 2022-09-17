<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

use App\Traits\Common_trait;

class EmailController extends Controller{
  use Common_trait;

  public function index(){
    $unread = Enquiry::unread(true)->get();
    $count = count($unread);
    $trash = Enquiry::trash(true)->get();
    $trashCount = count($trash);

    return view('admin.email.index',compact('count','trashCount'));
  }

  public function add_email(Request $req){
    $validated = $req->validate(
        [
            'email_to' => 'required',
            'email_cc' => 'required',
            'email_bcc' => 'required',
            'subject' => 'required',
            'content' => 'required|min:100|max:2000',
        ]);
    
    $input = $req->input();
    $email = new Enquiry;
    
    $email->email_to = $input['email_to'];
    $email->email_cc = $input['email_cc'];
    $email->email_bcc = $input['email_bcc'];
    $email->subject = $input['subject'];
    $email->content = $input['content'];
    if ($email->save()) {
        return back()->with('flash-success', 'Email added successfully');
    } else {
        return back()->with('flash-error', 'Error occured in adding data');
    }
  }
  public function email_inbox(){
    $all_info = Enquiry::where('trash',0)->get();
    $unread = Enquiry::unread(true)->get();
    $count = count($unread);
    $trash = Enquiry::trash(true)->get();
    $trashCount = count($trash);
    return view('admin.email.inbox',compact('all_info','count','trashCount'));
  }

  public function email_details($id){
    $single_data = Enquiry::where('id', $id)->firstOrFail();
    $unread = Enquiry::unread(true)->get();
    $count = count($unread);
    $trash = Enquiry::trash(true)->get();
    $trashCount = count($trash);

    $single_data->msg_status =1;
    if($single_data->save()){
      return view('admin.email.detail',compact('single_data','count','trashCount'));
    }
  }
  public function email_delete($id){
    $single_data = Enquiry::where('id', $id)->firstOrFail();
    $single_data->trash =1;
    if($single_data->save()){
      return back()->with('flash-success', 'Email delete successfully');
    }
  }

  public function email_trash(){
    $trash = Enquiry::trash(true)->get();
    $unread = Enquiry::unread(true)->get();
    $count = count($unread);
    $trashCount = count($trash);

    return view('admin.email.trash',compact('trash','count','trashCount'));
    
  }

  public function email_deleteall(Request $req){
    $ids = $req->join_selected_values;
    $email_id = explode(",",$ids);
    $data =array(
      'trash' =>1,
    );
    
      $single_data = Enquiry::whereIn('id', $email_id)->update($data);
 
      if($single_data){
        echo 1;
      }
   
  }
  public function trash_email_deleteall(Request $req){
    $ids = $req->join_selected_values;
    $email_id = explode(",",$ids);
    foreach ($email_id as  $value) {
      $single_data = Enquiry::where('id', $value)->firstOrFail();

      if($single_data->delete()){
        echo 1;
      }
    }
  }
}