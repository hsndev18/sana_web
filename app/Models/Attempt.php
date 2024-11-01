<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attempt extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the session of a specific Chat
     */
    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }

    /**
     * Get the attemptable model that the attempt belongs to
     */
    public function attemptable(): MorphTo
    {
        return $this->morphTo('attemptable', 'attemptable_type', 'attemptable_id');
    }

    /**
     * Get the attempt answers for the attempt
     */
    public function attemptAnswers(): HasMany
    {
        return $this->hasMany(AttemptAnswer::class);
    }

    /**
     * The answers that belong to the attempt
     */
    public function answers(): BelongsToMany
    {
        return $this->belongsToMany(Answer::class, 'attempt_answers')->withTimestamps();
    }
}
