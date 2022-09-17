<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SeoPages extends Model
{
    use HasFactory;

    protected $table = SEOPAGES;
    protected $guard = '';
    protected $fillable = ['page_name','slug'];

  public function setpageNameAtt($value)
    {
        $this->attributes['page_name'] = ucfirst($value);
    }   
}
