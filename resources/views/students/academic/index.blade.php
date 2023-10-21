@extends('layouts.dashboard')

@section('content')
    @include('students._sidenav')

    <style>
        /* Set background image to resemble paper */
        body {
            
             background-color: #fef6ff; /* Adjust the color as needed */
            background-image: url('paper-background.jpg'); /* Replace 'paper-background.jpg' with your image path */
            background-repeat: repeat; /* Repeat the background image */
        }

        /* Form styles */
        form {
            font-size: 15px;
            width: 55%;
            margin: 0 auto;
            background-color: #5c2c7848; /* White background for the form */
            padding: 20px;
            border: 1px solid #5c2c7850; /* Border to resemble paper */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Paper shadow */
        }

        label {
            display: block;
            margin-top: 4px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 60%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .checkbox-inline {
        margin-right: 20px;
        cursor: pointer; Add margin to create space below the checkbox label */
        }

        .checkbox-inline input[type="checkbox"] {
        transform: scale(1.5); /* Adjust the scale factor as needed to make the checkbox bigger */
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff; /* Button background color */
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1184ff; /* Button background color on hover */
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
                                    <br><input type="text" id="student" name="student" value="{{ $admission->first_name }} {{ $admission->last_name }}" style="font-weight: bold; border: none;" readonly>
                                </label>
                                <label for="mobile_number"><strong>Phone No:</strong>
                                    <br><input type="text" id="mobile_number" name="mobile_number" value="{{ $admission->mobile_number}} " style="font-weight: bold; border: none;" readonly>
                                </label>
                                <!-- <label for="student_phone_number">Phone Number:</label>
                                <input type="text" name="student_phone_number" class="form-control" required> -->
                            @endforeach
                        </div>
                        <div class="form-check mb-4">
                            <label for="document_type"><strong>Document Types:</strong></label><br>
                            @foreach (\App\Models\AcademicRecordDocuments::all() as $ard)
                                <label class="checkbox-inline">
                                    <input class="text" type="checkbox" name="document_type[]" id="document_type" value="{{ $ard->name }}"> &nbsp; {{ $ard->name }}
                                    <!-- Added a space character (&nbsp;) before the name -->
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