<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    protected $fillable = [
        'user_id', 
        'gender',
        'grade',
        'dateofbirth',
        'address',
        'phone',
    ];
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function students(){
        return $this->courses()->withCount('students');
    }
}
