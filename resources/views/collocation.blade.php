@extends('layouts.master')

@section('content') 
  <!-- End Header -->
  
  <!-- Start Map-Wrapper -->
  
  
  <!-- Start Main-Content -->
  <div id="listing-page" class="main-content">
    <div class="container">
    
      <!-- Start Page-Content -->
      <div class="page-content">

        <h5 class="listing-title">Category - Collocation</h5>
        <div class="row">   
             @foreach($annonces as $annonce)
             <div class="listing-box col-lg-4 col-md-4 col-sm-4">
   
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
                @if($annonce->images()->count() > 0)
                 <img src="{!! url('images/'.$annonce->images->first()->id)!!}" alt="">
                @else
                  <img src="" alt="">
                @endif
              <div class="overlay-shadow">
                <div class="overlay-content">
                  <a href="{!! url('/aboutannonce',$annonce->id) !!}" class="btn"><i class="fa fa-arrow-circle-right"></i>Read More</a>
                </div>
              </div>
            </div>
            <div class="gray-bottom">
              <h6 class="company-title"><a href="#">{{  $annonce->short_desc }}</a></h6>
              <ul class="company-tags custom-list clearfix">
                <li>Ajouté le : {{ $annonce->created_at }}</a></li>
              </ul>
            </div>
          </div>
         
          @endforeach
          
        </div>
        </div>
        
      <!-- End Page-Content -->
  
    
  
  <!-- End Main-Content -->

@endsection
