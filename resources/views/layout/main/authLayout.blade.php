<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
   <title>@yield('title')</title>

   <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('app/assets/img/logo.png') }}" />

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
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('app/assets/css/toastr.css') }}">
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-NBMJ3RLJKQ"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-NBMJ3RLJKQ');
  </script>
</head>

<body class="index-page">
    @yield('contents')


   <!-- core Script -->
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
   <!--  Google Maps Plugin    -->
   {{-- <script src="{{ asset('app/assets/js/argon-design-system.min.js?v=1.2.2') }}" type="text/javascript"></script> --}}
    <!-- Toastr js -->
    <script src="{{ asset('app/assets/js/toastr.js') }}"></script>
   <script>
      // :: 10.0 Search Box Active Code
     $('#searchIcon').on('click', function(){
         $('.search-form').toggleClass('search-active');
     });
     $('.closeIcon').on('click', function(){
         $('.search-form').removeClass('search-active');
     });
     function scrollToDownload() {

       if ($('.section-download').length != 0) {
         $("html, body").animate({
           scrollTop: $('.section-download').offset().top
         }, 1000);
       }
     }
   </script>

   @if (session()->has('message'))
   <script>
            toastr.info("{{ session('message') }}");
    </script>
    @endif
   @stack('script')

</body>

</html>
