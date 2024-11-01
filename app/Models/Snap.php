<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Snap extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get all of the owning snapable models.
     */
    public function snapable(): MorphTo
    {
        return $this->morphTo('snapable', 'snapable_type', 'snapable_id');
    }
}
