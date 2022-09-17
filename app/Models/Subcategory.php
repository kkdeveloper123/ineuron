<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = SUBCATE;

    public function setsubcatenameAttribute($value)
    {
        $this->attributes['subcate_name'] = ucfirst($value);
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'cate_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return date('Y M, d', strtotime($value));
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
