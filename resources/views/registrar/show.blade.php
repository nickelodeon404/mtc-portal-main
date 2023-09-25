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
 
    </style>
    <x-panel>
        <main>
            <div class="container-fluid px-4">
                <ol class="breadcrumb mt-4">
                    <li class="breadcrumb-admission active">Dashboard</li>
                </ol>
                <h1 class="mt-4">Admission</h1>
                <div class="row">
                        <div class="table-responsive">
                            <table class="table table-wider">
                                <thead>
                                	
                                    <tr>
                                        <td><strong>LRN:</strong></strong> {{ $item->lrn }}</td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Email:</strong> {{ $item->email }}</td>
                                    </tr>
                                    <tr>
                                    	<td><strong>First Name:</strong> {{ $item->first_name }}</td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Middle Name:</strong> {{ $item->middle_name }}</td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Last Name:</strong> {{ $item->last_name }}</td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Extension:</strong> {{ $item->extension }}</td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Birthday:</strong> {{ $item->birthday }}</td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Age:</strong> {{ $item->age }}</td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Barangay:</strong> {{ $item->barangay }}</td>
                                    </tr>
                                    <tr>
                                    	<td><strong>City/Municipality:</strong> {{ $item->city_municipality }}</td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Province:</strong> {{ $item->province }}</td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Mobile No:</strong> {{ $item->mobile_number }}</td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Facebook Account:</strong> {{ $item->facebook }}</td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Junior High:</strong> {{ $item->junior_high }}</td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Year Graduated:</strong> {{ $item->year_graduated }}</td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Strand:</strong> {{ $item->strand }}</td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Graduation Type:</strong> {{ $item->graduation_type }}</td>
                                    </tr>
                                    <tr>
                                    	<td><strong>PSA/Birth Certificate:</strong> <img src="{{$item->psa ? asset('storage/' . $item->psa) : asset('/images/no-image.png')}}" alt="PSA" width="70" height="50"></td>
                                    </tr>
                                    <tr>
                                    	<td><strong>Form 138:</strong> <img src="{{$item->form_138 ? asset('storage/' . $item->form_138) : asset('/images/no-image.png')}}" alt="PSA" width="70" height="50"></td>
                                    </tr>
                                         <tr>
                                            <td>
                                                <a href="{{ url('/view-table') }}" title="Edit Admissions">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> Back
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                   
                                </thead>
                            </table>
                        </div>

                </div>		
            </div>
        </main>
        <x-footer />
    </x-panel>
<!--end-->
@endsection