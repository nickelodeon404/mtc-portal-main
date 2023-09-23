@extends('layouts.dashboard')

@section('content')
    @include('students._sidenav')
    <style>
    /* Adjust the width of the form */
    form {
        font-size: 20px; /* Center the form horizontally */
    }
    .textfield{
        width: 350px;
    }
    .checkbox-inline,.text{
        cursor: pointer;
    }

</style>
    <x-panel>
        <main>
            <div class="container-fluid px-4">
                <ol class="breadcrumb mt-4">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </ol>
                <h1 class="mt-4">Academic Record Request</h1><br>
                <div class="container-fluid">
                <form action="{{ url('document_types') }}" method="POST">
                {!! csrf_field() !!}
                <div class="mb-4">
                    <label for="student"><strong>Name:</strong></label>
                    <input class="textfield" type="text" name="name" id="name" placeholder="Please input your full name." required>
                </div>
                <div class="form-check mb-4">
                    <label for="document_type"><strong>Document Types:</strong></label><br>
                    @foreach (\App\Models\AcademicRecordDocuments::all() as $ard)
                        <label class="checkbox-inline">
                            <input class="text" type="checkbox" name="document_type[]" id="document_type" value="{{ $ard->name }}">{{ $ard->name }}
                        </label><br>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Send Request</button>
                </form>         
                </div>
            </div>
        </main>
        <x-footer />
    </x-panel>
@endsection
