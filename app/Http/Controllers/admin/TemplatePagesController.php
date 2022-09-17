<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TemplatePages;
use App\Traits\Common_trait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TemplatePagesController extends Controller
{
    use Common_trait;

    public function index()
    {
        $all_info = TemplatePages::orderByDesc('created_at')->get();
        return view('admin.template-pages.index', compact('all_info'));
    }

    public function add_template_page()
    {
        return view('admin.template-pages.add');
    }

    public function insert_Template(Request $req)
    {
        $validated = $req->validate([
            'temp_name' => 'required|min:4|max:20',
            'heading' => 'required|min:10|max:250',
            'content' => 'required|min:10',
            'status' => 'required|in:0,1',
            'image' => 'required|mimes:jpg,jpeg,png',
        ],
            [
                'temp_name.required' => 'The template name field is required.',
            ]
        );

        $input = $req->input();

        $img_name = time() . '-' . Str::of(md5(time() . $req->file('image')->getClientOriginalName()))->substr(0, 50) . '.' . $req->file('image')->extension();
        $image = $req->file('image')->storeAs('admin/img/temp-pages', $img_name);

        $data = ['title' => $req->input('temp_name'),
            'slug' => $this->create_unique_slug($req->input('temp_name'), BLOGS, 'slug'),
            'heading' => $req->input('heading'),
            'img' => $img_name,
            'content' => $req->input('content'),
            'status' => $req->input('status'),
        ];

        $temp_data = new TemplatePages;

        $temp_data->temp_name = $req->input('temp_name');
        $temp_data->temp_slug = $this->create_unique_slug($req->input('temp_name'), BLOGS, 'slug');
        $temp_data->heading = $req->input('heading');
        $temp_data->img = $img_name;
        $temp_data->content = $req->input('content');
        $temp_data->status = $req->input('status');

        if ($temp_data->save()) {
            return back()->with('flash-success', 'Template page has been added successfully');
        } else {
            return back()->with('flash-error', 'Some error occurred in adding data');
        }
    }

    public function edit_Template($slug = '')
    {
        $single_info = TemplatePages::where('temp_slug', $slug)->first();
        return view('admin.template-pages.edit', compact('single_info'));
    }

    public function update_Template(Request $req, $slug = '')
    {
        # code...
    }


    public function privacy_policy()
    {
    }
}
