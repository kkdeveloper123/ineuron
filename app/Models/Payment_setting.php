<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Payment_setting extends Model
{
    use HasFactory;

    protected $table = SETTING;
    protected $guard = '';
}
