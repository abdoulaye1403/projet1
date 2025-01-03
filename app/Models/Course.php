<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    protected $fillable = ['title', 'description', 'professeur_id'];
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
    // Relation avec Chapitres
    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_courses')->withTimestamps();
    }
}
