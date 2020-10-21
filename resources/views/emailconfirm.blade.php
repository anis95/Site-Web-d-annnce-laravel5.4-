@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading">Enregistrement Confirmé</div>
<div class="panel-body">
Votre e-mail est vérifié avec succès. Cliquez ici pour <a href="{{url('/login')}}">login</a>
</div>
</div>
</div>
</div>
</div>
@endsection