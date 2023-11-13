@extends('layouts.dashboard')

@section('content')
    @include('registrar._sidenav')

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

    </style>

    <x-panel>
        <main>
            <div class="container-fluid px-4">
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
                    <table class="table table-wider">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Role ID</th>
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
                                    <td>{{ $item->role_id }}</td>
                                   {{-- <td>{{ $item->strands_id }}</td> --}}
                                   {{-- <td>{{ $item->year_level }}</td> --}}
                                    <!-- <td>{{ $item->email }}</td> -->
                                    <!-- To display asterisks for the password -->
                                    <!-- <td>{{ str_repeat('*', strlen($item->password)) }}</td> -->
                                    <td>
                                        <a href="{{ url('/show-table' . $item->id) }}">
                                            <button class="btn btn-primary btn-sm btn-action">
                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                            </button>
                                        </a>
                                        <a href="{{ url('/users/' . $item->id) }}" title="Update Account">
                                            <button class="btn btn-warning btn-sm btn-action">
                                                <i class="fa fa-edit" aria-hidden="true"></i> Update
                                            </button>
                                        </a>
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

                                        <label for="lrn" class="form-label"><b>Role ID</b></label>
                                            <select class="form-select" id="status" name="status" required>
                                                <option value="" selected>Select One</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                        </select><br>

                                        <label for="lrn" class="form-label"><b>Email:</b></label>
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="" required><br>

                                        <label for="lrn" class="form-label"><b>Password:</b></label>
                                        <input type="password" class="form-control" name="name" id="password" placeholder="Password" value="" required><br>

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
@endsection
