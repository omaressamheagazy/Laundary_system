@extends('layouts.driver')


@section('title')
    laudrex
@endsection

@section('breadcrumbs')
@endsection
@section('content')
    <div class="content mt-6">
        <div class="animated fadeIn">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Car</div>
                        <div class="card-body card-block">
                            <form action="{{ route('addCar') }}" method="post" class="" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Car Name</div>
                                        <input type="text" id="carName" name="carName"
                                        class="form-control @error('carName')is-invalid @enderror" placeholder="EX: X5, X6">
                                        <div class="input-group-addon"><i class="fa fa-car"></i></div>
                                        @error('carName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Car Model</div>
                                        <input type="text" id="model" name="model"
                                            class="form-control @error('model')is-invalid @enderror" placeholder="EX: X5, X6">
                                        <div class="input-group-addon"><i class="fa fa-car"></i></div>
                                        @error('model')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Car Color</div>
                                        <input type="text" id="color" name="color"
                                            class="form-control @error('color')is-invalid @enderror"">
                                        <div class="input-group-addon"><i class="fa fa-car"></i></div>
                                        @error('color')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Car Plate</div>
                                        <input type="text" id="plate" name="plate"
                                            class="form-control @error('plate')is-invalid @enderror"">
                                        <div class="input-group-addon"><i class="fa fa-car"></i></div>
                                        @error('plate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">licence image</div>
                                        <input type="file" id="licence" name="licence"
                                            class="form-control @error('licence')is-invalid @enderror"">
                                        <div class="input-group-addon"><i class="fa fa-car"></i></div>
                                        @error('licence')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Image of vehicle certificate</div>
                                        <input type="file" id="certificate" name="certificate"
                                            class="form-control @error('certificate')is-invalid @enderror"">
                                        <div class="input-group-addon"><i class="fa fa-car"></i></div>
                                        @error('certificate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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

@stop
