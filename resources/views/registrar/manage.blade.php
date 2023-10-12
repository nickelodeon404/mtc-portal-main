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
                <h1 class="mt-4">Manage Accounts</h1>
                <div class="row">
                        <div class="table-responsive">
                            <table class="table table-wider">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Role ID</th>
                                        <th>Strand ID</th>
                                        <th>Year Level</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->role_id }}</td>
                                            <td>{{ $item->strands_id }}</td>
                                            <td>{{ $item->year_level }}</td>
                                            <td>{{ $item->email}}</td>
                                            <td>{{ $item->password }}</td>
                                            
                                            <td>
                                                <a href="{{ url('/show-table' . $item->id ) }}" title="Show Admissions">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                                    </button>
                                                </a>

                                            <form method="POST" action="{{ url('users' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline"> <!--'user is the table from databases'-->
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