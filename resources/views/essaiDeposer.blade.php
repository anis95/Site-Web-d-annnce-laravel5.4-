@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
     
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Votre annonce</div>
                <div class="panel-body">
                    <form  action="{!! url('modifier', $annonce->id) !!}" class="form-horizontal" role="form" method="POST"  accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                       
                      
                       <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Titre </label>

                            <div class="col-md-6">
                                <input id="titre" type="text" class="form-control" name="titre" value="{!! $annonce->title !!}" required autofocus>
                            </div>
                        </div>

                               
                        
                        <div class="form-group">
                            <label for="short description" class="col-md-4 control-label">Short description </label>

                            <div class="col-md-6">
                                <input id="short_desc" type="text" class="form-control" name="short_desc"  value="{!! $annonce->short_desc !!}" required autofocus>

                                

                               
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea id="description"   class="form-control" name="description"   required >{!! $annonce->description !!}</textarea>

                             
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="date" class="col-md-4 control-label">Date debut</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date_debut"  value="{!! $annonce->date_debut!!}" required>
                                
                              
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="prix" class="col-md-4 control-label">Prix</label>

                            <div class="col-md-6">
                                <input id="prix" type="text" class="form-control" name="prix"  value="{!! $annonce->prix !!}" required >

                               
                            </div>
                        </div>

                          <div class="form-group">
                            <label for="tel" class="col-md-4 control-label">Téléphone</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control" name="num_tel"  value="{!! $annonce->num_tel !!}" required >

                               
                            </div>
                        </div>

                         

                       <div class="form-group">
                        <label for="region" class="col-md-4 control-label">Région</label>
                         <div class="col-md-6 ">
                        <select  class="form-control" name="region_id" >
                        <option>Select_Région</option>
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
                                <input id="search-txt" type="text" class="form-control" value="{!! $annonce->lieu !!}" maxlength="100">
                                <input id="lieu" type="text" class="form-control" name="lieu"  required style="display: none;">
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="category" class="col-md-4 control-label">Catégorie</label>
                         <div class="col-md-6 ">
                        <select  class="form-control" name="category_id" >
                        <option>Select_catégorie</option>
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


                  <div class="form-group">
                    <label for="Images" class="col-md-4 control-label">Images</label>
                         <div class="col-md-6 ">
                        <input type="file" class="form-control" name="image" multiple="true">                                                                                             
                        </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Modifier votre annonce
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script type="text/javascript">
        /*
         * Google Maps: Latitude-Longitude Finder Tool
         * http://salman-w.blogspot.com/2009/03/latitude-longitude-finder-tool.html
         */
        function loadmap() {
            // initialize map
var map = new google.maps.Map(document.getElementById("map-canvas"), {
                center: new google.maps.LatLng("46.454889270677576", "7.45697021484375"),
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
    <script src="https://maps.googleapis.com/maps/api/js?v=3&amp;key=AIzaSyC-RbYn2psj7TDIhyf8mgQT-s3sIBdIghY&amp;callback=loadmap" defer></script>
    <script type="text/javascript">
        
        $('#search-txt').change(function(){
            $('#lieu').val($(this).val());
        });
    </script>

@endpush
