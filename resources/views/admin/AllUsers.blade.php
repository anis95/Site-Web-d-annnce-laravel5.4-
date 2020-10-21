@extends('admin.layout.dashboard2')
@section('content')
        <!--  page-wrapper -->
        <div id="page-wrapper">

            
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Information Sur Les Utilisateurs</h1>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Table Utilisateurs
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id User</th>
                                            <th>e-mail User</th>
                                            <th>Name</th>
                                            <th>Vérfication</th>
                                            <th>Créer</th>
                                            <th>View</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
   
                                    <tbody>
                                    @foreach($user as $users)
                                        <tr class="odd gradeX">
                                            <td>{!! $users->id !!}</td>
                                            <td>{!! $users->email !!}</td>
                                            <td>{!! $users->name !!}</td>
                                            <td class="center">{!! $users->verified !!}</td>
                                            <td class="center">{!! $users->created_at !!}</td>
                                            <td class="center">
                                            <a class="btn btn-primary" href="{!! url('/Maprofil',$users->id) !!}">Show Profil</a>
                                            </td>



                                            <td>{!! Form::open([
            'method' => 'DELETE',
           'route' => ['SupprimerUser.destroy', $users->id ,]  
        ]) !!}
            {!! Form::submit('Supprimer!', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
                                              </td>
                                        </tr>
                                      @endforeach  
                                    </tbody>
                                
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
            
                    <!--  end  Context Classes  -->
     </div>
     
    <!-- end wrapper -->
@stop
  