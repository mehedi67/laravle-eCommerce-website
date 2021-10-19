
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ env('APP_NAME') }} - @yield('title')</title>

    <!-- vendor css -->
    <link href="{{ asset('starlight_assets/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('starlight_assets/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('starlight_assets/lib/select2/css/select2.min.css') }}" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('starlight_assets/css/starlight.css') }}">
  </head>

  <body>
    @yield('content')
   

    <script src="{{ asset('starlight_assets/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('starlight_assets/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('starlight_assets/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('starlight_assets/lib/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('starlight_assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>

    <script src="{{ asset('starlight_assets/js/starlight.js') }}"></script>
    @yield('footer_script')

  </body>
</html>
