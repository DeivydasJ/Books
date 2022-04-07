<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Books Database</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    </head>
    <body>
@include('_partials.top-nav')
            <!-- Top navigation-->
        <div class="d-flex" id="wrapper">
            
            <!-- Sidebar-->
            @include('_partials.sidebar')

            <div id="page-content-wrapper">

                <!-- Page content-->

        @yield('content')

            </div>
        </div>

        <!-- Bootstrap core JS-->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Core theme JS-->

        <script src="{{asset('js/scripts.js')}}"></script>

    </body>
</html>