@extends('layouts.dashboard')
@section('content')
    @include('registrar._sidenav')
<!--make your code here-->
<style type="text/css">
        a{
            text-decoration: none;
            color: #fff;
        }
        a:hover{
            color: #fff;
        }
 
    </style>
    <x-panel>
        <main>
            <div class="container-fluid px-4">
                <ol class="breadcrumb mt-4">
                    <li class="breadcrumb-admission active">Dashboard</li>
                </ol>
                <h1 class="mt-4">Edit Enrollment</h1>
                <div class="row">
                        <div class="table-responsive">
                            <form action="{{ route('enrollment.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <table class="table table-wider">
                                <thead>
                                    <tr>
                                        <td><strong>LRN:</strong> <div class="col-md-6 mb-3"> <input type="text" class="form-control" id="lrn" name="lrn" placeholder="Enter LRN" value="{{$item->lrn}}"> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>First Name:</strong> <div class="col-md-6 mb-3"> <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{$item->first_name}}"> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Middle Name:</strong> <div class="col-md-6 mb-3"> <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter Middle Name" value="{{$item->middle_name}}"> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Last Name:</strong> <div class="col-md-6 mb-3"> <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{$item->last_name}}"> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Extension:</strong> <div class="col-md-6 mb-3"> <input type="text" class="form-control" id="extension" name="extension" placeholder="Enter Extension Name" value="{{$item->extension}}"> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Birthday:</strong> <div class="col-md-6 mb-3"> <input type="date" class="form-control" id="birthday" name="birthday" value="{{$item->birthday}}"> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Age:</strong> <div class="col-md-6 mb-3"> <input type="number" class="form-control" id="age" name="age" placeholder="Enter Age" value="{{$item->age}}"> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Mobile No:</strong> <div class="col-md-6 mb-3"> <input type="number" class="form-control" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number" value="{{$item->mobile_number}}"> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email:</strong> <div class="col-md-6 mb-3"> <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" value="{{$item->email}}"> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Facebook Account:</strong> <div class="col-md-6 mb-3"> <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter Facebook Account" value="{{$item->facebook}}"> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Region:</strong> <div class="col-md-6 mb-3"> <input type="text" class="form-control" id="region" name="region" placeholder="Enter Region" value="{{$item->region}}"> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Province:</strong> <div class="col-md-6 mb-3"> <input type="text" class="form-control" id="province" name="province" placeholder="Enter Province" value="{{$item->province}}"> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Barangay:</strong> <div class="col-md-6 mb-3"> <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Enter Barangay" value="{{$item->barangay}}"> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>City/Municipality:</strong> <div class="col-md-6 mb-3"> <input type="text" class="form-control" id="city_municipality" name="city_municipality" placeholder="Enter City/Municipality" value="{{$item->city_municipality}}"> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status:</strong> <div class="col-md-6 mb-3">
                                <select class="form-select" id="status" name="status">
                                    <option disabled selected>Select One</option>
                                    <option value="New Student" {{$item->status == "New Student" ? "selected" : ""}}>New Student</option>
                                    <option value="Transfer Student" {{$item->status == "Transfer Student" ? "selected" : ""}}>Transfer Student</option>
                                    <option value="Returning Student" {{$item->status == "Returning Student" ? "selected" : ""}}>Returning Student</option>
                                </select>
                            </div></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Grade Level to Enroll:</strong> <div class="col-md-6 mb-3">
                                <select class="form-select" id="grade_level" name="grade_level" value="{{$item->grade_level}}">
                                    <option disabled selected>Select One</option>
                                    <option>Grade 11</option>
                                    <option>Grade 12</option>
                                    <!-- Add more grade levels as needed -->
                                </select>
                            </div> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Last School Attended:</strong> <div class="col-md-6 mb-3"> <input type="text" class="form-control" id="junior_high" name="junior_high"
                                        placeholder="Last School Attended" value="{{$item->junior_high}}"> </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Graduation Type:</strong> <div class="col-md-6 mb-3">
                                <select class="form-select" id="graduation_type" name="graduation_type">
                                    <option disabled selected>Select an option</option>
                                    <option value="Public Completer" {{$item->graduation_type == "Public Completer" ? "selected" : ""}}>Public Completer</option>
                                    <option value="Private Completer" {{$item->lrn == "Private Completer" ? "selected" : ""}}>Private Completer</option>
                                    <option value="ALS Graduate" {{$item->lrn == "ALS Graduate" ? "selected" : ""}}>ALS Graduate</option>
                                </select>
                            </div> </td>
                                    </tr>
                                             <td>
                                                    <button type="submit" class="btn btn-success" style="position: relative;">Update</button>

                                                <a href="{{ url('/enrollment_table-table') }}" title="Edit Admissions">
                                                    <button class="btn btn-primary">
                                                        Back
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
        </main>
        <x-footer />
    </x-panel>
<!--end-->
@endsection