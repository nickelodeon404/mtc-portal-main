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

        .table-wider th, .table-wider td {
            white-space: nowrap;
            text-align: center;
        }

        /* Additional table styling for a beautiful look */
        .table-wider {
            border-collapse: collapse;
            width: 100%;
        }

        .table-wider th, .table-wider td {
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

        /* Styling for the "Add Account" button */
        .btn-add-account {
            background-color: #2ecc71; /* Change the color as needed */
            color: #fff;
            font-size: 18px;
            padding: 10px 20px; /* Adjust the padding to make the button bigger */
            border: none;
            border-radius: 5px; /* Rounded corners */
        }
        
        .btn-add-account:hover {
            background-color: #27ae60; /* Change the hover color */
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
            @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-12 d-flex justify-content-between">
                        <h1 class="mt-4">Manage User Accounts</h1>
                        <div>
                            <button type="button" class="btn btn-add-account" style="margin-top: 30px;" data-bs-toggle="modal" data-bs-target="#modalAdd">
                                Add Account
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mt-4">
                    <table id="manage" class="table table-wider">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Role Type</th>
                                <!-- <th>Strand ID</th> -->
                                <!-- <th>Year Level</th> -->
                                <!-- <th>Username</th> -->
                                <!-- <th>Password</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ \App\Models\Roles::find($item->role_id)->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalManageView-{{ $item->id }}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                    View
                                            </button>

                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalManageUpdate-{{ $item->id }}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    Update
                                            </button>

                                        <form method="POST" action="{{ url('users' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm btn-action" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
{{--MODAL VIEW ACCOUNT--}}
            @foreach($user as $item)
                    <!-- The Modal -->
                    <div class="modal fade" id="modalManageView-{{ $item->id }}">
                        <div class="modal-dialog custom-wide-modal">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">View Account</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                <table class="table table-wider">
                                <thead>
                                    <tr>
                                        <td>
                                            <strong>Name:</strong><br>
                                                <div class="data">
                                                    {{ $item->name }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Role Type:</strong><br>
                                                <div class="data">
                                                {{ \App\Models\Roles::find($item->role_id)->name }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Username:</strong><br>
                                                <div class="data">
                                                    {{ $item->email }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Password:</strong><br>
                                                <div class="data">
                                                {{ str_repeat('*', strlen($item->password)) }}
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
{{--END MODAL VIEW ACCOUNT--}}


{{--MODAL UPDATE ACCOUNT--}}
@foreach($user as $item)
                    <!-- The Modal -->
                    <div class="modal fade" id="modalManageUpdate-{{ $item->id }}">
                        <div class="modal-dialog custom-wide-modal">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Update Account</h4>
                                        <a href="{{ url('/manage-table') }}">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </a>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                <form action="{{ url('users/' . $item->id) }}" method="post" onsubmit="return validatePasswords(this)">
                                    @csrf 
                                    @method('PATCH')
                                <table class="table table-wider">
                                <thead>
                                    <tr>
                                        <td>
                                            <strong>Name:</strong> 
                                            <div class="col-md-15 mb-3"> 
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$item->name}}" required>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Role Type:</strong> 
                                            <div class="col-md-15 mb-3"> 
                                                <select class="form-select" id="role_id" name="role_id" required>
                                                    <option disabled selected>Select One</option>
                                                        @foreach(\App\Models\Roles::all() as $role)
                                                            <option value="{{ $role->id }}" {{ $item->role_id == $role->id ? "selected" : "" }}>{{ $role->name }}</option>
                                                        @endforeach
                                                </select>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Username:</strong> 
                                            <div class="col-md-15 mb-3"> 
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Username" value="{{$item->email}}" required>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Password:</strong> 
                                            <div class="col-md-15 mb-3"> 
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{$item->password}}" required> 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Confirm Password:</strong>
                                            <div class="col-md-15 mb-3">
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-Enter Password" value="" required>
                                                <span id="passwordError" style="color: red; display: none;"><b>Error: Passwords mismatch!!</b></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button type="submit" class="btn btn-success" style="position: relative;" title="Update Account" onclick="return confirm('Confirm the update?')">
                                                    <i class="fa fa-check" aria-hidden="true"></i> Update
                                                </button>

                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                                Back
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
{{--END MODAL UPDATE ACCOUNT--}}


{{--MODAL ADD ACCOUNT--}}
                <form action="{{ url('users') }}" method="post">
                    @csrf

                    <!-- The Modal -->
                    <div class="modal fade" id="modalAdd">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Create Account</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="mb-4">
                                        <label for="lrn" class="form-label"><b>Name:</b></label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="" required><br>

                                        <label for="roleid" class="form-label"><b>Role ID</b></label>
                                            <select class="form-select" id="role_id" name="role_id" required>
                                                <option value="" selected>Select One</option>
                                                @foreach(\App\Models\Roles::all() as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                        </select><br>

                                        <label for="username" class="form-label"><b>Username:</b></label>
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Username" value="" required><br>

                                        <label for="password" class="form-label"><b>Password:</b></label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" required><br>

                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
{{--END MODAL ADD ACCOUNT--}}
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
        $('#manage').DataTable({
            pagingType: 'full_numbers'
        });
    });
</script>

{{--END--}}

{{--Prevent password change if the password and confirm password do not match--}}
<script>
function validatePasswords(form) {
    var password = form.querySelector('.form-control[name="password"]').value;
    var confirmPassword = form.querySelector('.form-control[name="password_confirmation"]').value;

    var passwordError = form.querySelector('#passwordError'); // Check this selector

    if (password === confirmPassword) {
        passwordError.style.display = 'none';
        return true; // Allow form submission
    } else {
        passwordError.style.display = 'block';
        return false; // Prevent form submission
    }
}
</script>
{{--END--}}
@endsection