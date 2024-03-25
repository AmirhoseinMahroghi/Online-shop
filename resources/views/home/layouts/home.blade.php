<!DOCTYPE html>
<html class="no-js" lang="fa">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('home/assets/img/favicon.png') }}" />

    <title>Mahroghi.ir - @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('home/assets/css/bootstrap.min.css') }}" />
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('home/assets/css/icons.min.css') }}" />
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('home/assets/css/plugins.css') }}" />
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('home/assets/css/style.css') }}" />
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    @yield('style')

    {!! SEO::generate() !!}

    {{-- Preloading  CSS --}}
    <style>
        /*PRELOADING------------ */
        #overlayer {
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: 10000;
            background: #807f7f;
        }

        .loader {
            display: inline-block;
            width: 30px;
            height: 30px;
            position: fixed;
            z-index: 20000;
            border: 4px solid #fff;
            top: 50%;
            animation: loader 2s infinite ease;
        }

        .loader-inner {
            vertical-align: top;
            display: inline-block;
            width: 100%;
            background-color: #fff;
            animation: loader-inner 2s infinite ease-in;
        }

        @keyframes loader {
            0% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(180deg);
            }

            50% {
                transform: rotate(180deg);
            }

            75% {
                transform: rotate(360deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes loader-inner {
            0% {
                height: 0%;
            }

            25% {
                height: 0%;
            }

            50% {
                height: 100%;
            }

            75% {
                height: 100%;
            }

            100% {
                height: 0%;
            }
        }
    </style>
</head>

<body>

    <!-- Page Wrapper -->
    <div class="wrapper text-center">

        {{-- Preloading  Div --}}
        <div id="overlayer"></div>
        <span class="loader">
            <span class="loader-inner"></span>
        </span>





        @include('home.sections.header')

        @include('home.sections.mobile_off_canvas')

        @yield('content')

        @include('home.sections.footer')


    </div>

    <!-- jQuery JS -->
    <script src="{{ asset('home/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('home/assets/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('home/assets/js/bootstrap.min.js') }}"></script>
    <!-- Plugins JS -->
    <script src="{{ asset('home/assets/js/plugins.js') }}"></script>
    <!-- Ajax Mail -->
    <script src="{{ asset('home/assets/js/ajax-mail.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('home/assets/js/main.js') }}"></script>
    <!-- rating star -->
    <script src="{{ asset('home/files/rating.js') }}"></script>

    @include('sweetalert::alert')
    @yield('script')

    {{-- Preloading  jQuery --}}
    <script>
        $(window).load(function() {
            $(".loader").delay(1500).fadeOut("slow");
            $("#overlayer").delay(1500).fadeOut("slow");
        })
    </script>

    {!! GoogleReCaptchaV3::init() !!}
</body>

</html>
