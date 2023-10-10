@extends('layouts.dashboard')

@section('content')
    @include('students._sidenav')
    
 <x-panel>
        <main>
            <div class="container-fluid px-4 mt-4">
                
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h1 class="mt-2 text-center">Welcome, ________!</h1>
                    </div>
                </div>                

                <ol class="breadcrumb mt-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <h1 class="mt-4">Dashboard</h1>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Primary Card</div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body">Secondary Card</div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Success Card</div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Danger Card</div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <x-footer />
    </x-panel>  
@endsection
