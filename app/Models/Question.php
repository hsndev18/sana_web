<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get all of the owning questionable models.
     */
    public function questionable(): MorphTo
    {
        return $this->morphTo('questionable', 'questionable_type', 'questionable_id');
    }
}
