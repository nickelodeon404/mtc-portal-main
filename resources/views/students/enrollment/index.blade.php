@extends('layouts.dashboard')

@section('content')
    @include('students._sidenav')
    <x-panel>
        <main>
            <div class="container-fluid px-4">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                <h1 class="mt-4">Enrollment Form</h1>
                <div class="container">
                    <form action="{{ url('enrollment') }}" method="POST">
                        {!! csrf_field() !!}
                        <div class="mb-3">
                            <label for="lrnInput" class="form-label">LRN (Learner Reference Number)</label>
                            <input type="text" class="form-control" id="lrn" name="lrn" placeholder="Enter LRN" value="{{$admission->lrn}}" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="firstNameInput" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{$admission->first_name}}" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="middleNameInput" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter Middle Name" value="{{$admission->middle_name}}" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="lastNameInput" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{$admission->last_name}}" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="extensionInput" class="form-label">Extension Name</label>
                            <input type="text" class="form-control" id="extension" name="extension" placeholder="Enter Extension Name" value="{{$admission->extension}}" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="birthdayInput" class="form-label">Birthday</label>
                                <input type="date" class="form-control" id="birthday" name="birthday" value="{{$admission->birthday}}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ageInput" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" name="age" placeholder="Enter Age" value="{{$admission->age}}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="mobileInput" class="form-label">Mobile Number</label>
                                <input type="number" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number" value="{{$admission->mobile_number}}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="emailInput" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" value="{{$admission->email}}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="facebookInput" class="form-label">Facebook Account</label>
                                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter Facebook Account" value="{{$admission->facebook}}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="regionInput" class="form-label">Region</label>
                                <input type="text" class="form-control" id="region" name="region" placeholder="Enter Region" value="{{$admission->region}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="provinceInput" class="form-label">Province</label>
                                <input type="text" class="form-control" id="province" name="province" placeholder="Enter Province" value="{{$admission->province}}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="barangayInput" class="form-label">Barangay</label>
                                <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Enter Barangay" value="{{$admission->barangay}}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cityInput" class="form-label">City/Municipality</label>
                                <input type="text" class="form-control" id="city_municipality" name="city_municipality" placeholder="Enter City/Municipality" value="{{$admission->city_municipality}}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="statusSelect" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option >Select One</option>
                                    <option>New Student</option>
                                    <option>Transfer Student</option>
                                    <option>Returning Student</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="gradeSelect" class="form-label">Grade Level to Enroll</label>
                                <select class="form-select" id="grade_level" name="grade_level">
                                    <option disabled selected>Select One</option>
                                    <option>Grade 11</option>
                                    <option>Grade 12</option>
                                    <!-- Add more grade levels as needed -->
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="lastSchool" class="form-label">Last School Attended</label>
                                    <input type="text" class="form-control" id="junior_high" name="junior_high"
                                        placeholder="Last School Attended" value="{{$admission->junior_high}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="graduationType" class="form-label">Are you a:</label>
                                <select class="form-select" id="graduation_type" name="graduation_type" readonly>
                                    <option disabled selected>Select an option</option>
                                    <option value="Public Completer" {{$admission->graduation_type == "Public Completer" ? "selected" : ""}}>Public Completer</option>
                                    <option value="Private Completer" {{$admission->lrn == "Private Completer" ? "selected" : ""}}>Private Completer</option>
                                    <option value="ALS Graduate" {{$admission->lrn == "ALS Graduate" ? "selected" : ""}}>ALS Graduate</option>
                                </select>
                            </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </main>
        <x-footer />
    </x-panel>
@endsection