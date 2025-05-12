<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Turn extends Model
{
    use HasFactory;
    public function matches(): BelongsTo
    {
        return $this->belongsTo(ChessMatch::class, 'id', 'match_ID');
    }
    //
}
