@extends('layouts.login-layout')

@section('content')
<style>
    /* Add the glass effect to the form container */
    .glass-effect {
        /* From https://css.glass */
        background: rgba(255, 255, 255, 0.2); 
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5px); 
        -webkit-backdrop-filter: blur(5px); 
        border: 1px solid rgba(255, 255, 255, 0.16);
        padding: 20px; /* Added padding for spacing */
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    /* Add the glass effect to the buttons */
    .glass-button {
        /* From https://css.glass */
        background: rgba(255, 255, 255, 0.03);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(2.4px);
        -webkit-backdrop-filter: blur(2.4px);
        border: 1px solid rgba(255, 255, 255, 0.16);
        border-radius: 8px;
        margin-bottom: 10px;
        padding: 10px 20px;
        color: #fff;
        text-transform: uppercase; /* Capitalize the text */
        width: 100%; /* Set the buttons to the same width */
    }

    /* This is for the back button */
    .back-button {
        height: 50px;
        background: #ad61fa;
        box-shadow: #ad61fa;
        backdrop-filter: blur(2.4px);
        -webkit-backdrop-filter: blur(2.4px);
        border: 1px solid rgba(255, 255, 255, 0.16);
        border-radius: 8px;
        margin-bottom: 10px;
        padding: 10px 20px;
        color: #fff;
        text-transform: uppercase; /* Capitalize the text */
        width: 20%; 
    }
</style>

<header class="masthead">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-lg-3 glass-effect">
                <div class="card-body p-4">
                    <img src="{{ asset('img/logo.png') }}" alt="logo" width="100" class="mx-auto mb-5 d-flex justify-content-center">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf <!-- Include the CSRF token -->
                        <div class="mb-4">
                            <label for="email" class="form-label text-white">Email</label>
                            <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label text-white">Password</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark glass-button mt-4">Login</button>
                    </form>
                    <!-- Forgot Password link -->
                    <a href="{{ route('password.request') }}" class="text-white mt-2">Forgot Password?</a>
                </div>
            </div>
            <div class="col-12 mt-3">
                <x-flash-message />
            </div>
        </div>
        <!-- Container for center-aligning the button with the form -->
        <div class="d-flex justify-content-center">
            <!-- Back to Home button centered in the middle -->
            <button type="submit" class="back-button mt-4"><a href="/" style="text-decoration: none; color: white;">Back to Home</a></button>
        </div>
    </div>
</header>

@endsection
