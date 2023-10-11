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
        .table-wider {
            width: 100%;
            max-width: 100%;
        }

        .table-wider th,
        .table-wider td {
            white-space: nowrap;
            text-align: center;
        }
    </style>
    <x-panel>
        <main>
            <div class="container-fluid px-4">
                <ol class="breadcrumb mt-4">
                    <li class="breadcrumb-admission active">Dashboard</li>
                </ol>
                <h1 class="mt-4">Enrolled</h1>
                <div class="row">
                        <div class="table-responsive">
                            <table class="table table-wider">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>LRN</th>
                                        <th>Email</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Extension</th>
                                    {{--
                                        <th>Birthday</th>
                                        <th>Age</th>
                                        <th>Barangay</th>
                                        <th>City/Municipality</th>
                                        <th>Province</th>
                                        <th>Mobile No.</th>
                                        <th>Facebook Acc.</th>
                                        <th>Junior High</th>
                                        <th>Year Graduated</th>
                                        <th>Strand</th>
                                        <th>Graduation Type</th>
                                        <th>PSA/Birth Certificate</th>
                                        <<th>Form 138</th>
                                    --}}
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
                                                <a href="{{ url('/show-table' . $item->id ) }}" title="Show Admissions">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                                    </button>
                                                </a>

                                            <form method="POST" action="{{ url('enrolled' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline"> <!--'enrolled is the table from databases'-->
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)">
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
<!--end-->
@endsection