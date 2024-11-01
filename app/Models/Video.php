<?php

namespace App\Models;

use App\Enums\Status\VideoStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Builder;

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

    /**
     * Scope a query to only include videos with a specific video id.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $videoId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVideoId($query, $videoId)
    {
        return $query->where('video_id', $videoId);
    }

    /**
     * Scope a query to only include videos that are not failed.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsNotCompleted(Builder $query)
    {
        return $query->whereNot('status', VideoStatus::COMPLETED);
    }
}
