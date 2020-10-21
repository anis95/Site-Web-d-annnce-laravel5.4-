

  @extends('layouts.app')
@push("stylesheets")
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
@endpush
@section('content')
<div class="container">
    <div class="row">
     
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Votre annonce</div>
                <div class="panel-body">
                @if(isset($annonce))
                
                    {!! Form::model($annonce, [
                        'method' => 'PATCH',
                        'url' => ['/modifier', $annonce->id],
                        'class' => 'form-horizontal',
                        'files' => true
                    ]) !!}
                @else
                    {!! Form::open(['url' => '/affannnonce', 'class' => 'form-horizontal', 'files' => true]) !!}
                @endif
                        {{ csrf_field() }}
                       @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        {!! Form::label('title', 'titre', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) !!}
                            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        {!! Form::label('short_desc', 'Short description', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('short_desc', null, ['class' => 'form-control', 'id' => 'short_desc']) !!}
                            {!! $errors->first('short_desc', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        {!! Form::label('description', 'Description', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
                            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        {!! Form::label('date_debut', 'Date debut', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::date('date_debut', null, ['class' => 'form-control', 'id' => 'date_debut']) !!}
                            {!! $errors->first('date_debut', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>           
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        {!! Form::label('prix', 'prix', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('prix', null, ['class' => 'form-control', 'id' => 'prix']) !!}
                            {!! $errors->first('prix', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>     
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        {!! Form::label('num_tel', 'Téléphone', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::number('num_tel', null, ['class' => 'form-control', 'id' => 'num_tel']) !!}
                            {!! $errors->first('num_tel', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                         

                       <div class="form-group">
                        <label for="Region" class="col-md-3 control-label">Région</label>
                         <div class="col-md-9 ">
                        <select  class="form-control" name="region_id" required="required">
                        <option disabled>Select_Région</option>
                        <option value="1">Paris</option>
                        </select>
                        </div>
                        </div>
                        <input hidden="hidden"  name="user_id" value="{!! Auth()->user()->id !!}">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Map</label>
                            <div class="col-md-9">
                                <div id="map-canvas" style="height: 360px;"></div>
                            </div>
                        </div>
                        <div class="form-group">
                        </div>
                        <div id="map-search" class="form-group">
                            <label for="lieu" class="col-md-3 control-label">&nbsp;</label>
                            <div class="col-md-9">
                                <input id="search-btn" class="btn btn-success" type="button" value="Locate Address"  style="display: none;">
                                <input id="detect-btn" class="btn btn-success" type="button" value="Detect Location" disabled>
                            </div>  
                        </div>
                        <div class="form-group">
                            <input name="latitude" id="latitude" hidden>
                            <input name="longitude" id="longitude" hidden>
                        </div>

                         <div class="form-group">
                            <label for="lieu" class="col-md-3 control-label">Lieu</label>
                            <div class="col-md-9">
                                <input id="search-txt" type="text" class="form-control" maxlength="100" value="{{ isset($annonce) ? $annonce->lieu : '' }}">
                                <input id="lieu" type="text" class="form-control" name="lieu"  required value="{{ isset($annonce) ? $annonce->lieu : '' }}" style="display: none;">
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="category" class="col-md-3 control-label" >Catégorie</label>
                         <div class="col-md-9 ">
                        <select  class="form-control" name="category_id"  required="required">
                        <option disabled>Select_catégorie</option>
                        <?php

 $category = DB::table('categories')->get();
foreach ($category as $categ) {
        

        echo '
                        <option value="'.$categ->id.'">'.$categ->name.'</option>
                        ';}
                        ?>
                        </select>
                        </div>
                        </div>

                    @if(isset($annonce))
                    <div class="col-md-9 col-md-offset-3 ">
                        @foreach($annonce->images()->get() as $image)
                            <div id="img_id_{!! $image->id !!}" class="col-md-3 thumbnail" style="margin-top: 15px;padding: 15px;">
                                <img class="img-responsive img-polaroid" src="{!! url('images/'.$image->id) !!}">
                                <h5 class="text-center"><button type="button" id="del_{{ $image->id }}" href="#.dell" data-name="{!! $image->name !!}" data-id="{!! $image->id !!}">Remove file</button></h5>
                            </div>
                        @endforeach
                    </div>
                    @endif
                    <div class="form-group">
                         <label for="Images" class="col-md-3 control-label">Images</label>
                         <div class="col-md-9 ">
                            <input hidden="hidden" name="images" id="images">
                            <div class="dropzone" id="myAwesomeDropzone"></div>
                        </div>
                    </div>


                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    {!! isset($annonce) ? 'Modifier votre annonce' : 'Déposez votre annonce' !!}
                                </button>
                            </div>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script type="text/javascript">
            $(document).ready(function () {

            @if(isset($annonce))
                @foreach($annonce->images()->get() as $image)

                   $("#del_{{ $image->id }}").click(function () {
                    event.preventDefault();
                    var name = $(this).attr('data-name');
                    var id = $(this).attr('data-id');

                    $.ajax({
                        type: 'POST',
                        url: "{!! url('images/delete') !!}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            image: name
                        },
                        dataType: 'json',
                        success: function (data, textStatus, jqXHR) {
                            if (typeof data.error === 'undefined') {

                                $("#img_id_"+ id).remove();


                            }
                            else {


                            }

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            // Handle errors here
                            console.log('ERRORS: ' + textStatus);
                            console.log();
                            // STOP LOADING SPINNER
                        }
                    });
                });
                @endforeach
                @endif

            });
        </script>
<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<script type="text/javascript">
  
    var x = [];
    Dropzone.options.myAwesomeDropzone = {
      

        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        autoDiscover : true,
        success: function(file, response){
            //console.log(response.data.id);
            x.push(response.data.id);
            $('#images').val(x);
        },
        url: "{!! url('/images') !!}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        addRemoveLinks: true,
        removedfile: function(file) {
            var name = file.name;
            $.ajax({
                type: 'POST',
                url: "{!! url('/images/delete') !!}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    image : name
                },
                dataType: 'json'
            });
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        }
    };

</script>



    <script type="text/javascript">
        /*
         * Google Maps: Latitude-Longitude Finder Tool
         * http://salman-w.blogspot.com/2009/03/latitude-longitude-finder-tool.html
         */
        function loadmap() {
            // initialize map
          var map = new google.maps.Map(document.getElementById("map-canvas"), {
                @if(isset($annonce))
                    center: new google.maps.LatLng("{{ $annonce->latitude }}", "{{ $annonce->longitude }}"),
                @else
                    center: new google.maps.LatLng("46.454889270677576", "7.45697021484375"),
                @endif
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
           
            // initialize marker
            var marker = new google.maps.Marker({
                position: map.getCenter(),
                draggable: true,
                map: map
            });
            // intercept map and marker movements
            google.maps.event.addListener(map, "idle", function() {
                marker.setPosition(map.getCenter());
//                document.getElementById("map-output").innerHTML = "Latitude:  " + map.getCenter().lat().toFixed(6) + "<br>Longitude: " + map.getCenter().lng().toFixed(6) + "<a href='https://www.google.com/maps?q=" + encodeURIComponent(map.getCenter().toUrlValue()) + "' target='_blank'>Go to maps.google.com</a>";
                document.getElementById("latitude").value = map.getCenter().lat().toFixed(6);
                document.getElementById("longitude").value = map.getCenter().lng().toFixed(6);
            });
            google.maps.event.addListener(marker, "dragend", function(mapEvent) {
                map.panTo(mapEvent.latLng);
            });
            // initialize geocoder
            var geocoder = new google.maps.Geocoder();
            google.maps.event.addDomListener(document.getElementById("search-btn"), "click", function() {
                geocoder.geocode({ address: document.getElementById("search-txt").value }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        var result = results[0];
                        document.getElementById("search-txt").value = result.formatted_address;
                        if (result.geometry.viewport) {
                            map.fitBounds(result.geometry.viewport);
                        } else {
                            map.setCenter(result.geometry.location);
                        }
                    } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
                        alert("Sorry, geocoder API failed to locate the address.");
                    } else {
                        alert("Sorry, geocoder API failed with an error.");
                    }
                });
            });
            google.maps.event.addDomListener(document.getElementById("search-txt"), "keydown", function(domEvent) {
                if (domEvent.which === 13 || domEvent.keyCode === 13) {
                    domEvent.preventDefault();
                    google.maps.event.trigger(document.getElementById("search-btn"), "click");
                }
            });
            // initialize geolocation
            if (navigator.geolocation) {
                google.maps.event.addDomListener(document.getElementById("detect-btn"), "click", function() {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        map.setCenter(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
                    }, function() {
                        alert("Sorry, geolocation API failed to detect your location.");
                    });
                });
                document.getElementById("detect-btn").disabled = false;
            }
        }


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3&amp;key=AIzaSyDOgUKODe6s1T0HDG-9dbrDB0x0iWpl6v4&amp;callback=loadmap" defer></script>
    <script type="text/javascript">
        
        $('#search-txt').change(function(){
            $('#lieu').val($(this).val());
        });
    </script>

@endpush