<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
   protected $fillable = [
        'course_id',
        'module_id',
        'title',
        'text',
        'video',
        'image',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
