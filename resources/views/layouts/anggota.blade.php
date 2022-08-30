<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kadigi</title>
        @stack('addon-styles')
        @include('includes.anggota.styles')
    </head>
    <body class="sb-nav-fixed">
        @include('includes.anggota.navbar')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('includes.anggota.sidebar')
            </div>
            <div id="layoutSidenav_content">
                <main>
                   @yield('content')
                </main>
                @include('includes.anggota.footer')
            </div>
        </div>
        @include('sweetalert::alert')
       @include('includes.anggota.scripts')
       @stack('addon-scripts')
    </body>
</html>
