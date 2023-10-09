<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha384-ZMP7rVo3mIykV+5/8WTU5HN6a5OV7BaaRjRf5v5d5V5c5v5Q5f5u5z5z5s5v5q5k5V5r5" crossorigin="anonymous">
    <style>
        /* CSS for hover effect */
        .nav-link:hover {
            background-color: #333;
            color: #fff;
        }
        .nav-link:hover i {
            color: #fff; /* Change icon color on hover */
        }
    </style>
</head>
<body>
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <x-logo />
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="#">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a class="nav-link" href="/student">
                        <i class="fas fa-user-graduate"></i> Enrollment Form
                    </a>
                    <a class="nav-link" href="/academic">
                        <i class="fas fa-file"></i> Academic Record Request
                    </a>
                    <a class="nav-link" href="/grades">
                        <i class="fas fa-graduation-cap"></i> Grades
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ Auth::user()->name }}
            </div>
        </nav>
    </div>

    <!-- Your content goes here -->

</body>
</html>
