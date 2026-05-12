<?php

namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

trait LogsActivity
{
    protected static function bootLogsActivity()
    {
        static::created(function ($model) {
            $model->recordActivity('created');
        });

        static::updated(function ($model) {
            $model->recordActivity('updated');
        });

        static::deleted(function ($model) {
            $model->recordActivity('deleted');
        });
    }

    protected function recordActivity($event)
    {
        $properties = [];

        if ($event === 'updated') {
            $properties = [
                'old' => array_intersect_key($this->getOriginal(), $this->getDirty()),
                'attributes' => $this->getDirty(),
            ];
        } elseif ($event === 'created') {
            $properties = [
                'attributes' => $this->getAttributes(),
            ];
        } elseif ($event === 'deleted') {
            $properties = [
                'old' => $this->getAttributes(),
            ];
        }

        ActivityLog::create([
            'log_name' => strtolower(class_basename($this)),
            'description' => "{$event} " . class_basename($this),
            'subject_id' => $this->getKey(),
            'subject_type' => get_class($this),
            'causer_id' => Auth::id(),
            'causer_type' => Auth::check() ? get_class(Auth::user()) : null,
            'properties' => $properties,
            'event' => $event,
        ]);
    }
}
