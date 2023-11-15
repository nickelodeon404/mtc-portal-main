<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    use HasFactory;

    protected $table = 'calendar_events';

    protected $fillable = ['title', 'start', 'end'];

    protected $dates = ['start', 'end']; // Specify date fields

    

    // Example: Casting 'allDay' attribute to boolean
    protected $casts = [
        'allDay' => 'boolean',
    ];

    
    public function updateEvent($title, $start, $end = null)
    {
        $this->update([
            'title' => $title,
            'start' => $start,
            'end' => $end,
        ]);

        return $this;
    }

    // Delete an event
    public function deleteEvent()
    {
        $this->delete();
    }
}