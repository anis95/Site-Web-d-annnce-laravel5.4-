@extends('layouts.master')
@section('content') 
 
    <div class="container">
      <div class="row">
  <!-- End Header -->
    
  <!-- Start Page-Heading   -->
  
    <div class="container">
      <h5>Catégory Immobilier</h5>
      <ul class="breadcrumbs custom-list">
        <li><a href="/">Accueil</a></li>
       
      </ul>
    </div>
  
  <!-- End Page-Heading -->

  <!-- Start Main-Content -->
  <div id="about" class="main-content">
    <div class="container">
      <div class="row">
        
        <!-- Start Page-Content -->

        <div class="page-content">

          <!-- Start Team -->

  
          <div class="team">
          @foreach($annonces as $annonce)
            <div class="person col-lg-4 col-md-4 col-sm-6">
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
              <div class="caption">
                <h5 class="name">{{  $annonce->short_desc }}</h5>
                <h6 class="position">Ajouté le : {{ $annonce->created_at }}</h6>
                
              </div>
            </div>
            @endforeach
            </div>
            
          </div>

          <!-- End Team -->

        
        <!-- End Page-Content -->
        
      </div>
    </div>
  </div>
  <!-- End Main-Content -->
</div>
</div>

  <!-- Start Footer -->
@endsection