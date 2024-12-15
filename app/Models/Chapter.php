<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Chapter extends Model
{
    protected $fillable = ['titre', 'contenu', 'cours_id'];
    public function course():BelongsTo{
        return $this->belongsTo(Course::class);
    }
}
