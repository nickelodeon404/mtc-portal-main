@extends('layouts.dashboard')

@section('content')
    @include('registrar._sidenav')

    {{--PAGINATION--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    {{--END--}}

    <style type="text/css">

     /* Set background color for the entire page */
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

    </style>


    <x-panel>
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Academic Record Request</h1>
                <div class="row">
                    <div class="table-responsive mt-4">
                        <table id="academic" class="table table-wider">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Requested Document/s</th>
                                    <th>Purpose</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reqDocument as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->student }}</td>
                                        <td>{{ $item->document_type }}</td>
                                        <td>{{ $item->purpose }}</td>

                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">
                                                Manage
                                            </button>

                                            <form method="POST" action="{{ url('document_types' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm btn-action" title="Delete Request" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <form action="{{ url('/sendsms') }}" method="get">
                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Manage Request</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="mb-4">
                                    <label for="purpose" class="form-label"><b>Message:</b></label><br>
                                    <textarea rows="4" cols="50" name="message" id="message" style="font-weight: bold; font-size: 15px;" required>You can claim your requested document/s on or before:</textarea>
                                        <input type="date" id="message" name="message" required>
                                        <input type="time" id="message" name="message" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>

                            </div>
                        </div>
                        </div>
                    </form>
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
        $('#academic').DataTable({
            pagingType: 'full_numbers'
        });
    });
</script>
{{--END--}}

@endsection
