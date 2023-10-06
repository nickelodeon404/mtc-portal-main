@extends('layouts.dashboard')

@section('content')
    @include('faculty._sidenav')

    <x-panel>
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4 text-center">Hello, Coach ______!</h1>
                <!-- Event Calendar -->
                <div class="col-xl-9 col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body event-calendar">
                            <h2 class="text-center">Event Calendar</h2>
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <!-- End Event Calendar -->
            </div>
        </main>
        <x-footer />
    </x-panel>

    <!-- FullCalendar CSS and JavaScript -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>

    <!-- Custom CSS for Event Calendar -->
    <style>
        .event-calendar {
            background-color: #f1d7ff; /* background */
            border: 1px solid #d4d9e3; /* border */
            border-radius: 10px;
            padding: 20px;
        }

        .event-calendar h2 {
            font-size: 24px;
            color: #333333; /* text color */
            margin-bottom: 20px;
        }

        .fc-day {
            background-color: #ffffff; /* background for day cells */
            border: 1px solid #d4d9e3; /* border */
            border-radius: 5px;
        }

        .fc-day:hover {
            background-color: #fff0ff; /* background on hover */
        }

        .fc-event {
            background-color: #e0b0ff; /* background for events */
            border: none;
            border-radius: 5px;
            color: #ffffff; /* White text color */
        }

        .fc-event:hover {
            background-color: #f1d7ff; /* hover */
        }

        /* Responsive Calendar Styles */
        @media (max-width: 768px) {
            .event-calendar {
                padding: 10px;
            }
            .event-calendar h2 {
                font-size: 20px;
            }
        }
    </style>

    <!-- JavaScript for Event Calendar -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth', // You can change the view mode
                editable: true, // Allow event creation and editing
                selectable: true, // Allow selecting date range for new events
                events: [
                    // Here, you can dynamically fetch and display events from your database or data source
                    {
                        title: 'Event 1',
                        start: '2023-10-10',
                        end: '2023-10-10'
                    },
                    {
                        title: 'Event 2',
                        start: '2023-10-15',
                        end: '2023-10-16'
                    },
                    // Add more events as needed
                ],
                // Custom styling
                eventBackgroundColor: '#3498db', // Set event background color
                eventTextColor: '#ffffff', // Set event text color to white
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                dateClick: function(info) {
                    // Handle date click here to add a new event
                    var title = prompt('Event Title:');
                    if (title) {
                        calendar.addEvent({
                            title: title,
                            start: info.dateStr,
                            allDay: true
                        });
                    }
                }
            });
            calendar.render();
        });
    </script>
    <!-- End JavaScript for Event Calendar -->
@endsection
