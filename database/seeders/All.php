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
    }
}
