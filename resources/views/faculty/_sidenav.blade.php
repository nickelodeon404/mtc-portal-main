<head>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <x-logo />
        <div class="sb-sidenav-menu" style="overflow-y: hidden;">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="/faculty">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="gradesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-book"></i> Grades
                        </a>
                        <div class="dropdown-menu" aria-labelledby="gradesDropdown" style="position: absolute; z-index: 1000;">
                            @foreach ($subjects as $subject)
                                <a class="dropdown-item" href="{{route('faculty.grade.subject', ['subject' => $subject->subjects_id]) }}">{{$subject->subject->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <!-- Modal Button -->
                    <a href="#" type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalUpdateInfoStudent">
                        Update Information
                    </a>
                </li>
            </ul>
        </div>
            <!-- <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="update_faculty">
                        <i class="fas fa-user-cog"></i> Update Faculty Information
                    </a>
                </li>
            </ul> -->
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <span class="user-name">{{ Auth::user()->name }}</span>
        </div>
    </nav>
</div>
{{--MODAL--}}
@foreach (\App\Models\User::where('role_id', 1)->get() as $item) <!-- MANUAL CALLING FROM DIRECTORY IS BETTER -->
    <div class="modal fade" id="modalUpdateInfoStudent">
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
                                               <input type="tel" class="form-control" id="mobile_number" name="mobile_number" maxlength="13" placeholder="Enter Mobile Number" value="{{ auth()->user()->mobile_number }}" required> 
                                           </div>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>
                                           <strong>Email Address:</strong> 
                                           <div class="col-md-15 mb-3"> 
                                               <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Enter Email Address" value="{{ auth()->user()->emailaddress }}" required> 
                                           </div>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>
                                           <strong>Address:</strong> 
                                           <div class="col-md-15 mb-3"> 
                                               <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{ auth()->user()->address }}" required> 
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

<style>
    /* CSS for navigation enhancements */
    .nav-item a.nav-link {
        color: #fff;
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        font-weight: 500;
        transition: background-color 0.3s, color 0.3s;
        text-decoration: none; /* Added to remove underline from links */
    }

    .nav-item a.nav-link:hover {
        background-color: #333;
        color: #fff;
    }

    .nav-item {
        margin-bottom: 10px;
    }

    .sb-sidenav-footer {
        padding: 10px;
    }

    .sb-sidenav-extra .nav-item a.nav-link {
        color: #fff;
        font-weight: 500;
    }
</style>

