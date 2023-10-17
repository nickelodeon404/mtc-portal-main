@extends('layouts.dashboard')

@section('content')
    @include('registrar._sidenav')



    <style type="text/css">
        body {
            background-color: #f0f0f0; /* Adjust the background color as needed */
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

        /* Additional table styling for a beautiful look */
        .table-wider {
            background-color: #f5f5f5;
            border-collapse: collapse;
        }

        .table-wider th {
            background-color: #5c2c78;
            color: #fff;
        }

        .table-wider th, .table-wider td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        .table-wider td {
            background-color: #fff;
        }

        /* Button styling */
        .btn-action {
            margin-right: 5px;
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
                <h1 class="mt-4">Enrollment</h1>
                <div class="row">
                    <div class="table-responsive mt-4">
                        <table id="enrollment" class="table table-wider">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>LRN</th>
                                    <th>Email</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Extension</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enrollmentData as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->lrn }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->middle_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->extension }}</td>

                                        <td>
                                            <a href="{{ url('/show_enrollment-table' . $item->id ) }}" title="Show Enrollment">
                                                <button class="btn btn-primary btn-sm btn-action">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a>

                                            <form method="POST" action="{{ route('enrollment.addToEnrolled', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-success btn-sm btn-action" title="Add to Enrolled" onclick="return confirm('Confirm and transfer to enrolled?')">
                                                    <i class="fa fa-check" aria-hidden="true"></i> Enroll
                                                </button>
                                            </form>

                                            <a href="{{ url('/enrollment' . $item->id) }}" title="Update">
                                                <button class="btn btn-info btn-sm btn-action">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i> Update
                                                </button>
                                            </a>

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
                </div>
            </div>
        </main>
        <x-footer />
    </x-panel>
</section>



@endsection
