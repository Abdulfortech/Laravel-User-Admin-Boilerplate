<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('admin/assets/img/favicon.png') }}">
  <title>
    @yield('title')
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css" rel="stylesheet') }}" />
  <link href="{{ asset('assets/css/nucleo-svg.css" rel="stylesheet') }}" />
  <!-- Font Awesome Icons -->
  <!-- <script src="https://kit.fontawesome.com/42d5adcbca.js') }}" crossorigin="anonymous"></script> -->
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('admin/assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/toastr.css') }}">
</head>

<body class="">
    @yield('contents')
    
  <!--   Core JS Files   -->
  <script src="{{ asset('admin/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <!-- <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script> -->
  <!-- Github buttons -->
  <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('admin/assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
  <script src="{{ asset('admin/assets/js/jquery-3.7.0.min.js') }}"></script>
  <!-- <script src="{{ asset('admin/assets/js/login.js') }}"></script> -->
  <!-- Toastr js -->
   <script src="{{ asset('admin/assets/js/toastr.js') }}"></script>
  @if (session()->has('message'))
   <script>
            toastr.info("{{ session('message') }}");        
    </script>
    @endif
 @stack('script')
</body>

</html>