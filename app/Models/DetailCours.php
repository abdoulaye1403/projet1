<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailCours extends Model
{
    public function cours():BelongsTo{
        return $this->belongsTo(Cours::class);
    }

    public function etudiant():BelongsTo{
        return $this->belongsTo(Etudiant::class);
    }
}
