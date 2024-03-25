<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Webprog.ir - @yield('title')</title>

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <style>
.filter-option-inner-inner {
    text-align: right;
}

.bootstrap-select > button {
    color: #6e707e;
    background-color: #fff;
    border-color: #d1d3e2;
}

.bootstrap-select > button:not(:disabled):not(.disabled):active,
.bootstrap-select > button:not(:disabled):not(.disabled).active,
.show > .btn-light.dropdown-toggle {
    color: #6e707e;
    background-color: #fff;
    border-color: #d1d3e2;
}

.bootstrap-select > button:focus,
.bootstrap-select > button.focus {
    color: #6e707e;
    background-color: #fff;
    border-color: #d1d3e2;
    box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
}

.bootstrap-select .dropdown-menu li {
    text-align: right;
}

.bootstrap-select.show-tick .dropdown-menu li a span.text{
    margin-right: 10px;
}

 </style>
 <link href="{{ asset('css/jquery.md.bootstrap.datetimepicker.style.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.sections.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.sections.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                   @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('admin.sections.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    @include('admin.sections.scroll_top')

    <!-- JavaScript -->
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/files/jquery.czMore-latest.js') }}"></script>

    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    <script src="{{ asset('js/files/jquery.md.bootstrap.datetimepicker.js') }}"></script>
    @yield('script')
</body>

</html>
