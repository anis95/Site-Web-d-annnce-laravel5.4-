<!-- Start Header -->
  <header id="header">
    <div class="header-inner">

      <!-- Start Login-Shadow -->
      <div id="login-shadow"></div>
      <!-- End Login-Shadow -->

      <div class="container">

        <!-- Start Utility-Nav-->
        <nav class="utility-nav clearfix">
          <ul class="utility-user custom-list">
            <li id="login">
            @if(Auth::check())

              <a href="{{url('/')}}" class="btn btn-default">
                <i class="fa fa-user"></i>
                <span>{{Auth::user()->name}}</span>
              </a>
              <a href="{{url('/MesAnnonces')}}" class="btn btn-default">
                <i class="fa fa-user"></i>
                <span>Ma profil</span>
              </a>
            
              <a href="{{url('/Message')}}" class="btn btn-default">
                 <i class="fa fa-envelope"></i>
                   <span>Message</span>
             </a>
         
                    
          
          @else

              <a href="{{url('/login')}}" class="btn btn-default">
                <i class="fa fa-power-off"></i>
                <span>Se Connecter</span>
              </a>
              
              @endif
              
            </li>

            <li id="register">
            @if(Auth::guest())
              <a href="{{url('/register')}}" class="btn btn-default">
                <i class="fa fa-plus-circle"></i>
                <span>Créer un compte</span>
              </a>

                @else

              <a href="{{url('/logout')}}" class="btn btn-default"
              onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                                            Se déconnecter
              
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
              </a>

            

              @endif
              
            </li>

            
          </ul>

          <ul class="utility-user custom-list">
            <li id="deposer">
              <a href="{{url('/deposer')}}" class="btn btn-default">
                 <i class="fa fa-plus-circle"></i>
                   <span>Déposez Votre Annonce</span>
             </a>
            </li>
          </ul>

          
          <div class="utility-social">

            <ul class="social-inner custom-list">

             <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
              
              
            </ul>

          </div>

        </nav>
        <!-- End Utility Nav -->
        
        <!-- Start Search Nav -->
        <nav class="search-nav">
          <button class="advanced-search-button">
            <i class="fa fa-align-justify"></i>
          </button>

          <ul class="sub-menu custom-list">
            <li><a href="/PageImmobilier"><i class="fa fa-globe"></i>Immobilier </a></li>
            <li><a href="/Education"><i class="ffa fa-book"></i>Education</a></li>
            <li><a href="/Restaurant"><i class="fa fa-coffee"></i>Restaurant</a></li>
            <li><a href="/ServiceAdministratif"><i class="fa fa-briefcase"></i>service administratif</a></li>
            <li><a href="/LieudeCultes"><i class="fa fa-file-o"></i>Lieux des cultes</a></li>
          </ul>

          <form action="{{url('/search')}}" method="POST" class="default-form">

            <input type="text" name="search" placeholder="Search...">
            <button type="submit"><i class="fa fa-search"></i></button>
            {{csrf_field()}}
          </form>
        </nav>
        <!-- End Search Nav -->

        <!-- Start Menu Nav -->
        <div class="menu-nav row">

          <!-- Start Logo -->
          <div class="logo col-lg-3 col-md-3 col-sm-3 col-xs-12" style="z-index: 0;"">
              <a href="/"><img src="{!! asset('img/logoprincipal.png') !!}" alt="logo"></a>
          </div>
          <!-- End Logo -->
          
          <!-- Start Nav -->
          <nav id="nav-wrapper">
            <ul class="nav custom-list pull-right">
            <li class="has-submenu">
                <a href="/">
                     <div class="menu-square about">
                    
                  </div>
                  <span class="caption">Accueil</span>
                </a>
               
              </li>
              <li class="has-submenu">
                <a href="/PageImmobilier">
                  <div class="menu-square listing">
                    <i class="fa fa-home"></i>
                  </div>
                  <span class="caption"> Immobilier</span>
                </a>
                <ul class="sub-menu custom-list">
                  <li><a href="/location">Location</a></li>
                  <li><a href="/souslocation">Sous-Location</a></li>
                  <li><a href="/Collocation">Collocation</a></li>
                  <li class="sub-menu custom-list">
                    <a href="/echange">échange</a>
                  
                  </li>
                  </li>
                </ul>
              

              <li class="has-submenu">
                <a href="/Restaurant">
                  <div class="menu-square listing">
                    <i class="fa fa-coffee"></i>
                  </div>
                  <span class="caption">Restaurant</span>
                </a>
               
              </li>

              <li class="has-submenu">
                <a href="/Education">
                  <div class="menu-square listing">
                    <i class="fa fa-book"></i>
                  </div>
                  <span class="caption">Écoles et centre educatif</span>
                </a>
                
              </li>

              <li class="has-submenu">
                <a href="/LieudeCultes">
                  <div class="menu-square listing">
                     <i class="fa fa-leaf"></i>
                  </div>
                  <span class="caption">Lieux de cultes</span>
                </a>
                
              </li>

              <li>
                <a href="/ServiceAdministratif">
                  <div class="menu-square listing">
                    <i class="fa fa-briefcase"></i>
  
                  </div>
                  <span class="caption">Service administratif</span>
                </a>
              </li>

             
            </ul>
          </nav>
          <!-- End Nav -->

          <!-- Start Search Nav Mobile -->
          <nav class="search-nav mobile col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
            <button class="advanced-search-button">
              <i class="fa fa-align-justify"></i>
            </button>

            <ul class="sub-menu custom-list">
              <li><a href="#"><i class="fa fa-globe"></i>Immobilier</a></li>
              <li><a href="#"><i class="fa fa-briefcase"></i>Education</a></li>
              <li><a href="#"><i class="fa fa-coffee"></i>Restaurents</a></li>
              <li><a href="#"><i class="fa fa-gift"></i>Lieux des cultes</a></li>
              <li><a href="#"><i class="fa fa-file-o"></i>service administratif</a></li>
            </ul>

            <form action="/" class="default-form">
              <input type="text" placeholder="Search...">
              <button><i class="fa fa-search"></i></button>
            </form>
          </nav>
          <!-- End Search Nav Mobile -->
          
          <!-- Start Nav-Wrapper Mobile -->
          <nav class="nav-wrapper-mobile col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ul class="main-menu custom-list">

             <li class="has-submenu">
                <a href="/PageImmobilier">      
                  <span class="caption"> Immobilier</span>
                </a>
                <ul class="sub-menu custom-list">
                  <li><a href="/location">Location</a></li>
                  <li><a href="/souslocation">Sous-Location</a></li>
                  <li><a href="/Collocation">Collocation</a></li>
                  <li class="sub-menu custom-list">
                    <a href="/echange">échange</a>
                  
                  </li>
                  </li>
                </ul>
              

              <li class="has-submenu">
                <a href="/Restaurant">
                 
                  <span class="caption">Restaurant</span>
                </a>
               
              </li>

              <li class="has-submenu">
                <a href="/Education">
                  
                  <span class="caption">Écoles et centre educatif</span>
                </a>
                
              </li>

              <li class="has-submenu">
                <a href="/LieudeCultes">
                  
                  <span class="caption">Lieux de cultes</span>
                </a>
                
              </li>

              <li>
                <a href="/ServiceAdministratif">
                 
                  <span class="caption">Service administratif</span>
                </a>
              </li>

              
              </li>
            </ul>

            <ul class="social-inner custom-list">
              <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
              <li><a href="#" class="dribbble"><i class="fa fa-dribbble"></i></a></li>
            </ul>

            <ul class="utility-user custom-list">
              <li class="login">
                <a href="{{url('/login')}}" class="btn btn-default">
                  <i class="fa fa-power-off"></i>
                  <span>Login</span>
                </a>
              </li>

              <li class="register">
                <a href="{{url('/register')}}" class="btn btn-default">
                  <i class="fa fa-plus-circle"></i>
                  <span>Register</span>
                </a>
              </li>
            </ul>
          </nav>
          <!-- End Nav-Wrapper Mobile -->

        </div>
        <!-- End Menu Nav -->

        <!-- Responsive Menu Buttons -->
        <button class="search-toggle button"><i class="fa fa-search"></i></button>
          
        <button class="navbar-toggle button"><i class="fa fa-bars"></i></button>
        <!-- End Responsive Menu Buttons -->

      </div>
  
 

  </header>
  <!-- End Header -->