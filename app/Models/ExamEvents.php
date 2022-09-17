<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamEvents extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = EX_EVENT;

    public function getCreatedAtAttribute($value)
    {
        return date('Y M, d', strtotime($value));
    }

    public function setEventNameAttribute($value)
    {
        $this->attributes['event_name'] = ucfirst($value);
    }

    public function scopeActive($query)
    {
        return $query->where('status', '1');
    }
}
