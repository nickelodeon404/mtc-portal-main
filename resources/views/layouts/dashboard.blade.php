
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

        /* Style the modal to match your existing layout */
        .modal-content {
            background-color: #d7dce1; /* Background color */
            color: #000000; /* Text color */
            border: 1px solid #d2d1d1; /* Border color */
            border-radius: 0; /* Border radius */
        }

        .modal-header {
            border-bottom: 1px solid #000000; /* Border color */
            background-color: #d7dce1; /* Header background color */
            color: #000000; /* Header text color */
        }

        .modal-footer {
            border-top: 1px solid #000000; /* Border color */
            background-color: #d7dce1; /* Footer background color */
            color: #000000; /* Footer text color */
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
            <!-- Notification Icon -->
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
            </li>
            <!-- User Dropdown -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
        <!-- Open the modal when clicking on the "Settings" link -->
        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#settingsModal">Settings</a></li>
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
<div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="settingsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="settingsModalLabel">Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="modal-title" id="settingsModalLabel">Update Information</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Name:</td>
                            <td contenteditable="false">{{ auth()->user()->name }}</td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td contenteditable="true">Insert your address here</td> <!-- Replace with actual address -->
                        </tr>
                        <tr>
                            <td>Contact Number:</td>
                            <td contenteditable="true">Insert your contact number here</td> <!-- Replace with actual phone number -->
                        </tr>
                        <tr>
                            <td>Email Address:</td>
                            <td contenteditable="true">Insert your email address here</td> <!-- Replace with actual email address -->
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Change Password</button>
                <!-- Add additional buttons if needed -->
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{asset('js/admin.js')}}"></script>
</body>

</html>
