<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\BlogsCate;
use App\Traits\Common_trait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogsController extends Controller
{
    use Common_trait;

    public function index()
    {
        $all_info = Blogs::with('Category')->get();
        return view('admin/blogs/index', compact('all_info'));
    }

    public function add_blogs_page()
    {
        $blogs_cate = BlogsCate::all();
        return view('admin/blogs/add', compact('blogs_cate'));
    }

    public function insert_blogs(Request $req)
    {
        $validated = $req->validate(
            [
                'title' => 'required|min:10|max:75',
                'blog_cate' => 'required',
                'status' => 'required|in:0,1',
                'content' => 'required',
                'image.*' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'blog_cate.required' => 'The blog category field is required.',
            ]
        );

        foreach ($req->file('image') as $key => $value) {
            $img_name[$key] = time() . '-' . Str::of(md5(time() . $req->file('image')[$key]->getClientOriginalName()))->substr(0, 50) . '.' . $req->file('image')[$key]->extension();
            $path = $req->file('image')[$key]->storeAs('admin/img/blog-img/', $img_name[$key]);
        }

        $data = [
            'user_id' => 1,
            'title' => $req->input('title'),
            'slug' => $this->create_unique_slug($req->input('title'), BLOGS, 'slug'),
            'blog_cate' => $req->input('blog_cate'),
            'imgs' => json_encode($img_name, JSON_FORCE_OBJECT),
            'content' => $req->input('content'),
            'status' => $req->input('status'),
        ];

        if (Blogs::create($data)) {
            return redirect()->route('admin.blogs-add')->with('flash-success', 'Blog added successfully');
        } else {
            return redirect()->route('admin.blogs-add')->with('flash-error', 'Error occured in adding data');
        }
    }

    public function delete_blogs($slug = '')
    {
        $result = Blogs::where('slug', $slug)->firstOrFail();
        if ($result) {
            $result->delete();
           if ($result->imgs && file_exists('public/admin/img/blog-img/'.$result)) {
            unlink('public/admin/img/blog-img/' . $result->getAttributes()['imgs']);
           }
            return redirect()->route('admin.blogs')->with('flash-success', 'Blog deleted successfully');
        } else {
            return redirect()->route('admin.blogs')->with('flash-error', 'Error occured in deleting data');
        }
    }

    public function delete_blog_image($slug = '', $key = '')
    {
        $blog_info = Blogs::where('slug', $slug)->firstOrFail();
        $blog_imgs = json_decode($blog_info->getAttributes()['imgs'], true);

        if (count($blog_imgs) > 1) {
            $delete_img = $blog_imgs[$key];
            unset($blog_imgs[$key]);

            $result = Blogs::where('slug', $slug)->update(['imgs' => json_encode(array_values($blog_imgs), JSON_FORCE_OBJECT)]);

            if ($result) {
                unlink('public/admin/img/blog-img/' . $delete_img);
                return redirect()->route('admin.editBlogs', [$slug])->with('flash-success', 'Blog image deleted successfully');
            } else {
                return redirect()->route('admin.editBlogs', [$slug])->with('flash-error', 'Error occured in deleting data');
            }
        } else {
            return redirect()->route('admin.editBlogs', [$slug])->with('flash-error', 'Atleast one image is required');
        }
    }

    public function edit_blog($slug = '')
    {
        $single_data = Blogs::where('slug', $slug)->firstOrFail();
        $blogs_cate = BlogsCate::all();
        return view('admin/blogs/edit', compact('single_data', 'blogs_cate'));
    }

    public function update_blog(Request $req, $slug = '')
    {
        $validated = $req->validate(
            [
                'title' => 'required|min:10|max:75',
                'blog_cate' => 'required',
                'status' => 'required|in:0,1',
                'content' => 'required',
                'image' => 'mimes:jpg,jpeg,png',
            ],
            [
                'blog_cate.required' => 'The blog category field is required.',
            ]
        );

        $input = $req->input();

        $blog_info = Blogs::where('slug', $slug)->firstOrFail();

        $data = [
            'user_id' => 1,
            'title' => $req->input('title'),
            'slug' => $this->create_unique_slug($req->input('title'), BLOGS, 'slug', 'slug', $blog_info->slug),
            'blog_cate' => $req->input('blog_cate'),
            'content' => $req->input('content'),
            'status' => $req->input('status'),
        ];

        if ($req->file('image') != '') {
            $img_name = time() . '-' . Str::of(md5(time() . $req->file('image')->getClientOriginalName()))->substr(0, 50) . '.' . $req->file('image')->extension();
            $path = $req->file('image')->storeAs('admin/img/blog-img/', $img_name);
            // unlink('public/admin/img/blog-img/' . $blog_info->getAttributes()['imgs']);
            $img = $img_name;

            $blog_imgs = json_decode($blog_info->getAttributes()['imgs'], true);
            array_push($blog_imgs, $img);

            $data['imgs'] = json_encode($blog_imgs, JSON_FORCE_OBJECT);
        }

        $result = Blogs::where('slug', $slug)->update($data);

        if ($result) {
            return redirect()->route('admin.editBlogs', [$data['slug']])->with('flash-success', 'Blog updated successfully');
        } else {
            return redirect()->route('admin.editBlogs', [$slug])->with('flash-error', 'Error occured in updating data');
        }
    }

    // ------------------------------BLOGS CATEGORY------------------------------

    public function cate_blogs()
    {
        $blogs_cate = BlogsCate::all();
        return view('admin/blogs/category', compact('blogs_cate'));
    }

    public function cate_blogs_insert(Request $req)
    {
        $validated = $req->validate([
            'title' => 'required|unique:' . BLOGS_CATE . ',slug|max:10',
        ]);

        $inputs = $req->input();

        $data = [
            'cate_name' => $inputs['title'],
            'slug' => Str::slug($inputs['title'], '-'),
        ];

        if (BlogsCate::create($data)) {
            return redirect()->route('admin.blogs-category')->with('flash-success', 'Category added successfully');
        } else {
            return redirect()->route('admin.blogs-category')->with('flash-error', 'Error occured in adding data');
        }
    }

    public function edit_cate_blogs($slug = '')
    {
        $single_data = BlogsCate::where('slug', $slug)->firstOrFail();
        return view('admin/blogs/edit-category', compact('single_data'));
    }

    public function update_cate_blogs(Request $req, $slug = '')
    {
        $validated = $req->validate([
            'title' => ['required', Rule::unique(BLOGS_CATE, 'slug')->ignore($slug, 'slug')],
        ]);

        $input = $req->input();

        $cate_info = BlogsCate::where('slug', $slug)->firstOrFail();

        $cate_info->cate_name = $input['title'];
        $cate_info->slug = Str::slug($input['title'], '-');

        if ($cate_info->save()) {
            return redirect()->route('admin.edit-blogs-category', [$cate_info->slug])->with('flash-success', 'Category updated successfully');
        } else {
            return redirect()->route('admin.edit-blogs-category', [$slug])->with('flash-error', 'Error occured in updating data');
        }
    }
}
