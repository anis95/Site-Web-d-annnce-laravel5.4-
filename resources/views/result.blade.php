@extends('layouts.master')
@section('content') 
  <!-- End Header -->
  
  <!-- Start Map-Wrapper -->
  <div class="map-wrapper">

    <!-- Start Map Search -->
    <div class="map-search">
      <div class="container">
        
        <!-- Start Search-Shadow -->
        <div class="search-shadow"></div>
        <!-- End Search-Shadow -->

        <!-- Start Select-Button -->
        <span class="select-button">
          <button class="advanced-search-button">
            <i class="fa fa-align-justify"></i>
          </button>
        </span>
        <!-- End Select-Button -->
        
        <!-- Start Form -->
       <form action="{!! url('/') !!}" class="default-form search-bar">
          <span class="company_name">
            <input type="text" placeholder="recherche dans le map" name="address" value="{!! Request::get('address') ? Request::get('address') : '' !!}">
          </span>


        
        


          <span class="submit-btn">
            <button class="btn btn-secondary full-width"><i class="fa fa-search"></i>Search Now</button>
          </span>
        </form>
        <!-- End Form -->
      </div>

      <!-- Start Advanced-Search -->
     
      <!-- End Advanced-Search-Inner -->
    </div>
    <!-- End Map Search -->
    
    <!-- Start Map Canvas -->
    <div id="map_canvas_wrapper">
      <div id="map_canvas"></div>
    </div>
    <!-- End Map Canvas -->

    <!-- Start Map Control -->
    <div class="map-control">
      <a href="#" class="btn btn-secondary full-width"><i class="fa fa-chevron-circle-up"></i><span>Hide Map</span></a>
    </div>
    <!-- End Map Control -->

    <!-- Start Map Industries-Filters -->
   
    <!-- End Map Industries-Filters -->

  </div>
  <!-- End Map-Wrapper -->
  
  <!-- Start Welcome-Text -->
  
  <!-- End Welcome-Text -->
  
  <!-- Start Main-Content -->
  <div class="main-content">
        
    <!-- Start Categories-List -->
    <div class="categories list">
      <div class="container">
        <div class="row">

         <div class="category-box col-lg-4 col-md-4 col-sm-6">
            <header class="category-header realestate clearfix">
              <a href="#">
                <div class="category-icon"><i class="fa fa-home"></i></div>
                <div class="category-title">
                  <h5>Immobilier</h5>
                 
                </div>
              </a>
            </header>
            <div class="category-list">
              <ul class="custom-list">
                <li><a href="#">Location</a></li>
                <li><a href="#">Sous-Location</a></li>
                <li><a href="#">Collocation</a></li>
                <li><a href="#">échange</a></li>
                <li><a href="#" class="text-center"><i class="fa fa-arrow-circle-right"></i> View All</a></li>
              </ul>
            </div>
          </div>

 <div class="category-box col-lg-4 col-md-4 col-sm-6">
            <header class="category-header garden clearfix">
              <a href="#">
                <div class="category-icon"><i class="fa fa-leaf"></i></div>
                <div class="category-title">
                  <h5>Lieux des cultes</h5>
                  
                </div>
              </a>
            </header>
            
          </div>

          <div class="category-box col-lg-4 col-md-4 col-sm-6">
            <header class="category-header education clearfix">
              <a href="#">
                <div class="category-icon"><i class="fa fa-users"></i></div>
                <div class="category-title">
                  <h5>école et centre educatif</h5>
              
                </div>
              </a>
            </header>
           
          </div>

         

          
          
          <div class="category-box col-lg-4 col-md-4 col-sm-6">
            <header class="category-header restaurant clearfix">
              <a href="#">
                <div class="category-icon"><i class="fa fa-coffee"></i></div>
                <div class="category-title">
                  <h5>Restaurant & café</h5>
                  
                </div>
              </a>
            </header>
            
          </div>



           <div class="category-box col-lg-4 col-md-4 col-sm-6">
            <header class="category-header offices clearfix">
              <a href="#">
                <div class="category-icon"><i class="fa fa-briefcase"></i></div>
                <div class="category-title">
                  <h5>Services et centre administratifs</h5>
              
                </div>
              </a>
            </header>
            
          </div>

          

         
          
        </div>
      </div>
    </div>
    <!-- End Categories-List -->
    
    <!-- Start Companies-Sliders -->
     <!-- Start Companies-Sliders -->
    <div class="companies-sliders">
      <div class="container">

        <!-- Start Featured-Companies-Slider -->
        <h5 class="companies-slider-title"><B>Résultat</B></h5>
        <div class="row">
          <div class="companies-slider featured">
          

     @foreach($res as $rest)   
           
            <div class="company-box col-lg-3">
              <div class="company-rating">
                <ul class="custom-list">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
              </div>
              <div class="overlay">
                @if($rest->images()->count() > 0)
                 <img src="{!! url('images/'.$rest->images->first()->id)!!}" alt="">
                @else
                  <img src="" alt="">
                @endif
                <div class="overlay-shadow">
                  <div class="overlay-content">
                    <a href="{!! url('/aboutannonce',$rest->id) !!}" class="btn"><i class="fa fa-arrow-circle-right"></i>Read More</a>
                  </div>
                </div>
              </div>
              <div class="white-bottom">
                <h6 class="company-title"><a href="#">{{ $rest->short_desc }}</a></h6>
                <ul class="company-tags custom-list clearfix">
                  <li>Ajouté le :{{ $rest->created_at }}</a></li>
                </ul>
              </div>
            </div>
        
@endforeach

          </div>
        </div>
        </div>
        </div>
        </div>


@endsection









@push('scripts')
<script type="text/javascript">
  /* -------------------------------------------------------------------------
      MAPS
  ------------------------------------------------------------------------- */
  var $mark = [@foreach($annonces as $annonce)
      {
          latitude: {{ $annonce->latitude }},
          longitude: {{ $annonce->longitude }},
          icon: 'img/map-marker.png',
          html: '<div class="marker-ribbon"><div class="ribbon-banner"><div class="ribbon-text">Featured</div></div></div>' +
                '<div class="marker-holder">' +
                '<div class="marker-company-thumbnail"><img src="{{ $annonce->images()->count() > 0 ? url("images/".$annonce->images()->first()->id) : '' }}" alt=""><ul class="marker-action custom-list"><li class="zoom"><a href="#"><i class="fa fa-search-plus"></i></a></li class="bookmark"><li><a href="#"><i class="fa fa-bookmark"></i></a></li><li class="share"><a href="#"><i class="fa fa-share"></i></a></li> </ul></div>' +
                '<div class="map-item-info">' +
                '<h5 class="title"><a href="#">{{ $annonce->title }}</a></h5>' +
                '<ul class="rating custom-list"><li><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li><li><i class="fa fa-star"></i></li></ul>' +
                '<div class="describe">' +
                '<p class="contact-info address">{{ $annonce->lieu }}</p>' +
                '<p class="contact-info telephone">{{ $annonce->num_tel }}</p>' +
                '<p class="contact-info email">{!! $annonce->user->email !!}</p>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>'
        },
        @endforeach
        ]; 
  // MAIN MAP
  $("#map_canvas").each(function() {
    $(this).goMap({
      maptype: 'ROADMAP',
      scrollwheel: false,
      navigationControl: false,
      zoom: 5,
      markers: $mark,
      address : '{{ Request::get('address') ? Request::get('address') : 'France'}}'
    });
  });

  

  $("#main-wrapper.listing").each(function() {
    var map_width = $(window).width() - (60 + $("#main-wrapper").width());
    $("#map_canvas_wrapper").width(map_width);
  });

  $(window).resize(function(){
    var map_width = $(window).width() - (60 + $("#main-wrapper").width());
    $("#main-wrapper.listing #map_canvas_wrapper").width(map_width);
  });

  /* -------------------------------------------------------------------------
      HIDE/SHOW MAP
  ------------------------------------------------------------------------- */
  jQuery(".map-control").click(function() {
    var wrapper = $("#map_canvas_wrapper");
    if($(this).hasClass("active")){
      $(this).removeClass("active");
      wrapper.animate({"height": mapHeight}, "slow");
      $(this).find('a.btn>i.fa').removeClass("fa-chevron-circle-down");
      $(this).find('a.btn>i.fa').addClass("fa-chevron-circle-up");
      $(this).find('a.btn>span').text("Hide map");
    } else{
      mapHeight = wrapper.height();
      $(this).addClass("active");
      wrapper.animate({"height": 62}, "slow");
      $(this).find('a.btn>i.fa').removeClass("fa-chevron-circle-up");
      $(this).find('a.btn>i.fa').addClass("fa-chevron-circle-down");
      $(this).find('a.btn>span').text("Show map");
      if($('.select-button button').hasClass('active')){
        $('.search-shadow').fadeToggle("slow");
        $('.select-button button').toggleClass('active');
        $AdvancedSearchToggle.slideToggle("slow");
      }
    }
    return false;
  });
</script>
@endpush()