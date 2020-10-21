<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- Core CSS - Include with every page -->
    <link href="{!! asset('assets/plugins/bootstrap/bootstrap.css') !!}" rel="stylesheet" />
    <link href="{!! asset('assets/font-awesome/css/font-awesome.css') !!}" rel="stylesheet" />
    <link href="{!! asset('assets/plugins/pace/pace-theme-big-counter.css') !!}" rel="stylesheet" />
    <link href="{!! asset('assets/css/style.css') !!}" rel="stylesheet" />
    <link href="{!! asset('assets/css/main-style.css') !!}" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="{!! asset('assets/plugins/morris/morris-0.4.3.min.css') !!}" rel="stylesheet" />
    <link href="{!! asset('assets/plugins/dataTables/dataTables.bootstrap.css') !!}" rel="stylesheet" />
   </head>

   <body>
    <div id="wrapper">
      @include('admin.section1.header')

      @include('admin.section1.sidebar')

       @yield('content')
    
</div>
   <script src="{!! asset('assets/plugins/jquery-1.10.2.js') !!}"></script>
    <script src="{!! asset('assets/plugins/bootstrap/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/plugins/metisMenu/jquery.metisMenu.js') !!}"></script>
    <script src="{!! asset('assets/plugins/pace/pace.js') !!}"></script>
    <script src="{!! asset('assets/scripts/siminta.js') !!}"></script>
    <script src="{!! asset('assets/plugins/morris/raphael-2.1.0.min.js') !!}"></script>
    <script src="{!! asset('assets/plugins/morris/morris.js') !!}"></script>
    <script src="{!! asset('assets/scripts/dashboard-demo.js') !!}"></script>
   
</body>

</html>