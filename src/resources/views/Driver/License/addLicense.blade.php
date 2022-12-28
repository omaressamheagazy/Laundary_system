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
                        <div class="card-header">License</div>
                        <div class="card-body card-block">
                            <form action="{{ route('addLicense') }}" method="post" class="" enctype="multipart/form-data">
                                @csrf


                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">Valid until</div>
                                        <input type="date" id="date" name="date"
                                            class="form-control @error('date')is-invalid @enderror" placeholder="EX: X5, X6">
                                        <div class="input-group-addon"><i class="fa fa-car"></i></div>
                                        @error('date')
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
