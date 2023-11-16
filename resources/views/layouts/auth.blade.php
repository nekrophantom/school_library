<!doctype html>
<html lang="en">

<head>
    <title>@yield('title', $title ?? config('app.name'))</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    @stack('css')

    <style>
        html,
        body {
            height: 100%;
            background-color: #f1f2f6;
        }

        main {
            padding-top: 10%;
        }

        .form-signin {
            border-radius: 10px;
            background-color: #ffff;
            max-width: 500px;
            padding: 2rem;
            box-shadow: 2px -2px 25px 0px rgba(151, 151, 151, 0.75);
            -webkit-box-shadow: 2px -2px 25px 0px rgba(151, 151, 151, 0.75);
            -moz-box-shadow: 2px -2px 25px 0px rgba(151, 151, 151, 0.75);
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .tagline {
            font-size: 1.5rem;
        }
    </style>

</head>

<body>
    <main>
        @yield('content')
    </main>
    <footer>
        @include('layouts.footer')
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    @include('sweetalert::alert')
    <script src="{{ asset('vendor/jquery/jquery-3.7.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    @stack('js')
</body>

</html>
