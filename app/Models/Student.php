<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    protected $fillable = [
        'user_id', 
        'dateofbirth',
        'address',
        'phone',
        'gender'
    ];
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'student_courses')->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
