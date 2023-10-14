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
                                        <option value="">Select a year level</option>
                                        <!-- Add your year options here -->
                                        <option value="2023">Grade 11</option>
                                        <option value="2024">Grade 12</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="strand"><b>Strand</b></label>
                                    <select name="strand" id="strand" class="form-control">
                                        <option value="">Select a Strand</option>
                                        <!-- Add your strand options here -->
                                        <option value="strand1">Accountancy, Business, and Management</option>
                                        <option value="strand2">Arts and Design</option>
                                        <option value="strand3">General Academic Strand</option>
                                        <option value="strand4">Home Economics</option>
                                        <option value="strand5">Humanities and Social Sciences</option>
                                        <option value="strand6">Information and Communication Technology</option>
                                        <option value="strand7">Science, Technology, Engineering, and Mathematics</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="section"><b>Section</b></label>
                                    <select name="section" id="section" class="form-control">
                                        <option value="">Select a Section</option>
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
