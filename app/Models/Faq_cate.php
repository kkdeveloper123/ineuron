<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Faq_cate extends Model
{
    use HasFactory;

    protected $table = FAQ_CATE;
    protected $guard = '';
    protected $fillable = ['cate_name','slug'];
}
