<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    protected $fillable = ['first_name', 'last_name', 'birth_date','address','phone_number','email'];
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'student_courses')->withTimestamps();
    }
}
