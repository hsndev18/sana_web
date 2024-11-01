<?php

namespace App\Models;

use App\Enums\Status\VideoStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Video extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'status' => VideoStatus::class,
    ];

    /**
     * Get all of the snaps for the video.
     */
    public function snaps(): MorphMany
    {
        return $this->morphMany(Snap::class, 'snapable');
    }
}
