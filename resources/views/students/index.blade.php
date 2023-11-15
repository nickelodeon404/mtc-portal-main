@extends('layouts.dashboard')

@section('content')
    @include('students._sidenav')
    
    <x-panel>
        <main>
            <style>
                .welcome-message-container {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    height: 100vh;
                }

                .welcome-message {
                    font-family: 'Your-Font-Name', sans-serif;
                    font-size: 48px;
                    color: #000000;
                    background-color: #f4f4f4;
                    padding: 20px 40px;
                    border-radius: 20px;
                    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                    text-align: center;
                }

                /* Add a fade-in animation */
                .welcome-message {
                    animation: fadeIn 2s ease-in-out, bounce 2s infinite;
                }

                @keyframes fadeIn {
                    0% {
                        opacity: 0;
                    }
                    100% {
                        opacity: 1;
                    }
                }

                @keyframes bounce {
                    0%, 20%, 50%, 80%, 100% {
                        transform: translateY(0);
                    }
                    40% {
                        transform: translateY(-20px);
                    }
                    60% {
                        transform: translateY(-10px);
                    }
                }
            </style>
            <div class="container-fluid px-4 mt-4">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="welcome-message-container">
                            <h1 class="mt-4 mb-4 welcome-message">Welcome, {{ Auth::user()->name }}!</h1>
                        </div>
                    </div>
                </div>                
            </div>
        </main>
        <x-footer />
    </x-panel>  
</style>
@endsection
