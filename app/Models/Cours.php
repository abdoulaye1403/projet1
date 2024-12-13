<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cours extends Model
{
    protected $fillable = ['titre', 'description', 'professeur_id'];
    public function professeur(): BelongsTo
    {
        return $this->belongsTo(Professeur::class);
    }
    // Relation avec Chapitres
    public function chapitres(): HasMany
    {
        return $this->hasMany(Chapitre::class,'cours_id');
    }

    public function etudiants(): HasMany
    {
        return $this->hasMany(Etudiant::class);
    }
}
