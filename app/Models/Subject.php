<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Subject extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the image associated with the subject.
     */
    public function image(): MorphOne
    {
        return $this->morphOne(File::class, 'relatable')->where('type', 'image');
    }
}
