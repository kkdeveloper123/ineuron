<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $table = BLOGS;
    protected $fillable = ['user_id', 'title', 'slug', 'blog_cate', 'imgs', 'content', 'status'];

    public function Category()
    {
        return $this->hasOne(BlogsCate::class, 'id', 'blog_cate');
    }

    public function scopeActive($query)
    {
        return $query->where('status', '1');
    }

    public function getImgsAttribute($value)
    {
        $gallary = [];
        $img_arr = json_decode($value);
        foreach ($img_arr as $key => $value) {
            array_push($gallary, asset('admin/img/blog-img/'.$value));
        }
        return $gallary;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }
}
