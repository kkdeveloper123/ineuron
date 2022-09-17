<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogsCate extends Model
{
    use HasFactory;

    protected $table = BLOGS_CATE;
    protected $fillable = ['cate_name', 'slug'];

    public function setCateNameAttribute($value)
    {
        $this->attributes['cate_name'] = ucfirst($value);
    }

    public function post()
    {
        // return $this->hasMany(Blogs::class, 'blog_cate', 'id');
    }

}
