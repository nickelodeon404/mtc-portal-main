<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* CSS for hover effect on navigation links */
        .nav-link:hover {
            background-color: #333; /* Change the background color on hover */
            color: #fff; /* Change the text color on hover */
            transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
        }
    </style>
</head>
<body>
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <x-logo />
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="/registrar">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                    <a class="nav-link" href="{{ url('/view-table') }}">
                        <i class="fas fa-user-graduate"></i> Admissions
                    </a>
<<<<<<< Updated upstream
                    <!-- <a class="nav-link" href="{{ url('/admitted_table-table') }}">
                        <i class="fas fa-user-graduate"></i> Admitted
                    </a> -->
=======
                    {{--<!-- <a class="nav-link" href="{{ url('/admitted_table-table') }}">
                        <i class="fas fa-user-graduate"></i> Admitted
                    </a> -->--}}
>>>>>>> Stashed changes
                    <a class="nav-link" href="{{ url('/enrollment_table-table') }}">
                        <i class="fas fa-graduation-cap"></i> Enrollment
                    </a>
                    <a class="nav-link" href="{{ url('/enrolled_table-table') }}">
                        <i class="fas fa-check-circle"></i> Enrolled
                    </a>
                    <a class="nav-link" href="{{ url('/academic_record_request_table-table') }}">
                        <i class="fas fa-file-alt"></i> Academic Record Request
                    </a>
                    <a class="nav-link" href="{{ url('/manage-table') }}">
                        <i class="fas fa-user-cog"></i> Manage Account
                    </a>
                    <a class="nav-link" href="{{ url('/activity_log') }}">
                        <i class="fas fa-user-cog"></i> User Activity Log
                    </a>
                    <!-- Modal Button -->
                    <a href="#" type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalUpdateInfoRegistrar">
                        Update Information
                    </a>    
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ Auth::user()->name }}
            </div>
        </nav>
    </div>

    {{--MODAL--}}
 @foreach (\App\Models\User::where('role_id', 2)->get() as $item) <!-- MANUAL CALLING FROM DIRECTORY IS BETTER -->
    <div class="modal fade" id="modalUpdateInfoRegistrar">
        <div class="modal-dialog custom-wide-modal">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Information</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                <form action="{{ url('users/' . $item->id) }}" method="post">
                     @csrf 
                     @method('PATCH') 
                               <table class="table table-wider">
                               <thead>
                                   <tr>
                                       <td>
                                           <strong>Name:</strong> 
                                           <div class="col-md-15 mb-3"> 
                                               {{ auth()->user()->name }}
                                           </div> 
                                       </td>
                                   </tr>
                                       <td>
                                           <strong>Mobile No:</strong> 
                                           <div class="col-md-15 mb-3"> 
                                               <input type="tel" class="form-control" id="mobile_number" name="mobile_number" maxlength="13" placeholder="Enter Mobile Number" value="{{ auth()->user()->mobile_number}}" required> 
                                           </div>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>
                                           <strong>Email Address:</strong> 
                                           <div class="col-md-15 mb-3"> 
                                               <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Enter Email Address" value="{{ auth()->user()->emailaddress}}" required> 
                                           </div>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>
                                           <strong>Address:</strong> 
                                           <div class="col-md-15 mb-3"> 
                                               <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{ auth()->user()->address}}" required> 
                                           </div>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>
                                           <button type="submit" class="btn btn-success" style="position: relative; onclick="return confirm('Confirm and update information?')">
                                                   <i class="fa fa-check" aria-hidden="true"></i> Update
                                               </button>
                                           </a>
                                       </td>
                                   </tr>
                                  
                               </thead>
                           </table>
                       </form>
                   </div>
               </div>
           </div>
       </div>
       @endforeach
{{--END--}}

</body>
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
</body>
</html>
