@extends('admin.layout.dashboard2')
@section('content')
        <!--  page-wrapper -->
        <div id="page-wrapper">

            
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Commentaires</h1>
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
                                            <th>Id Comment</th>
                                            <th>Utilisateur</th>
                                            <th>Id Annonce</th>
                                            <th>Content</th>
                                            <th>View</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
   
                                    <tbody>
                                    @foreach($comment as $com)
                                        <tr class="odd gradeX">
                                            <td>{!! $com->id !!}</td>
                                            <td>{!! $com->user->name !!}</td>
                                            <td>{!! $com->annonce_id !!}</td>
                                            <td class="center">{!! $com->content !!}</td>
                                            
                                            <td class="center">
                                            <a class="btn btn-primary" href="{!! url('viewannonce', $com->annonce_id) !!}">Show</a>
                                            </td>
                                            
                                            
                                            <td class="center">
                                            {!! Form::open([
            'method' => 'DELETE',
           'route' => ['SupprimerComment.destroy', $com->id ,]  
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
  