<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">


      <title>Tunisien En France</title>

      <!-- Stylesheets -->
      <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
      <link rel="stylesheet" href="{!! asset('css/tayara.css') !!}">
      <link rel="stylesheet" href="{!! asset('css/owl.carousel.css') !!}"> 
      <link rel="stylesheet" href="{!! asset('css/button_succes.css') !!}"> 
      <link rel="stylesheet" href="{!! asset('css/slider_image.css') !!}">
      <link rel="stylesheet" href="{!! asset('css/ImageSlider.css') !!}">
      <link rel="stylesheet" href="{!! asset('css/bootstrap/bootstrap/bootstrap.css') !!}">
    
      
       
      
      <!-- Google Font -->
      <link href='//fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

      <!--[if IE 9]>
        <script src="js/media.match.min.js"></script>
      <![endif]-->
</head>
<body>
  <div id="main-wrapper" class="boxed">
    @include('sections.header')
    <div id="blog" class="main-content">
      @yield('content')

      @include('sections.footer')
      
    </div>
  </div>

<!-- Scripts -->
<script src="{!! asset('js/jquery-1.9.1.min.js') !!}"></script>
<script src="{!! asset('//maps.google.com/maps/api/js?sensor=true') !!}"></script>
<script src="{!! asset('css/bootstrap/bootstrap/bootstrap.min.js') !!}"></script>
<script src="{!! asset('js/gomap.js') !!}"></script>
<script src="{!! asset('js/scripts.js') !!}"></script>
<script src="{!! asset('js/owl.carousel.min.js') !!}"></script>
<script src="{!! asset('js/jquery-ui.js') !!}"></script>
<script src="{!! asset('js/jquery.tweet.js') !!}"></script>
<script src="{!! asset('js/jflickrfeed.min.js') !!}"></script>
<script src="{!! asset('js/jquery.matchHeight-min.js') !!}"></script>
<script src="{!! asset('js/jquery.ba-outside-events.min.js') !!}"></script>
<script src="{!! asset('js/gmap3.min.js') !!}"></script>


<script type="text/javascript">
  @if(Session::has('flash_message'))
          $('#flash').modal('show');
  @endif
  @if(Session::has('alert_message'))
          $('#flash_alert').modal('show');
  @endif
</script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
</script>


@stack('scripts')

</body>
</html>
