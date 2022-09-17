<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $table = ENQUIRY;

    protected $guard = '';

    public function scopeUnread($query){
        return $query->where(['trash'=>0]);
    }

    public function scopeTrash($query){
        return $query->where(['trash'=>1]);
    }
}
