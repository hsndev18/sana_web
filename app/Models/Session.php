<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Session extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /** The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /** Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;


    public function chats(): HasMany
    {
        return $this->hasMany(Chat::class);
    }

    public function scopeSessionId($query, $sessionId)
    {
        return $query->where('id', $sessionId);
    }
}
