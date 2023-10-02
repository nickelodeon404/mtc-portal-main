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
                <h1 class="mt-4">Academic Record Request</h1>
                <div class="row">
                        <div class="table-responsive">
                            <table class="table table-wider">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Requested Document/s</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reqDocument as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->document_type }}</td>

                                            <td>
                                                <!--<a href="{{ url('/show-table' . $item->id ) }}" title="Edit Admissions">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                                    </button>
                                                </a>-->

                                            <form method="POST" action="{{ url('document_types' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline"> <!--'document_types is the table from databases'-->
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