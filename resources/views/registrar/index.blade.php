@extends('layouts.dashboard')
@section('content')
    @include('registrar._sidenav')
    <style type="text/css">
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
    </style>
    <x-panel>
        <main>
            <div class="container-fluid px-4">
                <ol class="breadcrumb mt-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <h1 class="mt-4"> Dashboard</h1>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-dark text-white mb-4">
                            <div class="card-body">
                                <span class="heading">Admissions</span>
                                <span class="badge bg-danger">{{ count($data ?? []) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-dark text-white mb-4">
                            <div class="card-body">
                                <span class="heading">Academic Record Request</span>
                                <span class="badge bg-danger">{{ count($reqDocument ?? []) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-dark text-white mb-4">
                            <div class="card-body">
                                <span class="heading">Enrollment</span>
                                <span class="badge bg-danger">{{ count($enrollmentData ?? []) }}</span>
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

    <!-- Include Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <!-- JavaScript to create and populate the bar graph -->
    <script>
        var Grade11 = @json($G11);
        console.log(Grade11);
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
