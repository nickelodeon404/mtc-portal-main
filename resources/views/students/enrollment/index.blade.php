@extends('layouts.dashboard')

@section('content')
    @include('students._sidenav')
    <style> 
        .container-fluid {
                background-color: #fef6ff; /* Adjust the color as needed */
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
                <h1 class="mt-4">Enrollment Form</h1>
                <p><span style="color: red;">* required fields</span></p>
                <div class="container">
                    <form action="{{ url('enrollment') }}" method="POST">
                        {!! csrf_field() !!}
                        <div class="mb-3">
                            <label for="lrnInput" class="form-label">LRN (Learner Reference Number)</label>
                            <input type="text" class="form-control" id="lrn" name="lrn" placeholder="Enter LRN" value="{{$admission->lrn}}" style="background-color: #CDCDCD;" style="background-color: #CDCDCD;" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="firstNameInput" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{$admission->first_name}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="middleNameInput" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter Middle Name" value="{{$admission->middle_name}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="lastNameInput" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{$admission->last_name}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="extensionInput" class="form-label">Extension Name</label>
                            <input type="text" class="form-control" id="extension" name="extension" placeholder="Enter Extension Name" value="{{$admission->extension}}" style="background-color: #CDCDCD;" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="birthdayInput" class="form-label">Birthday</label>
                                <input type="date" class="form-control" id="birthday" name="birthday" value="{{$admission->birthday}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ageInput" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" name="age" placeholder="Enter Age" value="{{$admission->age}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="mobileInput" class="form-label">Mobile Number</label>
                                <input type="tel" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number" value="{{$admission->mobile_number}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="emailInput" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" value="{{$admission->email}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="facebookInput" class="form-label">Facebook Account</label>
                                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter Facebook Account" value="{{$admission->facebook}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="regionInput" class="form-label"> <b> <span style="color: red;">*</span></b> Region</label>
                                <input type="text" class="form-control" id="region" name="region" placeholder="Enter Region" value="{{$admission->region}}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="provinceInput" class="form-label">Province</label>
                                <input type="text" class="form-control" id="province" name="province" placeholder="Enter Province" value="{{$admission->province}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="barangayInput" class="form-label">Barangay</label>
                                <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Enter Barangay" value="{{$admission->barangay}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cityInput" class="form-label">City/Municipality</label>
                                <input type="text" class="form-control" id="city_municipality" name="city_municipality" placeholder="Enter City/Municipality" value="{{$admission->city_municipality}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="statusSelect" class="form-label"><b> <span style="color: red;">*</span></b>Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="" selected>Select One</option>
                                    <option>New Student</option>
                                    <option>Transfer Student</option>
                                    <option>Returning Student</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="gradeSelect" class="form-label"><b> <span style="color: red;">*</span></b>Grade Level to Enroll</label>
                                <select class="form-select" id="grade_level" name="grade_level" required>
                                    <option value="" selected>Select One</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <!-- Add more grade levels as needed -->
                                </select>
                            </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="strand" class="form-label"></label> Preferred Strand</label>
                                <select class="form-select" name="strand" id="strand" required>
                                    <option disabled selected>Select an option</option>
                                    @foreach (\App\Models\Strand::all() as $strand) 
                                    <option value="{{ $strand->acronym }}">{{ $strand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lastSchool" class="form-label">Last School Attended</label>
                                <input type="text" class="form-control" id="junior_high" name="junior_high"
                                        placeholder="Last School Attended" value="{{$admission->junior_high}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label for="graduationType" class="form-label"><b> <span style="color: red;">*</span></b>Are you a:</label>
                            <select class="form-select" id="graduation_type" name="graduation_type" required>
                                <option value="" selected>Select an option</option>
                                <option value="Public Completer" {{$admission->graduation_type == "Public Completer" ? "selected" : ""}}>Public Completer</option>
                                <option value="Private Completer" {{$admission->graduation_type == "Private Completer" ? "selected" : ""}}>Private Completer</option>
                                <option value="ALS Graduate" {{$admission->graduation_type == "ALS Graduate" ? "selected" : ""}}>ALS Graduate</option>
                            </select>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </main>
        <x-footer />
    </x-panel>

    
@endsection