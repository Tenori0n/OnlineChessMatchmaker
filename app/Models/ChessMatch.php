<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChessMatch extends Model
{
    use HasFactory;
    protected $table = 'matches';

    public function whiteUser(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'white_ID', 'id');
    }

    public function blackUser(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'black_ID', 'id');
    }

    public function turns(): HasMany
    {
        return $this->hasMany(Turn::class, 'match_ID', 'id');
    }
    //
}
