<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Etudiant extends Model
{
    public function cours(): HasMany
    {
        return $this->hasMany(Cours::class, 'etudiant_id');
    }
}
