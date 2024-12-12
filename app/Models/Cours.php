<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cours extends Model
{
    public function professeur():BelongsTo{
        return $this->belongsTo(Professeur::class);
    }
}
