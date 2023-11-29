@extends('layouts.dashboard')

@section('content')
    @include('registrar._sidenav')

    {{--PAGINATION--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    {{--END--}}

    <style type="text/css">

        body {
             background-color: #f0f0f0; /* Adjust the color as needed */
             }
        a {
            text-decoration: none;
            color: #fff;
        }

        a:hover {
            color: #fff;
        }

        .table-wider {
            width: 100%;
            max-width: 100%;
        }

        .table-wider th,
        .table-wider td {
            white-space: nowrap;
            text-align: center;
        }

        /* Additional table styling */
        .table-wider {
            background-color: #f5f5f5;
        }

        .table-wider th,
        .table-wider td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: center;
        }

        .table-wider th {
            background-color: #5c2c78;
            color: #fff;
        }

        .table-wider tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table-wider tr:hover {
            background-color: #d1d1d1;
        }

        /* Button styling */
        .btn-action {
            margin-right: 5px;
        }

        /* MODAL SIZE */
        .custom-wide-modal {
            max-width: 60%;
        }

        /* TABLE STRONG TEXT ALIGNMENT */
        strong {
            float: left;
        }
        .data{
            float: left;
            
        }
    </style>

    <x-panel>
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Enrollment</h1>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="table-responsive mt-4">
                        <table id="enrollment" class="table table-wider">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>LRN</th>
                                    <th>Strand</th>
                                    <th>Year Level</th>
                                    {{--<th>Section</th>--}}
                                    <th>Email</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Extension</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enrollmentData as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->lrn }}</td>
                                        <td>{{ $item->strand }}</td>
                                        <td>{{ $item->grade_level }}</td>
                                        {{--<td>{{ $item->section }}</td>--}}
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->middle_name }}</td>
                                        <td>{{ $item->extension }}</td>

                                        <td>
                                            <!-- <a href="{{ url('/show_enrollment' . $item->id ) }}" title="Show Enrollment">
                                                <button class="btn btn-primary btn-sm btn-action">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a> -->
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalView-{{ $item->id }}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                    View
                                            </button>

                                           <!-- <form method="POST" action="{{ route('enrollment.addToEnrolled', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-success btn-sm btn-action" title="Add to Enrolled" onclick="return confirm('Confirm and transfer to enrolled?')">
                                                    <i class="fa fa-check" aria-hidden="true"></i> Enroll
                                                </button>
                                            </form> -->

                                           <!-- <a href="{{ url('/enrollment' . $item->id) }}" title="Update">
                                                <button class="btn btn-info btn-sm btn-action">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i> Update
                                                </button>
                                            </a> -->
                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalUpdate-{{ $item->id }}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    Update
                                            </button>

                                            <form method="POST" action="{{ url('enrollment' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm btn-action" title="Delete Student" onclick="return confirm('Confirm delete?')">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
{{--MODAL FOR VIEW--}}
                    @foreach($enrollmentData as $item)
                    <!-- The Modal -->
                    <div class="modal fade" id="modalView-{{ $item->id }}">
                        <div class="modal-dialog custom-wide-modal">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">View Enrollees</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                <table class="table table-wider">
                                <thead>
                                    <tr>
                                        <td>
                                            <strong>LRN:</strong><br>
                                                <div class="data">
                                                    {{ $item->lrn }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Email:</strong><br>
                                                <div class="data">
                                                    {{ $item->email }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>First Name:</strong><br>
                                                <div class="data">
                                                    {{ $item->first_name }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Middle Name:</strong><br>
                                                <div class="data">
                                                    {{ $item->middle_name }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Last Name:</strong><br>
                                                <div class="data">
                                                    {{ $item->last_name }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Extension:</strong><br>
                                                <div class="data">
                                                    {{ $item->extension }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Birthday:</strong><br>
                                                <div class="data">
                                                    {{ $item->birthday }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Age:</strong><br>
                                                <div class="data">
                                                    {{ $item->age }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Mobile No:</strong><br>
                                                <div class="data">
                                                    {{ $item->mobile_number }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Facebook Account:</strong><br>
                                                <div class="data">
                                                    {{ $item->facebook }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Region:</strong><br>
                                                <div class="data">
                                                    {{ $item->region }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Province:</strong><br>
                                                <div class="data">
                                                    {{ $item->provinces }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Barangay:</strong><br>
                                                <div class="data">
                                                    {{ $item->barangay }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>City/Municipality:</strong><br>
                                                <div class="data">
                                                    {{ $item->municipalities }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Status:</strong><br>
                                                <div class="data">
                                                    {{ $item->status }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Grade Level:</strong><br>
                                                <div class="data">
                                                    {{ $item->grade_level }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Strand:</strong><br>
                                                <div class="data">
                                                    {{ $item->strand }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Junior High:</strong><br>
                                                <div class="data">
                                                    {{ $item->junior_high }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Graduation Type:</strong><br>
                                                <div class="data">
                                                    {{ $item->graduation_type }}
                                                </div>
                                        </td>
                                    </tr>    
                                </thead>
                            </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
{{--END OF MODAL VIEW--}}

{{--MODAL FOR UPDATE--}}
@foreach($enrollmentData as $item)
                    <!-- The Modal -->
                    <div class="modal fade" id="modalUpdate-{{ $item->id }}">
                        <div class="modal-dialog custom-wide-modal">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Update Enrollees</h4>
                                        <a href="{{ url('/enrollment_table-table') }}">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </a>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                <form action="{{ route('enrollment.addToEnrolled', $item->id) }}" method="POST" accept-charset="UTF-8">
                                    @csrf  
                                <table class="table table-wider">
                                <thead>
                                    <tr>
                                        <td>
                                            <strong>LRN:</strong> 
                                            <div class="col-md-15 mb-3"> 
                                                <input type="text" class="form-control" id="lrn" name="lrn" placeholder="Enter LRN" value="{{$item->lrn}}">
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>First Name:</strong> 
                                            <div class="col-md-15 mb-3"> 
                                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{$item->first_name}}">
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Middle Name:</strong> 
                                            <div class="col-md-15 mb-3"> 
                                                <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter Middle Name" value="{{$item->middle_name}}">
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Last Name:</strong> 
                                            <div class="col-md-15 mb-3"> 
                                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{$item->last_name}}"> 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Extension:</strong> 
                                            <div class="col-md-15 mb-3"> 
                                                <input type="text" class="form-control" id="extension" name="extension" placeholder="Enter Extension Name" value="{{$item->extension}}"> 
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Birthday:</strong> 
                                            <div class="col-md-15 mb-3"> 
                                                <input type="date" class="form-control" id="birthday" name="birthday" value="{{$item->birthday}}"> 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Age:</strong> 
                                            <div class="col-md-15 mb-3"> 
                                                <input type="number" class="form-control" id="age" name="age" placeholder="Enter Age" value="{{$item->age}}"> 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
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
                                            <strong>Facebook Account:</strong> 
                                            <div class="col-md-15 mb-3"> 
                                                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter Facebook Account" value="{{$item->facebook}}"> 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Region:</strong> 
                                            <div class="col-md-15 mb-3"> 
                                                <input type="text" class="form-control" id="region" name="region" placeholder="Enter Region" value="{{$item->region}}"> 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Province:</strong> 
                                            <div class="col-md-15 mb-3"> 
                                                <input type="text" class="form-control" id="provinces" name="provinces" placeholder="Enter Province" value="{{$item->provinces}}"> 
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
                                                <input type="text" class="form-control" id="municipalities" name="municipalities" placeholder="Enter City/Municipality" value="{{$item->municipalities}}">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Status:</strong> 
                                            <div class="col-md-15 mb-3">
                                            <select class="form-select" id="status" name="status">
                                                <option disabled selected>Select One</option>
                                                <option value="New Student" {{$item->status == "New Student" ? "selected" : ""}}>New Student</option>
                                                <option value="Transfer Student" {{$item->status == "Transfer Student" ? "selected" : ""}}>Transfer Student</option>
                                                <option value="Returning Student" {{$item->status == "Returning Student" ? "selected" : ""}}>Returning Student</option>
                                            </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Grade Level:</strong> 
                                            <div class="col-md-15 mb-3">
                                                <select class="form-select" id="grade_level" name="grade_level">
                                                <option disabled selected>Select an option</option>
                                                    <option value="11" {{$item->grade_level == "11" ? "selected" : ""}}>11</option>
                                                    <option value="12" {{$item->grade_level == "12" ? "selected" : ""}}>12</option>
                                                </select>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Strand:</strong>
                                            <div class="col-md-15 mb-3">
                                                <select class="form-select" name="strand" id="strand" required>
                                                    <option disabled selected>Select an option</option>
                                                    @foreach (\App\Models\Strand::all() as $strand) 
                                                        <option value="{{ $strand->acronym }}" {{ $item->strand == $strand->acronym ? "selected" : "" }}>{{ $strand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Section:</strong>
                                            <div class="col-md-15 mb-3">
                                                <select class="form-select" name="section" id="section" required>
                                                    <option disabled selected>Select an option</option>
                                                    <!-- @foreach (\App\Models\Section::all() as $section)
                                                        @php
                                                            $strand = \App\Models\Strand::find($section->strand_id);
                                                        @endphp
                                                        <option value="{{ $section->name }}"{{ $strand && $strand->id == $section->name ? " selected" : "" }}>
                                                        {{ $strand ? $strand->acronym : 'No Strand Found' }} - {{ $section->name }}
                                                        </option>
                                                    @endforeach -->
                                                    @foreach (\App\Models\Section::where('strand_id', 1)->get() as $section)
                                                        <option value="{{ $section->name }}">{{ $section->name }}</option>
                                                    @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Last School Attended:</strong>
                                            <div class="col-md-15 mb-3"> 
                                                <input type="text" class="form-control" id="junior_high" name="junior_high" placeholder="Last School Attended" value="{{$item->junior_high}}"> 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Graduation Type:</strong>
                                            <div class="col-md-15 mb-3">
                                                <select class="form-select" id="graduation_type" name="graduation_type">
                                                    <option disabled selected>Select an option</option>
                                                    <option value="Public Completer" {{$item->graduation_type == "Public Completer" ? "selected" : ""}}>Public Completer</option>
                                                    <option value="Private Completer" {{$item->graduation_type == "Private Completer" ? "selected" : ""}}>Private Completer</option>
                                                    <option value="ALS Graduate" {{$item->graduation_type == "ALS Graduate" ? "selected" : ""}}>ALS Graduate</option>
                                                </select>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button type="submit" class="btn btn-success" style="position: relative; title="Add to Enrolled" onclick="return confirm('Confirm and transfer to enrolled?')">
                                                    <i class="fa fa-check" aria-hidden="true"></i> Enroll
                                                </button>
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
{{--END OF MODAL UPDATE--}}

            </div>
        </main>
        <x-footer />
    </x-panel>
</section>

{{--PAGINATION--}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Add jQuery -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> <!-- Add DataTables script -->
<script>
    $(document).ready(function () {
        $('#enrollment').DataTable({
            pagingType: 'full_numbers'
        });
    });
</script>

{{--END--}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

@endsection