@extends('layouts.dashboard')

@section('content')
    @include('faculty._sidenav')

    <x-panel>
        <main>
            <div class="container mt-4">
                <!-- Faculty Profile Section -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{ asset('path/to/faculty/profile/image.jpg') }}" alt="Faculty Image" class="img-fluid rounded-circle mb-4" style="max-width: 200px;">
                                <h1 class="mt-2">Hello, Coach ________</h1>
                                <p class="text-muted">Department of Sports Science</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Faculty Profile Section -->

                <!-- Event Calendar -->
                <div class="row justify-content-center mt-4">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-body event-calendar">
                                <h2 class="text-center">Event Calendar</h2>
                                <div id="calendar"></div>
                            </div>
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
            background-color: #f7f7f7;
            border-radius: 10px;
            padding: 20px;
        }

        .event-calendar h2 {
            font-size: 24px;
            color: #333333;
            margin-bottom: 20px;
        }

        .fc-day {
            background-color: #ffffff;
            border: 1px solid #d4d9e3;
            border-radius: 5px;
        }

        .fc-day:hover {
            background-color: #f0f0f0;
        }

        .fc-event {
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            color: #ffffff;
        }

        .fc-event:hover {
            background-color: #2b7cba;
        }
    </style>

    <!-- JavaScript for Event Calendar -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                editable: true,
                selectable: true,
                events: [
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
                eventBackgroundColor: '#3498db',
                eventTextColor: '#ffffff',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                dateClick: function(info) {
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
