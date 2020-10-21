   <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
               <li class="dropdown">
               <?php
                 $NombreMsg = DB::table('messages')->count();
                  echo'
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-danger">'.$NombreMsg.'</span><i class="fa fa-envelope fa-3x"></i>
                    </a>
                    ';?>
                    <!-- dropdown-messages -->
  
                 
                    <ul class="dropdown-menu dropdown-messages">
                      <li>
                                    <?php
$messages = DB::table('messages')->get();

foreach ($messages as $msg) {
         $NomUser = DB::table('users')->whereId($msg->user_id)->pluck('name')->first();
         

        echo '
                            <a href="#">
                                <div>
                                    <strong><span class=" label label-danger">'.$NomUser.'</span></strong>
                                    <span class="pull-right text-muted">
                                        <em>'.$msg->created_at.'</em>
                                    </span>
                                </div>
                                <div>'.$msg->content.'</div>
                            </a>

                            ';}
                        ?>
                        <li>
                            <a class="text-center" href="/MessageUtilisateur">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                        
                        </li>       
                    </ul>
                      
                    <!-- end dropdown-messages -->
                </li>


               

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-warning"></span>  <i class="fa fa-bell fa-3x"></i>
                    </a>
                    <!-- dropdown alerts-->
                    <ul class="dropdown-menu dropdown-alerts">
                       
                    </ul>
                    <!-- end dropdown-alerts -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="{{url('/logout')}}" class="btn btn-default"
              onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                                            Logout
              
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
              </a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

     