@extends('layouts.dashboard')
@section('content')
    @include('registrar._sidenav')
    <style type="text/css">
        
         /* Set background color for the entire page */
         body {
            background-color: #f0f0f0; /* Adjust the color as needed */
        }
        a {
            text-decoration: none;
            color: #fff;
        }

        a:hover {
            color: #fff;
        }

        /* CSS to make headings bigger */
        .heading {
            font-size: 20px;
        }

        /* Icon Styles */
        .icon {
            margin-right: 10px;
        }

         /* Improve overall layout and spacing */
        .container {
            padding: 20px;
        }

        /* Style for breadcrumbs */
        .breadcrumb {
            background-color: #f0f0f0;
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
            background-color: 5c2c78; /* Card background color */
            border: none;
            box-shadow: 0 4px 8px rgba(138, 2, 153, 0.313);
            border-radius: 5px;
            padding: 5px;
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
        .center-card {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80%;
        }
        
    </style>
    <x-panel>
        <main>
            <div class="container-fluid px-4">
            @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                <ol class="breadcrumb mt-4">
                    <li class="breadcrumb-item active"><b>Mother Theresa Colegio de Iriga</b></li>
                </ol>
                <h1 class="mt-4"> Dashboard</h1>
                <div class="row">
                    <!-- Centered Admissions Card -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-dark text-white mb-4 center-card">
                            <div class="card-body text-center">
                                <span class="heading"><i class="fas fa-graduation-cap icon"></i>Admissions</span>
                                <span class="badge bg-danger">{{ count($data ?? []) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Centered Enrollment Card -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-dark text-white mb-4 center-card">
                            <div class="card-body text-center">
                                <span class="heading"><i class="fas fa-user-graduate icon"></i>Enrollment</span>
                                <span class="badge bg-danger">{{ count($enrollmentData ?? []) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Centered Academic Record Request Card -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-dark text-white mb-4 center-card">
                            <div class="card-body text-center">
                                <span class="heading"><i class="fas fa-file-alt icon"></i>Academic Record Request</span>
                                <span class="badge bg-danger">{{ count($reqDocument ?? []) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Centered Column for Bar Graph -->
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <b>MTC ENROLLED STUDENTS</b>
                        </div>
                        <div class="card-body">
                            <!-- Center and size the chart -->
                            <div style="display: flex; justify-content: center; align-items: center; height: 60vh;">
                                <canvas id="barGraph" style="max-width: 800px; width: 100%;"></canvas>
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
        
        const acronym = Grade11.map(item => item.acronym);
        const studentCount = Grade11.map(item => item.users_count);
        // const studentCount = Grade11.length;
        console.log(studentCount);
        var Grade12 = @json($G12);
        
        // const acronym1 = Grade12.map(item => item.acronym);
        const studentCount1 = Grade12.map(item => item.users_count);
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