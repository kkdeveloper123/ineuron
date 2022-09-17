<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Faqs extends Model
{
    use HasFactory;

    protected $table = FAQS;
    protected $guard = '';
}
