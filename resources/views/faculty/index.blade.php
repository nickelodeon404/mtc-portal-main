@extends('layouts.dashboard')
@section('content')
    @include('faculty._sidenav')
    <x-panel>
        <main>
            <div class="container-fluid px-4">
                
                <h1 class="mt-4">Hello, Coach ______!</h1>
                <div class="row">
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
