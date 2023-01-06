@extends('layouts.user')


@section('title')
    laudrex
@endsection

@section('front-script')
    <link rel="stylesheet" href="{{ asset('style/assets/css/trackorder.css') }}">
@endsection
@section('content')
<main class="container">
    <div id="map" class="map"></div>
    <!-- For displaying user's coordinate or error message. -->
    <div id="info" class="info"></div>
    <input type="hidden" name="driverID" id="driverID" value="2">
</main>
@endsection
@section('script')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('style/assets/js/track-draft.js') }}"></script>
    <script
    src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API') }}&callback=init&v=weekly&libraries=places&region=MY"
    defer></script>
    <script src="{{ asset('style/assets/js/ion.rangeSlider.js') }}"></script>
    <script src="{{ asset('style/assets/js/infobox.js') }}"></script>
    <script src="{{ asset('style/assets/js/sr.js') }}"></script>

@stop
