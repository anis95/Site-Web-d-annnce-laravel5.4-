@extends('admin.layout.dashboard2')
@section('content')
<div id="page-wrapper">
<div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Les catégories</h1>
                </div>
                 <!-- end  page header -->

                 <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Table Catégorie
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>Id categorie</th>
                                            <th>Nom categorie</th>
                                            
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
   
                                    <tbody>
                                    @foreach($category as $categorys)
                                     <tr class="odd gradeX"> 
                                     <td>{!! $categorys->id !!}</td>                                 
                                     <td>{!! $categorys->name !!}</td>                                 
                                                                  
                                       
                                          <td align="right">								 
                             				 {!! Form::model($categorys, [
                                                'method' => 'PATCH',
                                                 'url' => ['/ModifierCategorie', $categorys->id],
                                                 'class' => 'form-horizontal',
                                 				 'files' => true
               								     ]) !!}
               								    
               								      {!! Form::text('name', '', ['class' => 'col-lg-6 form-control']) !!}
               								       
               								     {!! Form::submit('Modifier ', ['class' => 'btn btn-primary']) !!}
            									{!! Form::close() !!}
                                          </td> 
                                             <td align="center">  
                 								  {!! Form::open([
                									'method' => 'DELETE',
                									'route' => ['SupprimerCategory.destroy', $categorys->id]
            										]) !!}
                									{!! Form::submit('Supprimer Categorie', ['class' => 'btn btn-danger']) !!}
            										{!! Form::close() !!}
           									 </td>                   
                                        </tr>
                                  @endforeach  
                                    </tbody>
                                
                                </table>
                            </div>
                            
                        </div>
                    </div>
                   </div>
                              <div id="category" class="col-lg-6">
                                    <form action="{!! url('/CategorieAjouter') !!}" role="form">
                                     @if(Session::has('flash_success'))
                     <div class="alert alert-success">
                                   {{ Session::get('flash_success') }}
                                      @endif
                                        
                                        <div class="form-group">
                                            <label>Ajouter Catégorie</label>
                                           
                                            <input class="form-control" placeholder="Nom catégorie" name="name"> 
                                        </div>
                                        <button class="btn btn-success">Ajouter</button>
                                    </form>
                              </div>
                    

                               
      </div>
</div>
@stop