<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = SUBJECT;

    public function Categories()
    {
        return $this->belongsTo(Categories::class, 'cate_id');
    }
}
