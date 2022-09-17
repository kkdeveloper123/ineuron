<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Email extends Model
{
    use HasFactory;

    protected $table = EMAILDATA;
    protected $guard = '';

    public function scopeUnread($query){
        return $query->where(['trash'=>0]);
    }

    public function scopeTrash($query){
        return $query->where(['trash'=>1]);
    }
}
