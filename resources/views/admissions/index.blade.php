@extends('layouts.app')
@section('content')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Hello world</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">!</p>
                    <a class="btn btn-primary btn-xl" href="#about">Find Out More</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section" id="admission">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h2>Admission</h2>
                    <form action="{{ url('admission') }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-15">
                                <div class="mb-3">
                                    <label for="lrn" class="form-label">LRN</label>
                                    <input type="text" class="form-control" name="lrn" id="lrn" placeholder="LRN" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="middle_name" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="extension" class="form-label">Extension Name</label>
                                    <input type="text" class="form-control" name="extension" id="extension" placeholder="Extension Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="birthday" class="form-label">Birthday</label>
                                    <input type="date" class="form-control" name="birthday" id="birthday" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" class="form-control" name="age" id="age" placeholder="Age" required> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mobile_number" class="form-label">Mobile Number</label>
                                    <input type="number" class="form-control" name="mobile_number" id="mobile_number"
                                        placeholder="Mobile Number" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="facebook_account" class="form-label">Facebook Account</label>
                                    <input type="text" class="form-control" name="facebook" id="facebook"
                                        placeholder="Facebook Account">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="barangay" class="form-label">Barangay</label>
                                    <input type="text" class="form-control" name="barangay" id="barangay" placeholder="Barangay" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="city_municipality" class="form-label">City/Municipality</label>
                                    <input type="text" class="form-control" name="city_municipality" id="city_municipality"
                                        placeholder="City/Municipality" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="province" class="form-label">Province</label>
                                    <input type="text" class="form-control" name="province" id="province" placeholder="Province" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="schoolYearGraduated" class="form-label">What school year graduated</label>
                                    <input type="text" class="form-control" name="year_graduated" id="year_graduated"
                                        placeholder="School Year Graduated" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="juniorHighSchool" class="form-label">Junior High School Attended</label>
                                    <input type="text" class="form-control" name="junior_high" id="junior_high"
                                        placeholder="Junior High School Attended" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="graduationType" class="form-label">Are you a:</label>
                                    <select class="form-select" name="graduation_type" id="graduation_type" required>
                                        <option disabled selected>Select an option</option>
                                        <option value="Public Completer">Public Completer</option>
                                        <option value="Private Completer">Private Completer</option>
                                        <option value="ALS Graduate">ALS Graduate</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="strand" class="form-label">Preferred Strand</label>
                                    <select class="form-select" name="strand" id="strand" required>
                                        <option disabled selected>Select an option></option>
                                            @foreach (\App\Models\Strand::all() as $strand) 
                                        <option value="{{ $strand->acronym }}">{{ $strand->name }}</option>
                                             @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-15">
                                <div class="mb-3">
                                    <label for="psaCertificate" class="form-label">Photo of PSA/Birth Certificate</label>
                                    <input type="file" class="form-control" name="psa" id="psa">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-15">
                                <div class="mb-3">
                                    <label for="form138" class="form-label">Photo of Form 138</label>
                                    <input type="file" class="form-control" name="form_138" id="form_138">
                                </div>
                            </div>
                    {{--
                        <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="otp" class="form-label">OTP</label>
                                <input type="text" class="form-control" name="otp" id="otp" placeholder="Enter OTP" required>
                            </div>
                        </div>
                                <button type="button" id="send-otp-button">Send OTP</button>
                        </div>
                    --}}

                            <div class="row-md-6">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="confirmationCheck" id="confirmationCheck" required>
                                    <label class="form-check-label" for="confirmationCheck">I confirm that the documents
                                        are correctly submitted.</label>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" id="send-otp">Submit</button>
                    </form>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif


                    

                </div>
            </div>
        </div>
    </section>
{{--
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('send-otp-button').addEventListener('click', function () {
            // Get the mobile number from the form
            var mobileNumber = document.getElementById('mobile_number').value;

            // Send an AJAX request to the sendOTP route
            axios.post('/sendOTP', {
                mobile_number: mobileNumber
            })
            .then(function (response) {
                // Handle success, e.g., display a message to the user
                alert(response.data.message);
            })
            .catch(function (error) {
                // Handle error, e.g., display an error message
                alert(error.response.data.message);
            });
        });
    });
</script>
--}}
@endsection
