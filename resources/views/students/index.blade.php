@extends('layouts.dashboard')

@section('content')
    @include('students._sidenav')
    
    <x-panel>
        <main>
            <style>
                .welcome-message-container {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    height: 100vh;
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
                }

                /* Add a fade-in animation */
                .welcome-message {
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
            </div>

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
        </main>
        <x-footer />
    </x-panel>  
</style>

 <!-- FullCalendar CSS and JavaScript -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>


    <!-- Custom CSS for Event Calendar -->
    <style>

        /* Set background color for the entire page */
        body {
            background-color: #f0f0f0; /* Adjust the color as needed */
        }

        .event-calendar {
            background-color: #5c2c784e ;
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

    <!-- JavaScript for Event Calendar -->
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                editable: true,
                selectable: true,
                selectHelper: true,
                events: {
                    url: '{{ route("get-event") }}',
                    method: 'GET',
                    extraParams: {
                        _token: '{{ csrf_token() }}'
                    },
                    failure: function () {
                        alert('There was an error while fetching events!');
                    }
                },
                eventBackgroundColor: '#3498db',
                eventTextColor: '#ffffff',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                displayEventTime: false,
                dateClick: function (info) {
                    var title = prompt('Event Title:');
                    var startDate = prompt('Start Date and Time (YYYY-MM-DD HH:mm):');
                    var endDate = prompt('End Date and Time (YYYY-MM-DD HH:mm):');

                    if (title) {
                       
                        calendar.addEvent({
                            title: title,
                            start: startDate,
                            end: endDate,
                            allDay: false // Assuming events can have specific times
                        });

                        // Send AJAX request to store the event in the database
                        $.ajax({
                            url: '{{ route("calendar-events.store") }}',
                            type: 'POST',
                            data: {
                                title: title,
                                start: startDate,
                                end: endDate,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                calendar.refetchEvents();
                                console.log(response);
                                calendar.refetchEvents();
                            },
                            error: function (error) {
                                console.error(error);
                            }
                        });
                    }
                },
                eventClick: function (info) {
                var action = prompt('Do you want to edit or delete this event? Type "edit" or "delete":');

                if (action === 'edit') {
                    editEvent(info);
                } else if (action === 'delete') {
                    deleteEvent(info);
                }
            },
        });

        calendar.render();
        
        function editEvent(info) {
                var eventTitle = prompt('Edit Event Title:', info.event.title);
                var newStartDate = prompt('Edit Event Start Date (YYYY-MM-DD HH:mm):', info.event.startStr);
                var newEndDate = prompt('Edit Event End Date (YYYY-MM-DD HH:mm):', info.event.end ? info.event.endStr : '');

                if (eventTitle !== null && newStartDate !== null) {
                    info.event.setProp('title', eventTitle);
                    info.event.setStart(newStartDate);
                    info.event.setEnd(newEndDate);

                    // Send AJAX request to update the event in the database
                    $.ajax({
                        url: '{{ route("calendar-events.update", ":id") }}'.replace(':id', info.event.id),
                        type: 'PUT',
                        data: {
                            title: eventTitle,
                            start: newStartDate,
                            end: newEndDate,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            calendar.refetchEvents();
                            console.log(response);
                        },
                        error: function (error) {
                            console.error(error);
                        }
                    });
                } else {
                    // User clicked Cancel, revert the changes
                    info.revert();
                }
            }


        function deleteEvent(info) {
            if (confirm('Are you sure you want to delete this event?')) {
                // Send AJAX request to delete the event from the database
                $.ajax({
                    url: '{{ route("calendar-events.delete", ":id") }}'.replace(':id', info.event.id),
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        info.event.remove(); // Remove the event from the calendar
                        console.log(response);
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            }
        }
    });
    </script>

    <!-- End JavaScript for Event Calendar -->
@endsection
