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
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ Auth::user()->name }}
            </div>
        </nav>
    </div>
</body>
</html>
