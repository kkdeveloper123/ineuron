<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SeoPagesContent extends Model
{
    use HasFactory;

    protected $table = SEO_CONT;
}
