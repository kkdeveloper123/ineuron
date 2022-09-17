<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ExamEvents;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\ExamEventsRequest;
use App\Models\Subcategory;
use Exception;

class ExamEventsController extends Controller
{
  public function index(Request $req)
  {
    $all_info = ExamEvents::all();
    $subcats = Subcategory::active()->get();
    return view('admin.exam-events.index', compact('all_info', 'subcats'));
  }

  public function insert_exam_events(ExamEventsRequest $req)
  {
    $event_info = new ExamEvents;
    $event_info->slug = Str::slug($req->name, '-');
    $event_info->event_name = $req->name;
    $event_info->event_exam_ids = json_encode($req->subcategories);
    $event_info->status = $req->status;
    if ($event_info->save()) {
      return back()->with('flash-success', 'Exam event added successfully');
    } else {
      return back()->with('flash-error', 'Error occured in adding data');
    }
  }

  public function edit_exam_events($slug = '')
  {
    $single_data = ExamEvents::where('slug', $slug)->firstOrFail();
    $subcats = Subcategory::active()->get();
    return view('admin.exam-events.edit', compact('single_data', 'subcats'));
  }

  public function update_exam_events(ExamEventsRequest $req, $slug)
  {
    $event_info = ExamEvents::where('slug', $slug)->firstOrFail();
    $event_info->slug = Str::slug($req->name);
    $event_info->event_name = $req->name;
    $event_info->event_exam_ids = json_encode($req->subcategories);
    $event_info->status = $req->status;
    if ($event_info->save()) {
      return  redirect()->route('admin.examEventsIndex')->with('flash-success', 'Exam event updated successfully');
    } else {
      return back()->with('flash-error', 'Error occured in adding data');
    }
  }
}
