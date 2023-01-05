@extends('layouts.user')


@section('title')
    laudrex
@endsection
@section('front-script')
    <link rel="stylesheet" href="{{ asset('style/assets/css/matrial-switch.css') }}">
@endsection
@section('breadcrumbs')
@endsection
@section('content')

    <main class="container">
      <div id="map" class="map"></div>
      <div id="info" class="info"></div>

    </main>
@endsection
@section('script')
<script>

</script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}
<script src="{{ asset('style/assets/js/track.js') }}"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API') }}&callback=init&v=weekly&libraries=places&region=MY"
    ></script>
@stop
