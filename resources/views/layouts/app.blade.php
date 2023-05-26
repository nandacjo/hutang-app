<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

    <title> Warung Unyak | @yield('title') </title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link href={{ asset('assets/css/app.css') }} rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        @include('layouts.base.sidebar')

        <div class="main">
            @include('layouts.base.navbar')

            <main class="content">
                @include('flash::message')
                <!-- Menampilkan semua error di laravel-->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="container-fluid p-0">
                    @yield('content');

                </div>
            </main>

            @include('layouts.base.footer')
        </div>
    </div>


    <script src={{ asset('assets/js/app.js') }}></script>
    @yield('js')
</body>

</html>
