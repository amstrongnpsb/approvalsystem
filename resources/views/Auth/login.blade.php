<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{URL::asset('appimgs/app-logo.png')}}" type="image/icon type">
    <title>Approval System - {{ $title }}</title>
    <link href="{{URL::asset('css/styles.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"  rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
</head>

<body>
    <div class="container-fluid min-vh-100 p-3 text-light w-50 position-relative font-monospace ">
        <div
            class="w-50 m-auto bg-light h-80 text-dark p-3 rounded-2 position-absolute top-50 start-50 translate-middle">
            <h3 class="fw-bold mb-3">Login Form</h3>
            <form action="{{ route('auth') }}" method="POST">
            @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="name@example.com value=" {{ old('email') }}" autofocus required">
                    <label for="email">Email address</label>
                </div>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        required>
                    <label for="password">Password</label>
                </div>
                <button type="submit" class="btn btn-dark btn-block mb-4 ">Sign in</button>
                <div class="text-center">
                    <p>Dont have an account? <a href="{{ route('register') }}">Register</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{URL::asset('js/toaster.js')}}"></script>
    <script>
        $(document).ready(function () {
            toastr.options.timeOut = 10000;
            @if (Session:: has('error'))
        toastr.error('{{ Session::get('error') }}');
        @elseif(Session:: has('success'))
        toastr.success('{{ Session::get('success') }}');
        @endif
            });

    </script>
</body>

</html>