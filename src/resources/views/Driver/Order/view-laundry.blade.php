@extends('layouts.driver')


@section('title')
    laudrex
@endsection

@section('breadcrumbs')
@endsection
@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <a href="{{ url()->previous() }}" class="card-header" style="cursor: pointer"><i class="fa-solid fa-arrow-left"> &nbsp;&nbsp; <small>Back</small> </i></a>
                        <div class="card-body card-block">
                            <div id="map" style="height: 500px;width: 100%;z-index:99"></div>
                            
                    </div>
                </div>
            </div>
        </div><!-- .endrow -->
    </div><!-- .animated -->
    </div><!-- .content -->

@endsection
@section('script')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        var latitude =  "{{ $laundry->latitude }}";
        var longitude =  "{{ $laundry->longitude }}";
    </script>
    <script src="{{ asset('style/assets/js/viewLaundry.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API') }}&callback=initMap&v=weekly&libraries=places&region=MY"
        defer></script>



@stop
