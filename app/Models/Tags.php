<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tags extends Model
{
    use HasFactory;

    protected $table = TAGS;
    protected $fillable = ['tags_name','slug'];
}
