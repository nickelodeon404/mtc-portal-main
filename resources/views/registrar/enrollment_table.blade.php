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
                                    <th>Strand</th>
                                    <th>Year Level</th>
                                    <th>Section</th>
                                    <th>Email</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($enrollmentData as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->lrn }}</td>
                                        <td>{{ $item->strand }}</td>
                                        <td>{{ $item->year_level }}</td>
                                        <td>{{ $item->section }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->middle_name }}</td>
                                        <td>{{ $item->extension }}</td>

                                        <td>
                                            <a href="{{ url('/show_enrollment' . $item->id ) }}" title="Show Enrollment">
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

@endsection