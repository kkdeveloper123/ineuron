<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = CATE;

    public function getCreatedAtAttribute($value)
    {
        return date('Y M, d', strtotime($value));
    }

    public function setCateNameAttribute($value)
    {
        $this->attributes['cate_name'] = ucfirst($value);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = ucfirst($value);
    }

    public function scopeActive($query)
    {
        return $query->where('status', '1');
    }
}
