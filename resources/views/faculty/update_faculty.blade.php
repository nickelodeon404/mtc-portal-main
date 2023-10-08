@extends('layouts.dashboard')

@section('content')
    @include('faculty._sidenav')

    <x-panel>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="my-4">Update Faculty Information</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body d-flex flex-column justify-content-center" style="background-color: lavender;">
                                <h2 class="card-title text-center">Personal Information</h2>
                                <form>
                                    @csrf
                                    <div class="mb-3">
                                        <label for="cellphone_number" class="form-label">Cellphone Number:</label>
                                        <input type="text" id="cellphone_number" name="cellphone_number" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address:</label>
                                        <input type="text" id="address" name="address" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email_address" class="form-label">Email Address:</label>
                                        <input type="email" id="email_address" name="email_address" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <x-footer />
    </x-panel>
@endsection
