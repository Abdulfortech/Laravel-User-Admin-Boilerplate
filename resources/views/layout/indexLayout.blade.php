
<!doctype html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="AA Rasheed Data, Data, Airtime, bulk sms, cable subscription" />
    <meta name="developer" content="Shahuci Global Resources" />
    <meta name="website" content="www.sgr.com.ng" />
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/bg-blue.jpeg') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/bg-blue.jpeg') }}">
    <link rel="icon" type="image/jpeg" href="{{ asset('img/bg-blue.jpeg') }}">
    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ asset('app/assets/css/core/libs.min.css') }}" />
    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ asset('app/assets/css/hope-ui.min.css?v=2.0.0') }}" />
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('app/assets/css/toastr.css') }}">
    <!-- FontAwesome 5-->
    <link href="{{ asset('general/fortawesome/font-awesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet" type="text/css">

    <style>
        .flex-box {
            width: 100px;
            height: 100px;
            margin: 5px;
            border-radius: 10px;
        }
        .hidden {
            display: none;
        }
    </style>
</head>

<body class="  ">
        @yield('contents')


   <!-- Library Bundle Script -->
   <script src="{{ asset('app/assets/js/core/libs.min.js') }}"></script>
   <!-- External Library Bundle Script -->
   <script src="{{ asset('app/assets/js/core/external.min.js') }}"></script>
   <!-- Settings Script -->
   <script src="{{ asset('app/assets/js/plugins/setting.js') }}"></script>
   <!-- App Script -->
   <script src="{{ asset('app/assets/js/hope-ui.js') }}" defer></script>
   <!-- Toastr js -->
   <script src="{{ asset('app/assets/js/toastr.js') }}"></script>

   @if (session()->has('message'))
   <script>
            toastr.info("{{ session('message') }}");
    </script>
    @endif

   <script>
    //   toastr.success('Success message!', 'Success');
    function formatNumber(number) {
        return new Intl.NumberFormat().format(number);
    }
    function closeModal(modal) {
        $('#' + modal).hide();
    }
   </script>
   @stack('script2')

</body>

</html>
