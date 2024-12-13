<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Chapitre extends Model
{
    protected $fillable = ['titre', 'contenu', 'cours_id'];
    public function cours():BelongsTo{
        return $this->belongsTo(Cours::class,'cours_id');
    }
}
