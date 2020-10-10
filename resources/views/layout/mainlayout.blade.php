<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    @include('layout.partials.head')
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('layout.partials.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->

            <div id="content">
                <div class="container-fluid">

                    {{-- @include('layout.partials.header') --}}

                    @yield('content')


                </div>  <!-- /.container-fluid -->

            </div> <!-- End of Main Content -->

            @include('layout.partials.footer')

        </div> <!-- End of Content Wrapper -->
    </div> <!-- End of Page Wrapper -->

    @include('layout.partials.footer-scripts')
</body>

</html>
