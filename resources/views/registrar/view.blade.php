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
                <h1 class="mt-4">Admission</h1>
                <div class="row">
                    <div class="table-responsive mt-4">
                        <table id="admission" class="table table-wider">
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
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->lrn }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->middle_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->extension }}</td>
                                        

                                        <td>
                                            <!-- <a href="{{ url('/show-table' . $item->id) }}" title="Show Admissions">
                                                <button class="btn btn-primary btn-sm btn-action">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </button>
                                            </a> -->
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalAdminView-{{ $item->id }}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                    View
                                            </button>
                                        
                                        <form method="POST" action="{{ route('admission.admitStudent', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            @csrf
                                                <button class="btn btn-success btn-sm btn-action">
                                                    <i class="fa fa-check" aria-hidden="true"></i> Admit
                                                </button>
                                        </form>
                      
                                            <form method="POST" action="{{ url('admission/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
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

                    {{--MODAL FOR VIEW--}}
                    @foreach($data as $item)
                    <!-- The Modal -->
                    <div class="modal fade" id="modalAdminView-{{ $item->id }}">
                        <div class="modal-dialog custom-wide-modal">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">View Admission</h4>
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
                                            <strong>Province:</strong><br>
                                                <div class="data">
                                                    {{ $item->provinces }}
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
                                            <strong>Junior High:</strong><br>
                                                <div class="data">
                                                    {{ $item->junior_high }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    	<td>
                                            <strong>Year Graduated:</strong><br>
                                                <div class="data">
                                                    {{ $item->year_graduated }}
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
                                            <strong>Graduation Type:</strong><br>
                                                <div class="data">
                                                    {{ $item->graduation_type }}
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>PSA/Birth Certificate:</strong><br>
                                                <div class="data">
                                                    <a href="{{asset('storage/' . $item->psa)}}">
                                                    <img src="{{asset('storage/' . $item->psa)}}" alt="PSA" width="100" height="120">
                                                </a>
                                                </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Form 138:</strong><br>
                                            <div class="data">
                                                @foreach (explode(',', $item->form_138) as $path)
                                                <a href="{{ asset('storage/' . trim($path)) }}">
                                                    <img class="img-thumbnail bg-secondary mx-3" src="{{ asset('storage/' . trim($path)) }}" alt="Image"
                                                        width="50" height="50">
                                                </a>
                                                @endforeach
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
    var $admission = jQuery.noConflict();
    $admission(document).ready(function () {
        $admission('#admission').DataTable({
            pagingType: 'full_numbers'
        });
    });
</script>
{{--END--}}

@endsection