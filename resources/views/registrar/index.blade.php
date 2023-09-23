@extends('layouts.dashboard')
@section('content')
    @include('registrar._sidenav')
    <style type="text/css">
        a{
            text-decoration: none;
            color: #fff;
        }
        a:hover{
            color: #fff;
        }
    </style>
    <x-panel>
        <main>
            <div class="container-fluid px-4">
                <ol class="breadcrumb mt-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <h1 class="mt-4">Dashboard</h1>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-dark text-white mb-4">
                            <div class="card-body">
                                Admissions
                                 <span class="badge bg-danger">{{ count($data ?? []) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-dark text-white mb-4">
                            <div class="card-body">
                            Academic Record Request
                                <span class="badge bg-danger">{{ count($reqDocument ?? []) }}</span>
                        </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-dark text-white mb-4">
                            <div class="card-body">
                            Enrollment
                            <span class="badge bg-danger">{{ count($enrollmentData ?? []) }}</span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <x-footer />
    </x-panel>
@endsection
