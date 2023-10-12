@extends('layouts.dashboard')

@section('content')
    @include('students._sidenav')
    <x-panel>
        <main>
            <div class="container-fluid px-4 mt-4">
                <h1 class="mb-4">Grades</h1>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Subject Name</th>
                                <th>Quarter</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalAverage = 0;
                            @endphp
                            @foreach ($grades as $grade)
                                <tr>
                                    <td>{{$grade->name}}</td>
                                    <td>{{$grade->quarter}}</td>
                                    <td>{{$grade->grade}}</td>
                                </tr>
                                @php
                                    $totalAverage += $grade->grade;
                                @endphp
                            @endforeach
                            <tr>
                                <td><strong>Total Average:</strong></td>
                                <td></td>
                                <td><strong>{{ number_format($totalAverage / count($grades), 2) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <x-footer />
    </x-panel>

    <style> 
        body {
                 background-color: #fef6ff; /* Adjust the color as needed */
                 }
                 
        </style>
        
@endsection
