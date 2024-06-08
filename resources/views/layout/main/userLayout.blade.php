<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="OneStop, Online, Marketplace, e-commerce, onestop, digital marketing" />
    <meta name="developer" content="AbdulForTech" />
    <meta name="developer_website" content="www.abdulfortech.com" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Favicon -->
    {{-- <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" />
    <link href="{{ asset('img/bg-blue.jpeg') }}" rel="icon"> --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="{{ asset('app/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('app/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="{{ asset('app/assets/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('app/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('app/assets/css/argon-design-system.css?v=1.2.2') }}" rel="stylesheet" />
    <link href="{{ asset('app/assets/css/navbar.css') }}" rel="stylesheet" />
    {{-- <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NBMJ3RLJKQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-NBMJ3RLJKQ');
    </script> --}}
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('app/assets/css/toastr.css') }}">
    <link href="{{ asset('app/assets/css/style.css') }}" rel="stylesheet" />
    <style>
        .banner-preview {
            width: 400px;
            height: 150px;
            border: 2px solid #ddd;
            background-size: cover;
            background-position: center;
        }
        .logo-preview {
            width: 150px;
            height: 150px;
            border: 2px solid #ddd;
            border-radius: 50%;
            background-size: cover;
            background-position: center;
        }

    body{background-color: #fff;}
    </style>
</head>

<body class="profile-page">
        @yield('contents')

    <!-- service notification -->
    <div class="modal" id="serviceNotification">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Service Notification</h4>
                    <!-- <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <p><span class="fw-bold">We are sorry</span> to notify you that this service is not currently available, but we are working to solve the problems and we will activate it as soon as possible.</p>
                    <center>
                        <a href="/user/dashboard" type="button" class="btn btn-primary" id="">Okay</a>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="closeModal('serviceNotification')">Close</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('app/assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{ asset('app/assets/js/plugins/bootstrap-switch.js') }}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('app/assets/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app/assets/js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('app/assets/js/plugins/datetimepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app/assets/js/plugins/bootstrap-datepicker.min.js') }}"></script>
    <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('app/assets/js/argon-design-system.js') }}?v=1.2.2" type="text/javascript"></script>
    <script src="{{ asset('app/assets/js/navbar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app/assets/js/single.js') }}"></script>
    {{-- <script src="{{ asset('app/assets/vendors/DataTables/datatables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/vendors/select2-bootstrap-5-theme/docs/assets/js/docs.js') }}"></script> --}}
    {{-- <script src="{{ asset('app/assets/vendors/select2/dist/js/select2.full.min.js') }}"></script> --}}
    <!-- Toastr js -->
    <script src="{{ asset('app/assets/js/toastr.js') }}"></script>

    @if (session()->has('message'))
    <script>
        toastr.info("{{ session('message') }}");
    </script>
    @endif
  <script>
    function scrollToDownload() {

      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
    //   toastr.success('Success message!', 'Success');
    function formatNumber(number) {
        return new Intl.NumberFormat().format(number);
    }
    function closeModal(modal) {
        $('#' + modal).hide();
    }
    function closeModal2(modal) {
        $('#' + modal).modal("hide");
    }
  </script>
   @stack('script')

</body>

</html>
