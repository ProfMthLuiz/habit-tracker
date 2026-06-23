<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HabitLog extends Model
{
    protected $fillable = [
        'user_id',
        'habit_id',
        'name'
    ];

    // Um registro (log) pertence a um usuário
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Um registro (log) pertence a um hábito
    public function habit(): BelongsTo
    {
        return $this->belongsTo(Habit::class);
    }
}
