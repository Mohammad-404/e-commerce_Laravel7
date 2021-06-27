@extends('layouts.Admin.index')

@section('content')

<div class="container-fluid">
 


    <div class="row">
        <div class="col-lg-12">
            <h2 class="title-1 m-b-25">Add Vendors</h2>
            <form action="{{route('admin.vendors.store')}}" method="post" enctype="multipart/form-data" class="bg-white p-4">
                @csrf
                <div class="row">
                        <div class="form-group col-lg-12 p-3" style="border-bottom:1px solid black">
                            <label for="exampleInputPassword1">Logo Vendor </label>
                            <input type="file" name="logo" />

                            @error('logo')
                                <label class="text-danger">{{$message}}</label>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control"  placeholder="">
                            @error("name")
                                <label class="text-danger">{{$message}}</label>
                            @enderror
                        </div>
    
                        <div class="form-group col-lg-6">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="email" value="{{old('email')}}" class="form-control"  placeholder="">
                            @error("email")
                                <label class="text-danger">{{$message}}</label>
                            @enderror
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" name="password" value="" class="form-control"  placeholder="">
                            @error("password")
                                <label class="text-danger">{{$message}}</label>
                            @enderror
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label for="exampleInputEmail1">Mobile</label>
                            <input type="number" name="mobile" value="{{old('mobile')}}" class="form-control"  placeholder="">
                            @error("mobile")
                                {{-- <label class="text-danger">The Feild Is Required</label> --}}
                                <label class="text-danger">{{$message}}</label>
                            @enderror
                        </div>
    
                        <div class="form-group col-lg-6">
                            <label for="exampleInputPassword1">Main Categories</label>
                            <select name="category_id" class="form-control">
                                @if($Main_Categories && $Main_Categories -> count() > 0)
                                    @foreach ($Main_Categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>                                        
                                    @endforeach
                                @endif
                            </select>
                            @error("category_id")
                                <label class="text-danger">{{$message}}</label>
                            @enderror
                        </div>

                                     
                        <div class="form-group col-lg-6">
                            <label for="exampleInputPassword1" class="my-5">State Active ?</label>
                            <input type="checkbox" value="1" checked="checked" name="active" />
                            @error("active")
                                <label class="text-danger">{{$message}}</label>
                            @enderror
                        </div>
          
                        <div class="form-group col-lg-12">
                            <input type="text" value="{{old('address')}}" name="address" placeholder="Enter Address" class="form-control">
                            @error("address")   
                                <label class="text-danger">{{$message}}</label>
                            @enderror
                        </div>

                        {{-- map --}}
                        {{-- <div class="form-group col-lg-12">
                            <input type="text" id="pac-input" name="address" class="form-control">
                            @error("address")   
                                <label class="text-danger">{{$message}}</label>
                            @enderror
                        </div> --}}
                        {{-- <div id="map" class="col-lg-12" style="width:1000px;height:500px;"></div> --}}
                </div>
                    <div class="py-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
              </form>
        </div>
    </div>
  


@endsection

@section('script')

<script>
    $("#pac-input").focusin(function() {
        $(this).val('');
    });
    $('#latitude').val('');
    $('#longitude').val('');
    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.
    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 24.740691, lng: 46.6528521 },
            zoom: 13,
            mapTypeId: 'roadmap'
        });
        // move pin and current location
        infoWindow = new google.maps.InfoWindow;
        geocoder = new google.maps.Geocoder();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map.setCenter(pos);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(pos),
                    map: map,
                    title: 'موقعك الحالي'
                });
                markers.push(marker);
                marker.addListener('click', function() {
                    geocodeLatLng(geocoder, map, infoWindow,marker);
                });
                // to get current position address on load
                google.maps.event.trigger(marker, 'click');
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            console.log('dsdsdsdsddsd');
            handleLocationError(false, infoWindow, map.getCenter());
        }
        var geocoder = new google.maps.Geocoder();
        google.maps.event.addListener(map, 'click', function(event) {
            SelectedLatLng = event.latLng;
            geocoder.geocode({
                'latLng': event.latLng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        deleteMarkers();
                        addMarkerRunTime(event.latLng);
                        SelectedLocation = results[0].formatted_address;
                        console.log( results[0].formatted_address);
                        splitLatLng(String(event.latLng));
                        $("#pac-input").val(results[0].formatted_address);
                    }
                }
            });
        });
        function geocodeLatLng(geocoder, map, infowindow,markerCurrent) {
            var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
            /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
            $('#latitude').val(markerCurrent.position.lat());
            $('#longitude').val(markerCurrent.position.lng());
            geocoder.geocode({'location': latlng}, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        map.setZoom(8);
                        var marker = new google.maps.Marker({
                            position: latlng,
                            map: map
                        });
                        markers.push(marker);
                        infowindow.setContent(results[0].formatted_address);
                        SelectedLocation = results[0].formatted_address;
                        $("#pac-input").val(results[0].formatted_address);
                        infowindow.open(map, marker);
                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });
            SelectedLatLng =(markerCurrent.position.lat(),markerCurrent.position.lng());
        }
        function addMarkerRunTime(location) {
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            markers.push(marker);
        }
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }
        function clearMarkers() {
            setMapOnAll(null);
        }
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        $("#pac-input").val("أبحث هنا ");
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });
        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();
            if (places.length == 0) {
                return;
            }
            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];
            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(100, 100),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };
                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));
                $('#latitude').val(place.geometry.location.lat());
                $('#longitude').val(place.geometry.location.lng());
                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
    function splitLatLng(latLng){
        var newString = latLng.substring(0, latLng.length-1);
        var newString2 = newString.substring(1);
        var trainindIdArray = newString2.split(',');
        var lat = trainindIdArray[0];
        var Lng  = trainindIdArray[1];
        $("#latitude").val(lat);
        $("#longitude").val(Lng);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANycFHyL0FvQHPomhZ8x8LaUCwH7mopH0&libraries=places&callback=initAutocomplete&language=ar&region=JO
     async defer"></script>

@stop