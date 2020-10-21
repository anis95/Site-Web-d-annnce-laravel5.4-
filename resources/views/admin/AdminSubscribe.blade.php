@extends('admin.layout.dashboard2')
@section('content')
        <!--  page-wrapper -->
        <div id="page-wrapper">

            
            <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Messages</h1>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Table subscribers
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>E-mail</th>
                                            <th>Supprimer</th>
                                            
                                        </tr>
                                    </thead>
   
                                    <tbody>
                                    @foreach($newsletter as $newsletters)
                                        <tr class="odd gradeX">
                                            <td>{!! $newsletters->id !!}</td>
                                            <td>{!! $newsletters->email !!}</td>
                                            
                                            <td>{!! Form::open([
            'method' => 'DELETE',
           'route' => ['SupprimerSubscriber.destroy', $newsletters->id ,]  
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
  