<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalendarEvent;

class CalendarController extends Controller
{
    public function index()
    {
        return view('calendar.index');
    }

    public function getEvent()
    {
        // Fetch all calendar events
        $events = CalendarEvent::all();

        $formattedEvents = $events->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => is_string($event->start) ? $event->start : $event->start->toDateString(),
                'end' => $event->end ? ($event->end instanceof \DateTimeInterface ? $event->end->toDateTimeString() : $event->end) : null,
                'allDay' => $event->allDay,
            ];
        });

        return response()->json($formattedEvents);
    }

    public function create()
    {
        // Show the form for creating a new calendar event
        return view('calendar_events.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string',
            'start' => 'required|date',
            'end' => 'required|date',
        ]);

        // Create a new calendar event
        $calendarEvent = CalendarEvent::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('calendar-events.index')->with('success', 'Calendar event created successfully');
    }

    public function update($id, Request $request)
    {
        // Find the event by ID
        $event = CalendarEvent::findOrFail($id);

        // Validate the request data (adjust validation rules as needed)
        $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'nullable|date|after_or_equal:start',
        ]);

        // Update the event with the validated data
        $event->updateEvent([
            'title' => $request->input('title'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
        ]);

        // Optionally, you can return the updated event as a JSON response
        return response()->json(['message' => 'Event updated successfully', 'event' => $event]);
    }


    public function delete($id)
    {
        $event = CalendarEvent::findOrFail($id);
        $event->deleteEvent();

        return response()->json(['message' => 'Event deleted successfully']);
    }

}