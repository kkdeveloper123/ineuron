<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pages extends Model
{
    use HasFactory;

    protected $table = PAGES;
    protected $guard = '';
}
