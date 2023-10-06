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
                    @foreach (\App\Models\Admission::where('users_id', auth()->user()->id)->get() as $admission)
                        <label for="student"><strong>Name:</strong>
                            <input type="text" id="student" name="student" value="{{ $admission->first_name }} {{ $admission->last_name }}" style="font-weight: bold; border: none;" readonly>
                        </label>
                    @endforeach
                </div>
                <div class="form-check mb-4">
                    <label for="document_type"><strong>Document Types:</strong></label><br>
                    @foreach (\App\Models\AcademicRecordDocuments::all() as $ard)
                        <label class="checkbox-inline">
                            <input class="text" type="checkbox" name="document_type[]" id="document_type" value="{{ $ard->name }}">{{ $ard->name }}
                        </label><br>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label for="purpose" class="form-label"><b>Purpose:</b></label><br>
                    <textarea rows="4" cols="50" name="purpose" id="purpose" placeholder="Write your purpose here!" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Request</button>
                </form>         
                </div>
            </div>
        </main>
        <x-footer />
    </x-panel>
@endsection
