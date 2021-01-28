<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Admin Template</title>

    <!-- vendor css -->
    <link href="{{asset('adminbackend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('adminbackend/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('adminbackend/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('adminbackend/lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('adminbackend/css/starlight.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

  </head>

  <body>

        @include('admin.body.sidebar')
        @include('admin.body.header')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Admin</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>

        @yield('admin')

        @include('admin.body.footer')

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="{{asset('adminbackend/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('adminbackend/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('adminbackend/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('adminbackend/lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('adminbackend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('adminbackend/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('adminbackend/lib/d3/d3.js')}}"></script>
    <script src="{{asset('adminbackend/lib/rickshaw/rickshaw.min.js')}}"></script>
    <script src="{{asset('adminbackend/lib/chart.js/Chart.js')}}"></script>
    <script src="{{asset('adminbackend/lib/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('adminbackend/lib/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('adminbackend/lib/Flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('adminbackend/lib/flot-spline/jquery.flot.spline.js')}}"></script>

    <script src="{{asset('adminbackend/js/starlight.js')}}"></script>
    <script src="{{asset('adminbackend/js/ResizeSensor.js')}}"></script>
    <script src="{{asset('adminbackend/js/dashboard.js')}}"></script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;

        case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;

        case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;

        case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
    }
    @endif
    </script>
    
  </body>
</html>
