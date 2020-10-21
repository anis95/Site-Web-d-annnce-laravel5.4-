@extends('layouts.master')
@section('content') 
    <div class="container">
      <div class="row">

        <!-- Start Page-Content -->
        <div class="page-content col-lg-8 col-md-8 col-sm-8">
          
          <!-- Start Single-Post -->
          <div class="single-post">
          

          
          @if($annonce->images()->count() > 0)
<div class="w3-content w3-display-container">
@foreach($annonce->images()->get() as $image)
  <img class="mySlides" src="{!! url('images/'.$image->id) !!}" style="width: 750px;height: 454px;">
@endforeach
  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>
@endif

  <div class="ad-info paper clearfix mdl-shadow--2dp">

                    <div class="mdl-grid params">
                        
                        <div class="param-container">
                       
                          <div class="mdl-grid">
                          <HR  size=8 width="100%">
                          <strong><font color="#318CE7">Catégorie&nbsp;&nbsp;&nbsp;</font></strong>
                          <div itemprop="description" class="body-text">

                          {!! $annonce->categories->name !!}
                           <br>
                          </div>
                          </div>


                           <div class="mdl-grid">
                          <HR  size=8 width="100%">
                          <strong><font color="#318CE7">Région&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></strong>
                          <div itemprop="description" class="body-text">

                          Paris
                           <br>
                          </div>
                          </div>

                           <div class="mdl-grid">
                          <HR  size=8 width="100%">
                          <strong><font color="#318CE7">Adresse&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></strong>
                          <div itemprop="description" class="body-text">

                          {!! $annonce->lieu !!}
                           <br>
                          </div>
                          </div>   

                            <div class="mdl-grid">
                          <HR  size=8 width="100%">
                          <strong><font color="#318CE7">Titre&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></strong>
                          <div itemprop="description" class="body-text">

                          {!! $annonce->title !!}
                           <br>
                          </div>
                          </div>   

                            <div class="mdl-grid">
                          <HR  size=8 width="100%">
                          <strong><font color="#318CE7">Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></strong>
                          <div itemprop="description" class="body-text">

                          {!! $annonce->date_debut !!}
                           <br>
                          </div>
                          </div>   

                            <div class="mdl-grid">
                          <HR  size=8 width="100%">
                          <strong><font color="#318CE7">Prix&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></strong>
                          <div itemprop="description" class="body-text">

                          {!! $annonce->prix !!}
                           <br>
                          </div>
                          </div>   

                            <div class="mdl-grid">
                          <HR  size=8 width="100%">
                          <strong><font color="#318CE7">Téléphone&nbsp;&nbsp;&nbsp;</font></strong>
                          <div itemprop="description" class="body-text">

                          {!! $annonce->num_tel !!}
                           <br>
                          </div>
                          </div>   




                        </div>
 
                     <div class="mdl-grid">
                        <HR  size=8 width="100%">
                        <div itemprop="description" class="body-text">
                       <strong>{!! $annonce->description !!}</strong>
                           <br>
                        </div>
                    </div>
              
              @if(Auth::check())
               @if(Auth::user()->id == $annonce->user_id)
               <HR  size=8 width="100%" >
                <table border="0" width=100%>
                     <div class="paper actions">
                    
                           
                     <tr><td align="center"><a href="/essaiDeposer/{{ $annonce->id }}" class="btn btn-primary"> Modifier annonce</a>
                        <HR> 
                         </td>
                        
                        <td align="center">{!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['AnnonceSupprimer.destroy', $annonce->id ,]
                        ]) !!}
                        {!! Form::submit('Supprimer annonce', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!} 
                      
                        <HR></td> </tr>

                    </div>
                    

                </table>   
                   
            @endif
          @endif   

                  
                        
      </div>
</div>                    
                   
                
            <div id="comment" class="single-post-comments clearfix">
              <h5 class="title">Les Commentaires :</h5>
     
              <ul class="comments custom-list">
                <li>
                @if(Session::has('flash_com'))
                     <div class="alert alert-success">
                     {{ Session::get('flash_com') }}
                @endif
                 <?php

                    $comment = DB::table('comments')->get();
                     foreach($comment as $com){
                      $NomUser = DB::table('users')->whereId($com->user_id)->pluck('name')->first();
                    if($com->annonce_id == $annonce->id)
                    {
                      echo'
                    
                    <div class="post-comment-meta">
                      <span><a href="#" >'.$NomUser.'</a></span>
                      <span>'.$com->created_at.'</span>
                      
                     
                       
                    </div>
                    <div class="post-comment-content">
                      <p>'.$com->content.'</p>
                    </div>
                    ';}}
                    
                     
                   
                  
                      ?> 
                    </li>
                 </div>

                  
            <div class="reply-form clearfix">
              <h5 class="title"><strong>Commenter</strong></h5>
              <div class="reply-form-box clearfix">
                <form action="{!! url('/PostComment', $annonce->id) !!}" class="default-form">
                  
                    <div class="col-lg-12">
                    <p class="form-row">
                      <textarea placeholder="Votre Comentaire" name="content"></textarea>
                    </p>
                  </div>
                  <div class="col-lg-12">
                   @if(Auth::check())
                      <input name="user_id" hidden="hidden" value="{!! Auth::user()->id !!}" > 
                      
                      @endif
                      <input name="annonce_id" hidden="hidden" value="{!! $annonce->id !!}" > 
                    <button class="btn btn-secondary">
                      <i class="fa fa-sign-out"></i>
                      Commenter
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- End Single-Post -->

        </div>
        <!-- End Page-Content -->

        <!-- Start Sidebar-Content -->
        <div class="sidebar-content col-lg-4 col-md-4 col-sm-4">
          
         
          
          <!-- Start Categories-Links -->
          <div class="categories-links clearfix">
            <h5 class="title">Categories</h5>
            <ul cclass="dropdown-menu">
             <li class="dropdown"><a href="{{ URL('/PageImmobilier') }}">Immobilier</a></li>
             <h5 class="title">Sous Categories</h5>
              <ul cclass="dropdown-menu">
              <li class="dropdown"><a href="{{ URL('/location') }}">Location</a></li>
              <li class="dropdown"><a href="{{ URL('/souslocation') }}">Sous-Location</a></li>
              <li class="dropdown"><a href="{{ URL('/Colocation') }}">Collocation</a></li>
              <li class="dropdown"><a href="{{ URL('/echange') }}">échange</a></li>
              </ul>
             
            </ul>

          </div>
          <!-- End Categories-Links -->

            <!-- Start Message Us -->
                  <div class="message-us">
                    <h5 class="title">Contactez nous</h5>
                    <form action="{!! url('/SendMessage') !!}" class="default-form">
                     @if(Session::has('flash_message'))
                     <div class="alert alert-success">
                     {{ Session::get('flash_message') }}
                       @endif
                      <p class="form-row">
                        <input type="text" placeholder="Objet" name="subject" required>
                      </p>
                      <p class="form-row">
                        <textarea placeholder="Comment on peut vous aider ?" name="content" required></textarea>
                      </p>
                      @if(Auth::check())
                      <input name="user_id" hidden="hidden" value="{!! Auth::user()->id !!}" > 
                      @endif
                    
   
                      <button class="btn btn-secondary full-width">
                        <i class="fa fa-arrow-circle-right"></i>
                        Envoyer Message
                      </button>
                     
                    </div>
                      
                    </form>
                  </div>
                  <!-- End Message Us -->

        
        <!-- End Sidebar-Content -->

      </div>

    </div>
  </div>
  

  <!-- End Main-Content -->
@endsection
@push('scripts')

 <script>
  
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
  
</script>
@endpush