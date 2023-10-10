@extends('layouts.dashboard')

@section('content')
@include('faculty._sidenav')
<x-panel>
    <main>
        <div class="container-fluid px-4">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item active">Grades</li>
            </ol>
            <h1>Grades</h1>
            <div class="create-card mt-5">
                <div class="card-body">
                    <form action="{{ url('grade') }}" method="post">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="strand">Strand</label>
                                    <select name="strand" id="strand" class="form-control">
                                        <!-- Add your strand options here -->
                                        <option value="strand1">Strand 1</option>
                                        <option value="strand2">Strand 2</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="grade_level">Grade Level</label>
                                    <select name="grade_level" id="grade_level" class="form-control">
                                        <!-- Add your grade level options here -->
                                        <option value="grade_level1">Grade Level 1</option>
                                        <option value="grade_level2">Grade Level 2</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="student">Student</label>
                                    <select name="student" id="student" class="form-control">
                                        <!-- Add your student options here -->
                                        <option value="student1">Student 1</option>
                                        <option value="student2">Student 2</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label for="sub1">Subject 1</label>
                                    <input type="text" name="sub1" id="sub1" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label for="sub2">Subject 2</label>
                                    <input type="text" name="sub2" id="sub2" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label for="sub3">Subject 3</label>
                                    <input type="text" name="sub3" id="sub3" class="form-control">
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary" style="position: relative;">
                    </form>
                    <a href="{{ url('/grade') }}" style="text-decoration: none;">
                        <input type="submit" value="Cancel" class="btn btn-danger"
                               style="position: relative; margin-left: 90px; margin-top: -66px; ">
                    </a><br>
                </div>
            </div>
        </div>
    </main>
    <x-footer />
</x-panel>
@endsection
