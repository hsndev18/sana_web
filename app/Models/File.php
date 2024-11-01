<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class File extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be appended to the model.
     *
     * @var array
     */
    protected $appends = ['path', 'extention'];

    public static function boot()
    {
        parent::boot();
        static::deleted(function ($item) {
            Storage::delete($item->name);
        });
    }

    /**
     * Get the path to the file.
     *
     * @return string
     */
    protected function path(): Attribute
    {
        return Attribute::make(get: function () {
            if ($this->name && Storage::exists($this->name)) {
                return Storage::url($this->name);
            }

            return null;
        });
    }

    /**
     * Get the extention of the file.
     *
     * @return string
     */
    protected function extention(): Attribute
    {
        return Attribute::make(get: function () {
            if ($this->mime && Storage::exists($this->name)) {
                return $this->mime;
            }

            return null;
        });
    }

    /**
     * Get all of the owning relatable models.
     */
    public function relatable(): MorphTo
    {
        return $this->morphTo('relatable', 'relatable_type', 'relatable_id');
    }
}
