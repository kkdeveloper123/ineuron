<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;


class User extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = USERS;

    /**
     * The attributes that are mass assignable.
     *
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function setFullnameAttribute($value)
    {
        $this->attributes['fullname'] = ucfirst($value);
    }

    public function getAvatarAttribute($value)
    {
        return asset('public/admin/subadmin/image/' . $value);
    }

    public function getAttributes()
    {
        return $this->attributes;
    }
}
