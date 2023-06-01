@extends('layouts.user-layout')

@section('title', 'Kumpisalan')

@section('content')
    <main id="main" class="site-main overflow">
        <div class="site-banner" style="background-image: url(user-assets/images/bg/top-banner.png);">
            <div class="container d-flex align-items-center justify-content-center">
                <div class="site-banner__content">
                    <h1 class="site-banner__title">Kumpisalan: Journey of <br> Self-Discovery and Reflection</h1>
                    <form action="{{ route('churches.searchPage') }}" class="site-banner__search layout-02 offset-item">
                        <div class="field-input">
                            <label for="loca">Where</label>
                            <input class="site-banner__search__input" id="loca" type="text" name="address" placeholder="Your place">
                            <input type="hidden" name="latitude" id="latitude" value="">
                            <input type="hidden" name="longitude" id="longitude" value="">
                        </div><!-- .site-banner__search__input -->
                        <div class="field-submit">
                            <button id="field-submit-btn"><i class="las la-search la-24-black"></i></button>
                        </div>
                    </form><!-- .site-banner__search -->
                </div>
            </div>
        </div><!-- .site-banner -->
        <div class="cities">
            <div class="container">
                <h3 class="cities__title title offset-item text-center">{{ optional(auth()->user())->latitude && optional(auth()->user())->longitude ? 'Churches Near You' : 'Churches' }}</h3>
                <div class="cities__content offset-item">
                    <div class="row justify-content-center">
                        @forelse ($near_churches as $church)
                            <div class="col-lg-3 col-sm-6">
                                <div class="cities__item hover__box">
                                    <div class="cities__thumb hover__box__thumb">
                                        <a title="{{ $church->name }}" href="{{ route('churches.detailPage', ['uuid' => $church->church_uuid, 'name' => $church->name ]) }}">
                                            <img src="{{ URL::asset('admin-assets/images/churches/' . $church->church_image) }}" alt="Tokyo" class="church-img">
                                        </a>
                                    </div>
                                    <div class="cities__info">
                                        <h3 class="cities__capital">{{ substr($church->name, 0, 30) }}...</h3>
                                        <p class="cities__number">{{ $church->distance ? number_format($church->distance, 2) . 'km' : Str::ucfirst($church->criteria) }} </p>
                                    </div>
                                </div><!-- .cities__item -->
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div><!-- .cities__content -->
            </div>
        </div><!-- .cities -->
    </main><!-- .site-main -->
@endsection

@push('scripts')
    <script>
        function initialize() {
            let address = document.querySelector('.site-banner__search__input');
            let latitude = document.querySelector('#latitude');
            let longitude = document.querySelector('#longitude');

            // for search
            let searchBox = new google.maps.places.SearchBox( address );

            google.maps.event.addListener( searchBox, 'places_changed', function () {
                var places = searchBox.getPlaces(), bounds = new google.maps.LatLngBounds(), i, place, lat, long, resultArray, address = places[0].formatted_address;
                lat = places[0].geometry.location.lat()
                long = places[0].geometry.location.lng();
                latitude.value = lat;
                longitude.value = long;
                resultArray =  places[0].address_components;
            });
        }

        $('#field-submit-btn').click(function () {
            $('.site-banner__search').submit();
        })

        $(document).ready(function() {
            $('.site-banner__search__input').keydown(function(event){
                if(event.keyCode == 13) {
                event.preventDefault();
                return false;
                }
            });
        });
    </script>
@endpush

