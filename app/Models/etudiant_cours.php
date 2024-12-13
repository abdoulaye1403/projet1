<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class etudiant_cours extends Model
{
    public function cours():BelongsTo{
        return $this->belongsTo(Cours::class);
    }
    // Relation avec Chapitres
    public function etudiant(): BelongsTo
    {
        return $this->belongsTo(Etudiant::class);
    }
}
