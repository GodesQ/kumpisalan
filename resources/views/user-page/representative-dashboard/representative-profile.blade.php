@extends('layouts.user-layout')

@section('title')
    {{ auth()->user()->name }} - Edit Profile
@endsection

@section('content')
    <style>
        .map-container {
            padding: 10px 0;
            width: 100%;
            max-height: 400px;
            height: 0px;
            transition: 0.4s ease-in;
        }
        .show-map-container {
            padding: 10px 0;
            width: 100%;
            height: 400px;
        }
        .map-content {
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }
    </style>

    <main id="main" class="site-main">
        <div class="site-content owner-content">
            @include('user-page.representative-dashboard.representative-menu')
            <div class="container">
                <div class="member-wrap">
                    <form action="{{ route('representative.profile.post', auth()->user()->id) }}" enctype="multipart/form-data" method="POST" class="member-profile form-underline">
                        @csrf
                        <h3>Avatar</h3>
                        <div class="member-avatar">
                            <img id="member_avatar" src="{{ asset('user-assets/images/member-avatar.png') }}" alt="Member Avatar">
                            <label for="upload_new">
                                <input id="upload_new" type="file" name="member_avatar" placeholder="Upload New">
                                Upload new
                            </label>
                            <input type="hidden" name="old_user_image" id="old_user_image" value="{{ auth()->user()->user_image }}">
                        </div>
                        <h3>Basic Info</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="field-input">
                                    <label for="email">Email <span style="font-size: 12px;" class="text-primary">(You can't edit your email)</span></label>
                                    <input type="email" name="email" value="{{ auth()->user()->email }}" disabled id="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="field-input">
                                    <label for="firstname">First name</label>
                                    <input type="text" name="firstname" value="{{ auth()->user()->firstname }}" id="firstname">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="field-input">
                                    <label for="middlename">Middle name</label>
                                    <input type="text" name="middlename" value="{{ auth()->user()->middlename }}" id="middlename">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="field-input">
                                    <label for="lastname">Last name</label>
                                    <input type="text" name="lastname" value="{{ auth()->user()->lastname }}" id="lastname">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="field-input">
                                    <label for="address">Address</label>
                                    <div class="d-flex justify-content-center">
                                        <input style="width: 85;" type="text" name="address" id="address" value="{{ auth()->user()->address }}">
                                        <button style="width: 15%;" type="button" class="btn btn-primary" id="view-map-btn">View Map<i class="ti ti-marker"></i></button>
                                    </div>
                                    <input type="hidden" name="latitude" id="latitude" value="{{ auth()->user()->latitude }}">
                                    <input type="hidden" name="longitude" id="longitude" value="{{ auth()->user()->longitude }}">
                                </div>
                                <div class="map-container">
                                    <div class="map-content"></div>
                                </div>
                            </div>
                        </div>
                        <h3>Other Info</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="field-input">
                                    <label for="years_of_service">Years of Service</label>
                                    <input type="number" name="years_of_service" id="years_of_service" value="{{ auth()->user()->representative_info->years_of_service }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-input">
                                    <label for="contact_no">Contact No</label>
                                    <input type="text" name="contact_no" id="contact_no" value="{{ auth()->user()->representative_info->contact_no }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-input">
                                    <label for="birthdate">Birthdate</label>
                                    <input type="date" name="birthdate" id="birthdate" value="{{ auth()->user()->representative_info->birthdate }}" onchange="getAge(this)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="field-input">
                                    <label for="age">Age</label>
                                    <input type="number" name="age" id="age" readonly value="{{ auth()->user()->representative_info->age }}">
                                </div>
                            </div>
                        </div>
                        <div class="field-submit">
                            <input type="submit" value="Update">
                        </div>
                    </form>
                    <form action="{{ route('user.change_password.post', auth()->user()->user_uuid) }}" method="POST" class="member-password form-underline">
                        @csrf
                        <h3>Change Password</h3>
                        <div class="field-input">
                            <label for="password">Old Password</label>
                            <input type="password" name="password" placeholder="Enter old password" id="old_password">
                        </div>
                        <div class="field-input">
                            <label for="new_password">New Password</label>
                            <input type="password" name="new_password" placeholder="Enter new password" id="new_password">
                        </div>
                        <div class="field-input">
                            <label for="re_new">Confirm Password</label>
                            <input type="password" name="confirm_password" placeholder="Enter new password" id="confirm_password">
                        </div>
                        <div class="field-check">
                            <label for="is_logout">
                                <input type="checkbox" name="is_logout" id="is_logout" value="1">Logout after successfully changed?
                                <span class="checkmark">
                                    <i class="la la-check"></i>
                                </span>
                            </label>
                        </div>
                        <div class="field-submit">
                            <input type="submit" value="Save">
                        </div>
                    </form><!-- .member-password -->
                </div><!-- .member-wrap -->
            </div>
        </div><!-- .site-content -->
    </main><!-- .site-main -->
@endsection

@push('scripts')
    <script>
        function getAge(e) {
            var today = new Date();
            var birthDate = new Date(e.value);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            const ageInput = document.querySelector("#age");
            ageInput.value = age;
        }
    </script>
@endpush

@push('scripts')
    <script>
        var map;
        var address;
        function initialize() {
            let address = document.querySelector('#address');
            let latitude = document.querySelector('#latitude');
            let longitude = document.querySelector('#longitude');

            var mapOptions = {
                center: latitude && longitude ? new google.maps.LatLng(Number(latitude.value), Number(longitude.value) ) : new google.maps.LatLng(Number(14.5995124), Number(120.9842195) ),
                zoom: 15,
                mapId: 'ad277f0b2aef047a',
                disableDefaultUI: false, // Disables the controls like zoom control on the map if set to true
                scrollWheel: true, // If set to false disables the scrolling on the map.
                draggable: true, // If set to false , you cannot move the map around.
            };

            map = new google.maps.Map(document.querySelector(".map-content"), mapOptions);
            infoWindow = new google.maps.InfoWindow({
                maxWidth: 200,
            });

            const user_icon_marker = {
                url: '../../../user-assets/images/icons/user-marker.png',
                scaledSize: new google.maps.Size(50,50)
            }

            let my_marker = new google.maps.Marker({
                position: latitude && longitude ? new google.maps.LatLng(Number(latitude.value), Number(longitude.value) ) : new google.maps.LatLng(Number(14.5995124), Number(120.9842195) ),
                map: map,
                icon: user_icon_marker,
                draggable: true,
            })

            // for search
            let searchBox = new google.maps.places.SearchBox( address );

            google.maps.event.addListener( searchBox, 'places_changed', function () {
                var places = searchBox.getPlaces(), bounds = new google.maps.LatLngBounds(), i, place, lat, long, resultArray, address = places[0].formatted_address;

                for( i = 0; place = places[i]; i++ ) {
                    bounds.extend( place.geometry.location );
                    my_marker.setPosition( place.geometry.location );  // Set my_marker position new.
                }

                map.fitBounds( bounds );  // Fit to the bound
                map.setZoom( 15 ); // This function sets the zoom to 15, meaning zooms to level 15.

                lat = places[0].geometry.location.lat()
                long = places[0].geometry.location.lng();
                latitude.value = lat;
                longitude.value = long;
                resultArray =  places[0].address_components;
            });

            google.maps.event.addListener( my_marker, "dragend", function ( event ) {
                var lat, long, address, resultArray;
                var addressEl = document.querySelector( '#address' );
                var latEl = document.querySelector( '#latitude' );
                var longEl = document.querySelector( '#longitude' );

                lat = my_marker.getPosition().lat();
                long = my_marker.getPosition().lng();

                var geocoder = new google.maps.Geocoder();
                geocoder.geocode( { latLng: my_marker.getPosition() }, function ( result, status ) {
                    if ( 'OK' === status ) {  // This line can also be written like if ( status == google.maps.GeocoderStatus.OK ) {
                        address = result[0].formatted_address;
                        resultArray =  result[0].address_components;
                        addressEl.value = address;
                        latEl.value = lat;
                        longEl.value = long;
                        filterChurches(1);
                    } else {
                        console.log( 'Geocode was not successful for the following reason: ' + status );
                    }

                    // Closes the previous info window if it already exists
                    if ( infoWindow ) {
                        infoWindow.close();
                    }

                    infoWindow = new google.maps.InfoWindow({
                        content: address
                    });
                    infoWindow.open( map );
                });
            });


        }

        let mapButton = document.querySelector('#view-map-btn');

        mapButton.addEventListener('click', (e) => {
            let mapContainer = document.querySelector('.map-container');
            if(mapContainer.classList.contains('show-map-container')) {
                mapContainer.classList.remove('show-map-container');
                e.target.innerHTML = 'View Map';
            } else {
                mapContainer.classList.add('show-map-container');
                e.target.innerHTML = 'Hide Map';
            }

        })

        // remove enter functionality in address input
        $(document).ready(function() {
            $('#address').keydown(function(event) {
                if(event.keyCode == 13) {
                event.preventDefault();
                return false;
                }
            });
        });
    </script>
@endpush