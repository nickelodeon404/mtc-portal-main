@extends('layouts.dashboard')

@section('content')
    @include('faculty._sidenav')
    <x-panel>
        <main>
            <div class="container-fluid px-4 mt-4">
                <h1>Grading Sheet</h1>
                <div class="create-card mt-5">
                    <div class="card-body">
                        <form action="{{ url('grade') }}" method="post">
                            {!! csrf_field() !!}
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="year"><b>Year</b></label>
                                    <select name="year" id="year" class="form-control">
                                        <option disabled selected>Select a year level</option>
                                        <!-- Add your year options here -->
                                        <option value="2023">Grade 11</option>
                                        <option value="2024">Grade 12</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="col-md-3">
                                <label for="strand" class="form-label">* Preferred Strand</label>
                                    <select class="form-select" name="strand" id="strand" required>
                                        <option disabled selected>Select a Strand</option>
                                            @foreach (\App\Models\Strand::all() as $strand) 
                                                <option value="{{ $strand->acronym }}">{{ $strand->name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="section"><b>Section</b></label>
                                    <select name="section" id="section" class="form-control">
                                        <option selected disabled>Select a Section</option>
                                        <!-- Add your section options here -->
                                        <option value="sectionA">A</option>
                                        <option value="sectionB">B</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <!-- Add some margin and padding to align the button with the dropdown -->
                                    <div style="margin-top: 20px;">
                                        <button type="button" class="btn btn-primary btn-block">Okay</button>
                                    </div>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>LRN or Student ID</th>
                                        <th>Name</th>
                                        <th>Final Grade</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" name="lrn_or_student_id" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="name" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="final_grade" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" name="remarks" class="form-control">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Post</button>
                                    <a href="{{ url('/grade') }}" style="text-decoration: none;">
                                        <button type="button" class="btn btn-danger" style="margin-left: 20px;">Cancel</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <x-footer />
    </x-panel>

    <style> 
    /* Set background color for the entire page */
    body {
        background-color: #f0f0f0; /* Adjust the color as needed */
    }
    </style>
@endsection
