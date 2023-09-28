@extends('layouts.dashboard')
@section('content')
    @include('registrar._sidenav')
    <style type="text/css">
        a{
            text-decoration: none;
            color: #fff;
        }
        a:hover{
            color: #fff;
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
                                Admissions
                                 <span class="badge bg-danger">{{ count($data ?? []) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-dark text-white mb-4">
                            <div class="card-body">
                            Academic Record Request
                                <span class="badge bg-danger">{{ count($reqDocument ?? []) }}</span>
                        </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-dark text-white mb-4">
                            <div class="card-body">
                            Enrollment
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
                                <canvas id="barGraph"></canvas>
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
        var ctx = document.getElementById('barGraph').getContext('2d');
        var data = {
            labels: ['GAS', 'ABM', 'HUMSS', 'STEM', 'ICT', 'AD', 'HE'], // Your labels here
            datasets: [
                {
                    label: 'Grade 11',
                    data: [10, 20, 30, 40, 50, 60, 70], // Your Grade 11 data values here
                    backgroundColor: [
                        'rgba(92, 44, 120, 0.2)', // Custom color for Grade 11
                        
                    ],
                    borderColor: [
                        'rgba(92, 44, 120, 1)', // Custom color for Grade 11
                       
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Grade 12',
                    data: [5, 15, 25, 35, 45, 55, 65], // Your Grade 12 data values here
                    backgroundColor: [
                        'rgba(241, 204, 74, 0.2)', // Custom color for Grade 12
                       
                    ],
                    borderColor: [
                        'rgba(241, 204, 74, 1)', // Custom color for Grade 12
                        
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