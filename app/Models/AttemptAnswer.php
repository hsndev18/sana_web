<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttemptAnswer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the exam attempt that owns the attempt answer.
     */
    public function examAttempt(): BelongsTo
    {
        return $this->belongsTo(Attempt::class);
    }

    /**
     * Get the answer that owns the attempt answer.
     */
    public function answer(): BelongsTo
    {
        return $this->belongsTo(Answer::class);
    }
}
