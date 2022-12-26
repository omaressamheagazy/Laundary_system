@extends('layouts.user')


@section('title')
    laudrex
@endsection


@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">



            <div class="p-4 full-height " id="options_container" style="display: block; margin: 0px -20px">

                <h1 align="center" class="mt-4">Choose your Package</h1>

                <div class="row p-5 text-center">
                    @foreach ($packages as $package)
                        @php $totalPrice = 0 @endphp
                        @foreach ($package->services as $service)
                            @php $totalPrice+= $service->price @endphp
                        @endforeach
                        <div class="col-md-4">
                            <div class="border border-primary p-4 rounded bg-white zoom">
                                <h3>{{ $package['name'] }}</h3>
                                <p class="my-2">Ideal service for first time</p>
                                <h1 class="text-primary mt-4">{{ $totalPrice }} MYR</h1>
                                <hr>
                                <div class="text-left p-4">
                                    <h4 class="mb-4">Sub Services comparison</h4>
                                    @foreach ($package->services as $service)
                                        <span><i class="fa fa-check text-success">&nbsp;</i>{{ $service->name }}</span><br>
                                    @endforeach
                                </div>
                                <form action="{{ route('add-to-cart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ Auth::id() }}">
                                    <input type="hidden" name="package_id" value={{ $package['id'] }}>
                                    <div>
                                        <button class="btn btn-outline-primary">Add to cart</button>
                                    </div>
                                </form>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                    @endforeach



                </div>

            </div>


        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
