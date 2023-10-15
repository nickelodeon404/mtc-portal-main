@if (session()->has('message'))
    <div x-data="{ showMessage: true }" x-show="showMessage"
        class="alert alert-success fade show position-fixed bottom-0 end-0 p-3 text-center" role="alert"
        x-init="setTimeout(() => showMessage = false, 3000)">
        <div class="container">
            <strong>Awesome!</strong> {{ session('message') }}
        </div>
    </div>
@endif
@if ($errors->any())
    <div x-data="{ showMessage: true }" x-show="showMessage"
        class="alert alert-danger fade show position-fixed bottom-0 end-0 p-3 text-center" role="alert"
        x-init="setTimeout(() => showMessage = false, 3000)">
        <div class="container">
                @foreach ($errors->all() as $error)
                    <div class="text-sm text-decoration-none">
                        {{ $error }}
                    </div>
                @endforeach

        </div>
    </div>
@endif
