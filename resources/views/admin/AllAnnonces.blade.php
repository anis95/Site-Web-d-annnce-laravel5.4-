@extends('admin.layout.dashboard2')
@section('content')
        <!--  page-wrapper -->
        <div id="page-wrapper">

            
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Information Sur Les Annonces</h1>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Table Annonce
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id Annonce</th>
                                            <th>Catégorie</th>
                                            <th>Description</th>
                                            <th>Utilisateur</th>
                                          
                                            <th>View</th>
                                        
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
   
                                    <tbody>
                                    @foreach($annonce as $annonces)
                                        <tr class="odd gradeX">
                                            <td>{!! $annonces->id !!}</td>
                                            <td>{!! $annonces->categories->name !!}</td>
                                            <td>{!! $annonces->description !!}</td>
                                            <td class="center">{!! $annonces->user->name !!}</td>
                                            
                                            <td class="center">
         <a class="btn btn-primary" href="{!! url('viewannonce', $annonces->id) !!}">Show</a>
         </td>
                                            <td>
               
                {!! Form::open([
            'method' => 'DELETE',
            'route' => ['Supprimer.destroy', $annonces->id ,]
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
  