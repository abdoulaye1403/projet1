<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chapitre extends Model
{
    public function cours():BelongsTo{
        return $this->belongsTo(Cours::class);
    }
}
