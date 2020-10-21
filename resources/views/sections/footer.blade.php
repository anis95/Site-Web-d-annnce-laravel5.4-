<!-- Start Footer -->
  <footer id="footer">
    <div class="container">
      <div class="row">

        <!-- Start Footer-Top -->
        <div class="footer-top">
          <div class="widget col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <h5 class="widget-title">L'idée</h5>
            <div class="widget-description"><p>Concevoir un site d'annonces gratuites qui réponds aux dernières nécessitées des Tunisien(es) En France </p></div>
          </div>
          <div class="widget col-lg-3 col-md-3 col-sm-4 col-xs-12">
            <h5 class="widget-title">Catégories</h5>
            <ul class="news custom-list">
              <li><a href="/PageImmobilier">Immobilier</a></li>
              <li><a href="/Restaurant">Restaurant & café</a></li>
              <li><a href="/LieudeCultes">Lieu de cultes</a></li>
            </ul>
          </div>
          <div class="widget col-lg-3 col-md-3 col-sm-4 col-xs-12">
            <h4 class="widget-title" ><font color="white">Email Newsletters</font></h4>
                <p><font color="white">Abonnez-vous à notre newsletter et recevez une notification lorsque des nouveaux annonces sont disponibles.</font></p>
                <form action="{!! url('/subscribe') !!}" method="post" class="btn-inline form-inverse">
                    {{ csrf_field() }}
                    <input type="email" name="email" class="form-control" placeholder="Email..." required />
                    <button type="submit" class="btn btn-link"><font color="white"><i class="fa fa-envelope"></i></font></button>
                </form>
          </div>
           <div class="widget col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <h5 class="widget-title">But</h5>
            <div class="widget-description"><p>Aider les Tunisiens en france pour Trouver des logements facilement </p></div>
          </div>

        </div>
        <!-- End Footer-Top -->

      </div>
    </div>
    <!-- End Container -->

    <!-- Start Footer Copyrights -->
    <div class="footer-copyrights">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12"><p>Copyright © 2014 UOU Apps</p></div>
          <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
            <ul class="social pull-right custom-list">
              <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
             
              
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- End Footer Copyrights -->

  </footer>
  <!-- End Footer -->