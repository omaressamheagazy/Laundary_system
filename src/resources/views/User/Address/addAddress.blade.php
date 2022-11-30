@extends('layouts.user')


@section('title')
    laudrex
@endsection

@section('breadcrumbs')
@endsection
@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Address</div>
                        <div class="card-body card-block">
                            <form action="{{ route('addAddress') }}" method="post" class="">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">phone</div>
                                        <input type="text" id="phone" name="phone"
                                            class="form-control @error('phone')is-invalid @enderror" placeholder="+60">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <label for="pac-input"> Your location </label>
                                        <input type="text" style="width:fit-content" id="pac-input" class="form-control"
                                            placeholder="Search" name="address">

                                        @error('address')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div id="map" style="height: 500px;width: 100%;z-index:99"></div>
                                    </div>
                                </div>


                                <input type="hidden" name="id" value="{{ Auth::id() }}">
                                <div class="form-actions form-group">
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- .endrow -->
    </div><!-- .animated -->
    </div><!-- .content -->
@endsection
@section('script')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('style/assets/js/map.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API') }}&callback=initAutocomplete&v=weekly&libraries=places&region=MY"
        defer></script>



@stop
