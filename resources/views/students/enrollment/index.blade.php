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
                <h1 class="mt-4">Enrollment Form</h1>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <p><span style="color: red;">* required fields</span></p>
                <div class="container">
                    <form action="{{ url('enrollment') }}" method="POST">
                        {!! csrf_field() !!}
                        <div class="mb-3">
                            <label for="lrnInput" class="form-label"><b>LRN (Learner Reference Number)</b></label>
                            <input type="text" class="form-control" id="lrn" name="lrn" placeholder="Enter LRN" value="{{$admitted->lrn}}" style="background-color: #CDCDCD;" style="background-color: #CDCDCD;" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="firstNameInput" class="form-label"><b>First Name</b></label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{$admitted->first_name}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="middleNameInput" class="form-label"><b>Middle Name</b></label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter Middle Name" value="{{$admitted->middle_name}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="lastNameInput" class="form-label"><b>Last Name</b></label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{$admitted->last_name}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="extensionInput" class="form-label"><b>Extension Name</b></label>
                            <input type="text" class="form-control" id="extension" name="extension" placeholder="Enter Extension Name" value="{{$admitted->extension}}" style="background-color: #CDCDCD;" readonly>
                        </div>
                            <div class="col-md-6 mb-3">
                                <label for="birthdayInput" class="form-label"><b>Birthday</b></label>
                                <input type="date" class="form-control" id="birthday" name="birthday" value="{{$admitted->birthday}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="ageInput" class="form-label"><b>Age</b></label>
                                <input type="number" class="form-control" id="age" name="age" placeholder="Enter Age" value="{{$admitted->age}}" style="background-color: #CDCDCD;" readonly>
                            </div> 
                            <div class="col-md-6 mb-3">
                                <label for="mobileInput" class="form-label"><b>Mobile Number</b></label>
                                <input type="tel" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number" value="{{$admitted->mobile_number}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="emailInput" class="form-label"><b>Email Address</b></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" value="{{$admitted->email}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="facebookInput" class="form-label"><b>Facebook Account</b></label>
                                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter Facebook Account" value="{{$admitted->facebook}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="regionInput" class="form-label"> <b> <span style="color: red;">*</span></b> <b>Region</b></label>
                                <input type="text" class="form-control" id="region" name="region" placeholder="Enter Region" value="{{$admitted->region}}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="provinceInput" class="form-label"><b>Province</b></label>
                                <input type="text" class="form-control" id="provinces" name="provinces" placeholder="Enter Province" value="{{$admitted->provinces}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="barangayInput" class="form-label"><b>Barangay</b></label>
                                <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Enter Barangay" value="{{$admitted->barangay}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cityInput" class="form-label"><b>City/Municipality</b></label>
                                <input type="text" class="form-control" id="municipalities" name="municipalities" placeholder="Enter City/Municipality" value="{{$admitted->municipalities}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6 mb-3">
                                <label for="statusSelect" class="form-label"><b> <span style="color: red;">*</span></b><b>Status</b></label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="" selected>Select One</option>
                                    <option>New Student</option>
                                    <option>Transfer Student</option>
                                    <option>Returning Student</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="gradeSelect" class="form-label"><b> <span style="color: red;">*</span></b><b>Grade Level to Enroll</b></label>
                                <select class="form-select" id="grade_level" name="grade_level" required>
                                    <option value="" selected>Select One</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <!-- Add more grade levels as needed -->
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="mb-3">
                                <label for="strand" class="form-label"></label><b>Preferred Strand</b></label>
                                <select class="form-select" name="strand" id="strand" style="background-color: #CDCDCD;" readonly>
                                    <!-- <option disabled selected>Select an option</option> -->
                                    @foreach (\App\Models\Admitted::all() as $strand) 
                                    <option value="{{ $strand->strand }}" {{ $strand->strand == $strand->strand ? "selected" : "" }}>{{ $strand->strand }}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lastSchool" class="form-label"><b>Last School Attended</b></label>
                                <input type="text" class="form-control" id="junior_high" name="junior_high"
                                        placeholder="Last School Attended" value="{{$admitted->junior_high}}" style="background-color: #CDCDCD;" readonly>
                            </div>
                            </div>
                        </div>
                        <div class="row">    
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label for="graduationType" class="form-label"><b> <span style="color: red;">*</span></b><b>Are you a:</b></label>
                            <select class="form-select" id="graduation_type" name="graduation_type" required>
                                <option value="" selected>Select an option</option>
                                <option value="Public Completer" {{$admitted->graduation_type == "Public Completer" ? "selected" : ""}}>Public Completer</option>
                                <option value="Private Completer" {{$admitted->graduation_type == "Private Completer" ? "selected" : ""}}>Private Completer</option>
                                <option value="ALS Graduate" {{$admitted->graduation_type == "ALS Graduate" ? "selected" : ""}}>ALS Graduate</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                                <label for="mobileInput1" class="form-label"><b>Mobile No. In case of emergency</b></label>
                                <input type="tel" class="form-control" id="emergency_number" name="emergency_number" placeholder="Enter Mobile Number" value="+63" maxlength="13" required>
                            </div>
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </main>
        <x-footer />
    </x-panel>

    {{--THIS SCRIPT PREVENTS THE MOBILE NUMBER COUNTRY CODE TO BE ERASED!!--}}
<script>
    // Get the input element
    var mobileNumberInput = document.getElementById("emergency_number");

    // Store the initial value
    var initialValue = "+63";

    // Listen for the input event
    mobileNumberInput.addEventListener("input", function () {
        // Check if the input value starts with "+63"
        if (!mobileNumberInput.value.startsWith(initialValue)) {
            // If not, prepend "+63" to the input value
            mobileNumberInput.value = initialValue + mobileNumberInput.value;
        }
    });

    // Listen for the keydown event to handle backspace
    mobileNumberInput.addEventListener("keydown", function (event) {
        if (event.key === "Backspace" && mobileNumberInput.selectionStart <= initialValue.length) {
            // Prevent backspace when the cursor is at or before "+63"
            event.preventDefault();
        }
    });
</script>
    
@endsection