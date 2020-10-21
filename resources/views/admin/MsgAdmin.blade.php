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
                             Table Utilisateurs
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id Message</th>
                                            <th>Utilisateur</th>
                                            <th>E-mail</th>
                                            <th>verified</th>
                                            <th>Id Contacter User</th>
                                            <th>objet</th>
                                            <th>Contenu</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
   
                                    <tbody>
                                    @foreach($msg as $message)
                                        <tr class="odd gradeX">
                                            <td>{!! $message->id !!}</td>
                                            <td>{!! $message->user->name !!}</td>
                                            <td>{!! $message->user->email !!}</td>
                                            <td>{!! $message->user->verified !!}</td>
                                            <td>{!! $message->IdUserReponse !!}</td>
                                            <td>{!! $message->subject !!}</td>
                                            <td class="center">{!! $message->content !!}</td>
                                            <td>{!! Form::open([
            'method' => 'DELETE',
           'route' => ['SupprimerMsg.destroy', $message->id ,]  
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


                <div class="col-lg-12">
                    <h1 class="page-header">Répondre au Message utilisateur </h1>
                </div>

                    <div class="col-lg-6">
                                    <form action="{!! url('/ReponseEnvoye') !!}" role="form">
                                     @if(Session::has('flash_reponse'))
                     <div class="alert alert-success">
                                   {{ Session::get('flash_reponse') }}
                                      @endif
                                        
                                        <div class="form-group">
                                            <label>Subject</label>
                                           
                                            <input class="form-control" placeholder="" name="subject">

                                             <label>Contenu</label>
                                           
                                            <textarea class="form-control" placeholder="" name="content"></textarea> 
                                            
                                            <label>Id user pour recevoir ce message</label>
                                           
                                            <input class="form-control" placeholder="" name="IdUserReponse"> 
                                             @if(Auth::check())
                                             <input name="user_id" hidden="hidden" value="{!! Auth::user()->id !!}" > 
                                            @endif
                                        </div>
                                        <button class="btn btn-success">Envoyer</button>
                                    </form>
                              </div>

                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
            
                    <!--  end  Context Classes  -->
     </div>
     
    <!-- end wrapper -->
@stop
  