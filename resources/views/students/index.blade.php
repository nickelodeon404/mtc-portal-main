@extends('layouts.dashboard')

@section('content')
    @include('students._sidenav')
    
    <x-panel>
        <main>
            <style>
                /* Global Styles */
                body {
                    background-color: #f0f0f0;
                }

                /* Welcome Message Styles */
                .welcome-message-container {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    height: 50vh; /* Adjusted height for better spacing */
                    margin-bottom: 20px;
                }

                .welcome-message {
                    font-family: 'Your-Font-Name', sans-serif;
                    font-size: 48px;
                    color: #000000;
                    background-color: #f4f4f4;
                    padding: 20px 40px;
                    border-radius: 20px;
                    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                    text-align: center;
                    margin: 0;
                    /* Add a fade-in animation */
                    animation: fadeIn 2s ease-in-out, bounce 2s infinite;
                }

                @keyframes fadeIn {
                    0% {
                        opacity: 0;
                    }
                    100% {
                        opacity: 1;
                    }
                }

                @keyframes bounce {
                    0%, 20%, 50%, 80%, 100% {
                        transform: translateY(0);
                    }
                    40% {
                        transform: translateY(-20px);
                    }
                    60% {
                        transform: translateY(-10px);
                    }
                }

                /* Calendar Styles */
                .event-calendar {
                    background-color: #5c2c784e;
                    border-radius: 10px;
                    padding: 20px;
                    margin-bottom: 20px; /* Adjusted margin */
                }

                .event-calendar h2 {
                    font-size: 24px;
                    color: #333333;
                    margin-bottom: 20px;
                    text-align: center;
                }

                .fc-day {
                    background-color: #ffffff;
                    border: 1px solid #c3cee4;
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

            <div class="container-fluid px-4 mt-4">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="welcome-message-container">
                            <h1 class="mt-4 mb-4 welcome-message">Welcome, {{ Auth::user()->name }}!</h1>
                        </div>
                    </div>
                </div>

                <!-- Event Calendar -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card event-calendar">
                            <h2>Event Calendar</h2>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

    <!-- JavaScript for Event Calendar -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                editable: false, // Disable editing
                selectable: false, // Disable selection
                events: [
                    {
                        title: 'Christmas Day',
                        start: '2023-12-25',
                        allDay: true
                    }
                ],
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                displayEventTime: false,
            });

            calendar.render();
        });
    </script>
    <!-- End JavaScript for Event Calendar -->
@endsection
