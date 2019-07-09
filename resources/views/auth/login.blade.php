<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- custom css --}}
    <style>
        html,
        body {
            color: #7f8c8d !important;
            font-family: 'Nunito', sans-serif !important;
            font-weight: 200 !important;
            width: 100% !important;
            margin: 0 !important;
            padding-top: 8% !important;
        }

        a:link {
            text-decoration: none !important;
        }

        .title {
            font-size: 5.5rem;
            text-align: right;
        }

        .m-b-md {
            margin-bottom: 0;
        }

        hr {
            margin-top: 0;
        }

        .row,
        .form-group {
            margin-bottom: 0 !important;
        }

        .form-control {
            font-family: 'Nunito', sans-serif !important;
            font-weight: 200 !important;
        }

        .input-group-append span {
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
        }

        .form-check {
            text-align: right;
            margin-bottom: 0.5rem !important;
        }

        .form-check label {
            font-size: 0.8rem;
            text-decoration: underline;
            text-align: right;
        }

        #btn-submit {
            padding-right: 5px !important;
        }

        #btn-cancel {
            padding-left: 5px !important;
        }

        @media only screen and (max-width: 768px) {
            body {
                padding-top: 40% !important;
            }

            .title {
                font-size: 2.5rem;
                text-align: center;
            }

            #btn-submit,
            #btn-cancel {
                padding-right: 15px !important;
                padding-left: 15px !important;
                margin-bottom: 10px !important;
            }
        }
    </style>
</head>

<body>
    <div class="col-md-6 offset-md-3">
        <div class="title m-b-md">
            {{ config('app.name') }}
        </div>
        <hr>
        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf
            <div class="form-group row">
                <div class="col-md-6 offset-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-6">
                    <div class="form-check">
                        <label class="form-check-label" for="remember">
                            {{ __('forgot password?') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-6">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
