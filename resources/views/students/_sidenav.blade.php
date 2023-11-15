<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha384-ZMP7rVo3mIykV+5/8WTU5HN6a5OV7BaaRjRf5v5d5V5c5v5Q5f5u5z5z5s5v5q5k5V5r5" crossorigin="anonymous">
    <!-- Include Bootstrap CSS and JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
                    <a class="nav-link" href="/dashboard">
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
                     <!-- Modal Button -->
                    <a href="#" type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalUpdateInfoStudent">
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
 @foreach (\App\Models\Admitted::all() as $item) <!-- MANUAL CALLING FROM DIRECTORY IS BETTER -->
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
                <form action="{{ url('admitted/' . $item->id) }}" method="post">
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
                                               <input type="tel" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number" value="{{$item->mobile_number}}"> 
                                           </div>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>
                                           <strong>Email:</strong> 
                                           <div class="col-md-15 mb-3"> 
                                               <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" value="{{$item->email}}"> 
                                           </div>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>
                                           <strong>Barangay:</strong> 
                                           <div class="col-md-15 mb-3"> 
                                               <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Enter Barangay" value="{{$item->barangay}}"> 
                                           </div>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>
                                           <strong>City/Municipality:</strong> 
                                           <div class="col-md-15 mb-3"> 
                                               <input type="text" class="form-control" id="city_municipality" name="city_municipality" placeholder="Enter City/Municipality" value="{{$item->city_municipality}}">
                                           </div>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td>
                                           <strong>Province:</strong> 
                                           <div class="col-md-15 mb-3"> 
                                               <input type="text" class="form-control" id="province" name="province" placeholder="Enter Province" value="{{$item->province}}"> 
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
</html>
