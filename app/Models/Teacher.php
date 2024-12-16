<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    protected $fillable = ['first_name', 'last_name', 'birth_date','address','phone_number','email','grade'];
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
