<?php

namespace App\Http\Controllers\admin;

use App\Models\Topic;
use App\Models\Subject;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TopicRequest as Request;

class TopicController extends Controller
{

  public function index()
  {
    $all_info = Topic::with('Subject')->get();
    $subject_info = Subject::all();
    return view('admin.topic.index', compact('all_info','subject_info',));
  }
  
  public function insert_topic(Request $req)
  {
    $input = $req->input();
    
    $topic_object = new Topic;
    
    $topic_object->user_id = Auth::user()->id;
    $topic_object->name = $input['name'];
    $topic_object->slug = Str::slug($input['name']);
    $topic_object->subject_id = $input['subject_id'];
    $topic_object->description = $input['description'];
    $topic_object->status = $input['status'];
    
    if ($topic_object->save()) {
      return back()->with('flash-success', 'Topic added successfully');
    } else {
      return back()->with('flash-error', 'Error occured in adding data');
    }
  }

  public function edit_topic($slug = '')
  {
    $single_data = Topic::where('slug', $slug)->firstOrFail();
    $subject_info = Subject::all();
    return view('admin.topic.edit', compact('single_data','subject_info'));
  }
  public function update_topic(Request $req, $slug = '')
  {
    $input = $req->input();
    
    $update_obj = Topic::where('slug', $slug)->firstOrFail();
    
    $update_obj->user_id = Auth::user()->id;
    $update_obj->name = $input['name'];
    $update_obj->slug = Str::slug($input['name']);
    $update_obj->subject_id = $input['subject_id'];
    $update_obj->description = $input['description'];
    $update_obj->status = $input['status'];
    
    if ($update_obj->save()) {
      return redirect()->route('admin.editTopic', [$update_obj->slug])->with('flash-success', 'Topic updated successfully');
    } else {
      return redirect()->route('admin.editTopic', [$slug])->with('flash-error', 'Error occured in updating data');
    }
  }
}
