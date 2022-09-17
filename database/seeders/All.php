<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categories;
use App\Models\Subcategory;
use App\Models\Setting;
use App\Models\BlogsCate;
use App\Models\Blogs;

class All extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cate_info = [
            'cate_name' => 'Defence',
            'slug' => 'defence',
            'description' => 'ssc description',
            'img' => 'asdas.jpg',
            'status' => '1',
        ];
        Categories::create($cate_info);

        $subcate_info = [
            'subcate_name' => 'CDS',
            'slug' => 'cds',
            'cate_id' => 1,
            'parent_id' => 1,
            'status' => 1,
        ];
        Subcategory::create($subcate_info);

        $blog_cate_info = [
            'cate_name' => 'Testblogcate',
            'slug' => 'testblogcate',
        ];
        BlogsCate::create($blog_cate_info);

        $blog_info = [
            'user_id' => 1,
            'title' => 'Blog title',
            'slug' => 'blog-title',
            'blog_cate' => 1,
            'content' => 'blog content test content',
            'status' => '1',
            'imgs' => '{"0":"1643796913-38c545b8c9eda650a3e0f73fbf709d6f.jpg"}'
        ];

        Blogs::create($blog_info);
    }
}
