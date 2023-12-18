@extends('layouts.app')
@section('content')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<!-- Masthead -->
<header class="masthead">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">Welcome, Future Mathesians!</h1>
                <hr class="divider" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 mb-5"></p>
                <a class="btn btn-primary btn-xl" href="#admission">Proceed to admission</a>
            </div>
        </div>
    </div>
</header>


<!-- Admission-->
<section class="page-section" id="admission" style="background-color: #ede2c3de; padding: 20px;">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
                <h1><b>Admission</b></h1>
                <p><span style="color: red;">* required fields</span></p>
                <form action="{{ url('admission') }}" method="POST" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="lrn" class="form-label">* LRN</label>
                                <input type="text" class="form-control" name="lrn" id="lrn" placeholder="LRN" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">* First Name</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="middle_name" class="form-label">* Middle Name</label>
                                <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="last_name" class="form-label">* Last Name</label>
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
                                <label for="birthday" class="form-label">* Birthday</label>
                                <input type="date" class="form-control" name="birthday" id="birthday" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="age" class="form-label">* Age</label>
                                <input type="number" class="form-control" name="age" id="age" placeholder="Age" required> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="mobile_number" class="form-label">* Mobile Number</label>
                                <input type="tel" class="form-control" name="mobile_number" id="mobile_number" value="+63" maxlength="13" placeholder="Mobile Number" required>
                            </div> 
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">* Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="facebook_account" class="form-label">* Facebook Account</label>
                                <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Enter your Facebook Link" value="https://web.facebook.com/" required>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="provinces" class="form-label">* Province</label>
                                <select name="provinces" class="form-control" id="provinces">
                                    <option disabled selected>Select Province</option>
                                    @foreach (\App\Models\Province::all() as $provinces)
                                    <option value="{{ $provinces->name }}">{{ $provinces->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="municipalities" class="form-label">* City/Municipality</label>
                                <select name="municipalities" class="form-select form-control" id="municipalities">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="barangay" class="form-label">* Barangay</label>
                                <select name="barangay" class="form-select form-control" id="barangay">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="schoolYearGraduated" class="form-label">* What school year graduated</label>
                                <input type="text" class="form-control" name="year_graduated" id="year_graduated" placeholder="School Year Graduated" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="juniorHighSchool" class="form-label">* Junior High School Attended</label>
                                <input type="text" class="form-control" name="junior_high" id="junior_high" placeholder="Junior High School Attended" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="graduationType" class="form-label">* Are you a:</label>
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
                                <label for="strand" class="form-label">* Preferred Strand</label>
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
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="psa" class="form-label">Photo of PSA/Birth Certificate </label>
                                <input type="file" class="form-control" name="psa" id="psa">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="form138" class="form-label">Photo of Form 138 </label>
                                <input type="file" class="form-control" name="form_138[]" id="form_138" multiple>
                            </div>
                        </div>
                    </div>

                    <div class="row-md-6">
                        <div class="mb-3">
                            <fieldset>
                                <legend>Terms and Agreement for Data Protection</legend>
                            <div class="terms-agreement" style="border: 1px outset black; background: #fff;">
                            <p style="text-indent: 5px;">   1.	I agree to the collection, processing, and storage of my personal data by Mother Theresa Colegio de Iriga, Inc. for the purposes of academic administration, providing educational services, and maintaining student records.<br></p>
                            <p style="text-indent: 5px;">   2.  I understand that the personal data collected may include, but is not limited to, my name, contact information, academic records, and other relevant information necessary for educational purposes.<br></p>
                            <p style="text-indent: 5px;">   3.	I acknowledge that MTC Portal of Mother Theresa Colegio de Iriga, Inc. will implement appropriate technical and organizational measures to ensure the security and confidentiality of my personal data.<br></p>
                            <p style="text-indent: 5px;">   4.	I understand that my personal data will not be disclosed or shared with third parties without my explicit consent, except as required by law.<br></p>
                            <p style="text-indent: 5px;">   5.	I agree to comply with the rules and regulations of MTC Portal regarding the use of its systems and services.
                            </div>
                            </fieldset>
                        </div>
                    </div>                    

                    <div class="row-md-6">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="confirmationCheck" id="confirmationCheck" required>
                            <label class="form-check-label" for="confirmationCheck">I hereby certify that the above information is true and correct to the best of my knowledge.</label>
                        </div>
                    </div>
                    <div class="row-md-6">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="confirmationCheck1" id="confirmationCheck1" required>
                            <label class="form-check-label" for="confirmationCheck"> I agree to the terms and agreement for data protection based on the REPUBLIC ACT 10173 also known as DATA PRIVACY ACT OF 2012.</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form><br><br>
                @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
                @endif

            </div>
        </div>
    </div>
</section>

{{--THIS SCRIPT PREVENTS THE MOBILE NUMBER COUNTRY CODE TO BE ERASED!!--}}
<script>
    // Get the input element
    var mobileNumberInput = document.getElementById("mobile_number");

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
<!-- Include jQuery -->


<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#provinces').on('change', function () {
    var province_id = this.value;
    fetchMunicipalities(province_id);
        });

        $('#municipalities').on('change', function () {
            var municipality_id = this.value;
            fetchBarangays(municipality_id);
        });

        function fetchMunicipalities(province_id) {
            $.ajax({
                url: '/get-municipalities/' + province_id,
                type: 'GET',
                success: function (res) {
                    populateDropdown($('#municipalities'), res, 'Select Municipality');
                    resetDropdown($('#barangay'), 'Select Barangay');
                },
                error: function () {
                    console.error('Failed to fetch municipalities.');
                }
            });
        }

        function fetchBarangays(municipality_id) {
            $.ajax({
                url: '/get-barangays/' + municipality_id,
                type: 'GET',
                success: function (res) {
                    populateDropdown($('#barangay'), res, 'Select Barangay');
                },
                error: function () {
                    console.error('Failed to fetch barangays.');
                }
            });
        }

        function populateDropdown($dropdown, data, defaultOption) {
            $dropdown.html('<option value="">' + defaultOption + '</option>');
            $.each(data, function (key, value) {
                $dropdown.append('<option value="' + value.name + '">' + value.name + '</option>');
            });
        }

        function resetDropdown($dropdown, defaultOption) {
            $dropdown.html('<option value="">' + defaultOption + '</option>');
        }


        function calculateAge() {
        // Get the selected birthday value
        var birthday = document.getElementById('birthday').value;

        // Calculate the age
        var today = new Date();
        var birthDate = new Date(birthday);
        var age = today.getFullYear() - birthDate.getFullYear();

        // Adjust age if birthday hasn't occurred yet this year
        var monthDiff = today.getMonth() - birthDate.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        // Set the calculated age in the age input field
        document.getElementById('age').value = age;
        }

        // Attach the calculateAge function to the change event of the birthday input
        document.getElementById('birthday').addEventListener('change', calculateAge);

    });

    
</script>

@endsection