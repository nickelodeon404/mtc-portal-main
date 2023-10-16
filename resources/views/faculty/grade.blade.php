@extends('layouts.dashboard')

@section('content')
    @include('faculty._sidenav')
    <x-panel>
        <main>
            <x-flash-message></x-flash-message>
            <div class="container-fluid px-4 mt-4">
                <h1>Grading Sheet in {{ $actSubject->name }}</h1>
                <div class="create-card mt-5">
                    <div class="card-body">
                        {{-- <form action="{{ url('grade') }}" method="post"> --}}
                        {{-- {!! csrf_field() !!} --}}
                        <form action="{{ route('faculty.grade.subject', ['subject' => $actSubject->id]) }}">
                            <div class="row mb-3">

                                <div class="col-md-3">
                                    <label for="year" class="form-label"><b>Year</b></label>
                                    <select name="year" id="year" class="form-control">
                                        <option value="" selected>All</option>
                                        <!-- Add your year options here -->
                                        <option value="11" {{ request('year') == 11 ? 'selected' : '' }}>Grade 11
                                        </option>
                                        <option value="12" {{ request('year') == 12 ? 'selected' : '' }}>Grade 12
                                        </option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="strand" class="form-label">* Preferred Strand</label>
                                    <select class="form-select" name="strand" id="strand">
                                        <option value="" selected>All</option>
                                        @foreach (\App\Models\Strand::all() as $strand)
                                            <option value="{{ $strand->id }}"
                                                {{ request('strand') == $strand->id ? 'selected' : '' }}>{{ $strand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="section" class="form-label"><b>Section</b></label>
                                    <select name="section" id="section" class="form-control">
                                        <option value="" selected>All</option>
                                        <!-- Add your section options here -->
                                        <option value="sectionA">A</option>
                                        <option value="sectionB">B</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <!-- Add some margin and padding to align the button with the dropdown -->
                                    <div style="margin-top: 20px;">
                                        <button type="submit" class="btn btn-primary btn-block mt-2"> <i
                                                class="fa-solid fa-filter"></i> Filter Students</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <form action="{{route('faculty.grade.post')}}" method="POST">
                            @csrf
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>LRN or Student ID</th>
                                        <th>Name</th>
                                        <th>Strand</th>
                                        <th>Year</th>
                                        <th>Section</th>

                                        <th>Final Grade</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>
                                                <input type="hidden" name="subjectLoads_id[]" value="{{$student->subjectLoad}}">
                                                <input type="text" name="student_id[]" class="form-control" disabled
                                                    readonly  value="{{ $student->id }}" </td>
                                            <td>
                                                <input type="text" name="name[]" class="form-control" disabled
                                                    value="{{ $student->name }}" readonly >
                                            </td>
                                            <td>
                                                <input type="text" name="strand[]" class="form-control" disabled
                                                    value="{{ $student->strand }}" readonly >
                                            </td>
                                            <td>
                                                <input type="text" name="year[]" class="form-control" disabled
                                                    value="{{ $student->year_level }}" readonly > 
                                            </td>
                                            <td>
                                                <input type="text" name="section[]" class="form-control" disabled
                                                    value="{{ $student->section ?? 'Unknown' }}" readonly >
                                            </td>
                                            <td>
                                                <input type="number" name="final_grade[]" onchange="updateRemarks(this)"
                                                    class="form-control" value="{{
                                                    old('final_grade')[$loop->index] ?? \App\Models\Grade::where('subjectLoads_id', $student->subjectLoad)->first()->grade ?? ""}}"
                                                     required   >
                                            </td>
                                            <td>
                                                <input type="text" name="remarks[]" class="form-control" readonly >
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="d-flex align-items-center justify-content-end">
                                <div class="">
                                    
                                    <a href="{{ url('/grade') }}" style="text-decoration: none;">
                                        <button type="button" class="btn btn-danger"
                                            style="margin-left: 20px;">Cancel</button>
                                    </a>
                                    <button type="submit" class="btn btn-primary">Post</button>
                                </div>
                            </div>
                        </form>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </main>
        <x-footer />
    </x-panel>

    <style>
        /* Set background color for the entire page */
        body {
            background-color: #f0f0f0;
            /* Adjust the color as needed */
        }
    </style>
    <script>
        function updateRemarks(final_grade) {
            console.log(final_grade.nextSibling;);
        }
    </script>
@endsection
