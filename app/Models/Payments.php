<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Payments extends Model
{
    use HasFactory;

    protected $table = PAYMENT;
    protected $guard = '';

    public function getTemplateNameAttribute($value)
    {
        return asset('public/admin/img/user-template/' . $value);
    }

    public function getUser()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getTemplate()
    {
        return $this->belongsTo(Template::class,'template_id');
    }

   
}
