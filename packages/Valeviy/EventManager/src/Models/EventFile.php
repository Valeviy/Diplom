<?php

namespace Valeviy\EventManager\Models;

use Illuminate\Database\Eloquent\Model;

class EventFile extends Model
{
    protected $fillable = [

        'event_id', 'filename'
    ];

    /**
     * A file has one event.
     *
     */
    public function event()
    {
        $relatedModel = config('eventmanager.table-models.events_model');
        return $this->belongsTo(config($relatedModel), "id", "event_id");
    }
}
