
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="img/logo.png" />
    <meta name="author" content="" />
    <title>Mother Theresa Colegio De Iriga Inc.</title>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
    

    <style>
        .nav-link:hover {
            text-decoration: underline;
        }
        
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 text-center" href="index.html">MTC</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            @auth
            <h5 class="d-flex align-items-center justify-content-center text-light ml-3 mb-0">{{auth()->user()->name }}</h5>
            @endauth
            <!-- Notification Icon 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="notificationDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-bell"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                    <li><a class="dropdown-item" href="#!">New Notification 1</a></li>
                    <li><a class="dropdown-item" href="#!">New Notification 2</a></li>
                    <li><a class="dropdown-item" href="#!">New Notification 3</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">View All Notifications</a></li>
                </ul>
            </li> -->
          <!-- User Dropdown -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
        <!-- Open the modal when clicking on the "Settings" link -->
       
        <li>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#settingsModal-{{ auth()->user()->id }}">Change Password</a>
        </li>
        <li>
            <hr class="dropdown-divider" />
        </li>
        <li><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a></li>
    </ul>
</li>

            <!-- Logout Form -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </nav>
    <div id="layoutSidenav">
        @yield('content')
    </div>

   <!-- Modal -->
<div class="modal fade" id="settingsModal-{{ auth()->user()->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settingsModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('users/' . auth()->user()->id) }}" method="post" onsubmit="return validatePasswords(this)">
                @csrf
                @method('PATCH')
                <div class="modal-body">
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
                            <tr>
                                <td>
                                    <strong>Mobile Number:</strong>
                                    <div class="col-md-15 mb-3">
                                        @if(auth()->user()->role_id == 3)
                                            <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ $admitted->mobile_number }}" readonly>
                                        @else
                                            <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ auth()->user()->mobile_number }}" readonly>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Old Password:</strong>
                                    <div class="col-md-15 mb-3">
                                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old Password" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>New Password:</strong>
                                    <div class="col-md-15 mb-3">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password" required>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Confirm New Password:</strong>
                                    <div class="col-md-15 mb-3">
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm New Password" required>
                                        <span id="passwordError" style="color: red; display: none;"><b>Error: Passwords mismatch!!</b></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Enter OTP:</strong>
                                    <div class="col-md-15 mb-3">
                                        <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP" required>
                                        <small id="otpTimer"></small>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" id="sendOtpBtn" class="btn btn-info">Send OTP</button>
                    <button type="submit" class="btn btn-success" style="position: relative;" title="Update Account" onclick="return confirm('Confirm the update?')">
                        <i class="fa fa-check" aria-hidden="true"></i> Update
                    </button>
                    <!-- Add additional buttons if needed -->
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    @if(session('password_changed'))
        alert("Password changed successfully!");
    @endif
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var otpTimer;
        var otpTimerValue = 300; // 5 minutes in seconds

        function startOtpTimer() {
            otpTimer = setInterval(function () {
                otpTimerValue--;
                updateOtpTimer();
                if (otpTimerValue <= 0) {
                    clearInterval(otpTimer);
                    disableOtpInput();
                }
            }, 1000);
        }

        function updateOtpTimer() {
            var minutes = Math.floor(otpTimerValue / 60);
            var seconds = otpTimerValue % 60;
            document.getElementById("otpTimer").innerHTML = "OTP will expire in " + minutes + "m " + seconds + "s";
        }

        function disableOtpInput() {
            document.getElementById("otp").disabled = true;
            document.getElementById("otpTimer").innerHTML = "OTP expired. Please resend.";
        }

        document.getElementById("sendOtpBtn").addEventListener("click", function () {
            sendOtp();
            startOtpTimer();
        });

        function sendOtp() {
        var phoneNumber = $("#mobile_number").val();

        $.ajax({
            url: "{{ route('send-otp') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                mobile_number: phoneNumber
            },
            success: function (response) {
                alert('OTP sent successfully. Check your mobile for the code.');
            },
            error: function (xhr) {
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    alert(xhr.responseJSON.message);
                } else {
                    alert('Error sending OTP. Please try again.');
                }
            }
        });
    }
    });
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{asset('js/admin.js')}}"></script>

{{-- Prevent password change if the new password and confirmation do not match --}}
<script>
    function validatePasswords(form) {
        var newPassword = form.querySelector('.form-control[name="password"]').value;
        var confirmPassword = form.querySelector('.form-control[name="password_confirmation"]').value;

        var passwordError = form.querySelector('#passwordError');

        if (newPassword === confirmPassword) {
            passwordError.style.display = 'none';
            return true; // Allow form submission
        } else {
            passwordError.style.display = 'block';
            return false; // Prevent form submission
        }
    }
</script>
{{-- END --}}

</body>

</html>
