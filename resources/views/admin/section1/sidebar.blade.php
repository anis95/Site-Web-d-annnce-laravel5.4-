        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="assets/img/user.jpg" alt="">
                            </div>
                            @if(Auth::check())
                            <div class="user-info">
                                <div><strong>{{Auth::user()->name}}</strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                            @endif
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!--end search section-->
                    </li>
                    <li class="selected">
                        <a href="/admin"><i class="fa fa-dashboard fa-fw"></i>Acceuil</a>
                    </li>
                    
                     <li>
                        <a href="/LesAnnonces"><i class="fa fa-cogs"></i>  Les Annonces</a>
                    </li>
                    <li>
                        <a href="/Allutilisateurs"><i class="fa fa-users"></i>  Les Utilisateurs</a>
                    </li>
                     <li>
                        <a href="/gerercategorie"><i class="fa fa-users"></i>  Les Catégories</a>
                    </li>
                      <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>  à propos les annonces<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/MessageUtilisateur"><i class="fa fa-envelope" aria-hidden="true"></i> Messages</a>
                            </li>
                            <li>
                                <a href="/CommentUtilisateur"><i class="fa fa-comment" aria-hidden="true"></i>  Commentaires</a>
                            </li>
                             <li>
                                <a href="/AllSubscribers"><i class="fa fa-envelope" aria-hidden="true"></i>       Subscribe</a>
                            </li>

                        </ul>
                        <!-- second-level-items -->
                    </li>
                    
                  
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>