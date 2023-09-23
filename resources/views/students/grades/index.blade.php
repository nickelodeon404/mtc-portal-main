@extends('layouts.dashboard')

@section('content')
    @include('students._sidenav')
    <x-panel>
        <main>
            <div class="container-fluid px-4">
                <ol class="breadcrumb mt-4">
                    <li class="breadcrumb-item active">Grades</li>
                </ol>
                <h1>Grades</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Subject Name</th>
                            <th>Quarter</th>
                            <th>Grade</th>
                            {{-- <th>Average</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grades as $grade)
                        <tr>
                            @php
                                // echo $ave;
                                    $ave = ($ave + $grade->grade) ;
                                @endphp
                            <td>{{$grade->name}}</td>
                            <td>{{$grade->quarter}}</td>
                            <td>{{$grade->grade}}</td>
                            {{-- <td>
                                
                            </td> --}}
                        </tr>
                        @endforeach
                        <tr>
                            <td>Total Average: </td>
                            <td></td>
                            <td>
                                {{ $ave / count($grades)}}
                                {{-- @php
                                // echo $ave;
                                    $ave = ($ave + $grade->grade) ;
                                    if ($loop->index == count($grades)-1) {
                                        echo $ave / count($grades);
                                    }
                                @endphp --}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
        <x-footer />
    </x-panel>
@endsection
