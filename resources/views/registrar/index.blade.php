@extends('layouts.dashboard')
@section('content')
    @include('registrar._sidenav')
    <style type="text/css">
        /* Set background color for the entire page */
        body {
            background-color: #f0f0f0; /* Adjust the color as needed */
        }

        /* Improve overall layout and spacing */
        .container {
            padding: 20px;
        }

        /* Style for breadcrumbs */
        .breadcrumb {
            background-color: transparent;
            margin: 0;
        }

        .breadcrumb-item.active {
            font-weight: bold;
        }

        /* Style for page title */
        h1 {
            font-size: 28px;
            margin: 20px 0;
        }

        /* Style for cards */
        .card {
            background-color: #fff; /* Card background color */
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
            padding: 20px;
            margin: 5px; /* Increase the margin to make the cards larger */
        }

        .card-body {
            padding: 0;
        }

        /* Style for icons in cards */
        .icon {
            margin-right: 10px;
        }

        /* Style for chart card */
        #barGraph {
            max-width: 800px;
            width: 100%;
            height: 400px; /* Adjust the height as needed */
        }
    </style>

    <x-panel>
        <main>
            <div class="container">
                <ol class="breadcrumb mt-4">
                    <li class="breadcrumb-item active">Mother Theresa Colegio de Iriga</li>
                </ol>
                <h1>Dashboard</h1>
                <div class="row">
                    <div class="col-xl-3 col-md-6 d-flex justify-content-center">
                        <div class="card">
                            <div class="card-body">
                                <span class="heading"><i class="fas fa-graduation-cap icon"></i>Admissions</span>
                                <span class="badge bg-danger">{{ count($data ?? []) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 d-flex justify-content-center">
                        <div class="card">
                            <div class="card-body">
                                <span class="heading"><i class="fas fa-file-alt icon"></i>Academic Record Request</span>
                                <span class="badge bg-danger">{{ count($reqDocument ?? []) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 d-flex justify-content-center">
                        <div class="card">
                            <div class="card-body">
                                <span class="heading"><i class="fas fa-user-graduate icon"></i>Enrollment</span>
                                <span class="badge bg-danger">{{ count($enrollmentData ?? []) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Centered Column for Bar Graph -->
                <div class="col-md-6 offset-md-3 mt-4">
                    <div class="card">
                            <div class="card-header">
                                <b>MTC ENROLLED STUDENTS</b>
                            </div>
                        <div class="card-body">
                            <div style="display: flex; justify-content: center; align-items: center;">
                                <canvas id="barGraph"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <x-footer />
    </x-panel>

    <!-- Include Font Awesome and Chart.js -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <!-- JavaScript to create and populate the bar graph -->
    <script>
        var Grade11 = @json($G11);
        console.log(Grade11);
        3
        const acronym = Grade11.map(item => item.acronym);
        const studentCount = Grade11.map(item => item.studentsCount);
        var Grade12 = @json($G12);
        
        // const acronym1 = Grade12.map(item => item.acronym);
        const studentCount1 = Grade12.map(item => item.studentsCount);
        console.log(studentCount1);
        var ctx = document.getElementById('barGraph').getContext('2d');
        var data = {
            labels: acronym, 
            datasets: [
                {
                    label: 'Grade 11',
                    data: studentCount, 
                    backgroundColor: [
                        'rgba(92, 44, 120, 0.2)', 
                        
                    ],
                    borderColor: [
                        'rgba(92, 44, 120, 1)', 
                       
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Grade 12',
                    data: studentCount1, 
                    backgroundColor: [
                        'rgba(241, 204, 74, 0.2)', 
                       
                    ],
                    borderColor: [
                        'rgba(241, 204, 74, 1)', 
                        
                    ],
                    borderWidth: 1
                }
            ]
        };
        var config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var myChart = new Chart(ctx, config);
    </script>
</script>
@endsection
