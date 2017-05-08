<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../favicon.ico" rel="icon">

    <title>@yield('title')</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap-theme.min.css') }}" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified jQuery -->
    <script src="{{ asset('plugins/jquery/js/jquery-3.2.1.min.js') }}"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  

  </head>

  <body>
  <script type="text/javascript">
        $(document).ready(function () {
            //Hide all alerts in 5 seconds that didnt had ->important() funciton
            $('div.alert').not('.alert-important').delay(5000).fadeOut(350);
            @yield('scripts')
        });
    </script>
  @include('template.partials.menu')
  @yield('nav_bar')

    <div class="container">
    @include('flash::message')
    @yield('content')
      
    </div><!-- /.container -->

    @include('template.partials.footer')
 

</body></html>