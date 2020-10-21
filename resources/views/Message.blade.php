@extends('layouts.master')
@section('content') 
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
                           <p>Message <font color="#24445C"><strong>{{Auth::user()->name}}</strong></font> : Cette page contient les réponses aux questions que vous avez envoyés au administrateur de site.<p>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Objet</th>
                                            <th>Contenu</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
   
                                    <tbody>
                                   @foreach($message as $msg)
                                        <tr class="odd gradeX">
                                            <td>{!! $msg->subject !!}</td>
                                            <td>{!! $msg->content !!}</td>
                                            
                                           
                                            <td class="center">{!! Form::open([
                                                                'method' => 'DELETE',
                                                             'route' => ['SupprimerReponse.destroy', $msg->id ,]  
                                                                   ]) !!}
                                                {!! Form::submit('Supprimer!', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}</td>

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
     





@endsection