@extends('layouts.dashboard')
@section('content')
    @include('faculty._sidenav')
    <x-panel>
        <main>
            <div class="container-fluid px-4">
                <ol class="breadcrumb mt-4">
                    <li class="breadcrumb-item active">Update Faculty Information</li>
                </ol>
                <h1 class="mt-4">Update Information</h1>

                <form>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cellphone_number" class="form-label">Cellphone Number:</label>
                                <input type="text" id="cellphone_number" name="cellphone_number" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address" class="form-label">Address:</label>
                                <input type="text" id="address" name="address" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birthday" class="form-label">Birthday:</label>
                                <input type="date" id="birthday" name="birthday" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email_address" class="form-label">Email Address:</label>
                                <input type="email" id="email_address" name="email_address" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </form>

                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </main>
        <x-footer />
    </x-panel>
@endsection
