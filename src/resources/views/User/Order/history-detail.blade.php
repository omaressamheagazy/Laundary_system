@extends('layouts.user')

@section('title')
    laudrex
@endsection
@php
    use App\Enums\OrderStatus;
@endphp
@section('front-script')
    <link rel="stylesheet" href="{{ asset('style/assets/css/order.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/request-detail.css') }}">
@endsection
@section('content')

    <section class="section-space-default-less30 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-12 mb-30">
                    <div class="service-layout5" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                        <ul role="tablist" class="nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="#one" role="tab" data-toggle="tab">
                                    <i class="fa-regular fa-user"></i></i>Driver Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#two" role="tab" data-toggle="tab">
                                    <i class="fa-regular fa-file-lines"></i>Order Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12 mb-30">
                    @php
                        $driver = $order->trackers->first()->driver;
                    @endphp
                    <div class="service-layout5">
                        <div class="tab-content">
                            {{-- Driver Details start here --}}
                            <div role="tabpanel" class="tab-pane active" id="one">
                                <div></div>
                                <div class="collapse show" id="collapseExample">
                                    <div class="card mb-3" style="border-radius: .5rem;">
                                        <div class="row g-0">
                                            <div class="col-md-4 gradient-custom text-center text-white"
                                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                                <img src="{{ asset('uploads\images\user_Icon.png') }}" alt="Avatar"
                                                    class="img-fluid my-4" style="width: 80px;" />
                                                <h5 style="color: black">{{ $order->user->name }}</h5>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body p-4">
                                                    <h6 class="section-title-dark text-left">Information
                                                    </h6>
                                                    <hr class="mt-0 mb-4">
                                                    <div class="row pt-1">
                                                        @php
                                                            $driverCar = $driver->cars->where('in_use', 1)->first();
                                                        @endphp
                                                        <div class="col-6 mb-3">
                                                            <h6 class="">Car
                                                            </h6>
                                                            <p class="text-muted">
                                                                {{ $driverCar->name . ' - ' . $driverCar->model }}</p>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <h6 class="">Plate Number
                                                            </h6>
                                                            <p class="text-muted">{{ $driverCar->plate_number }}</p>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <h6 class="">Car color
                                                            </h6>
                                                            <p class="text-muted">{{ $driverCar->color }}</p>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <h6 class="">Phone
                                                            </h6>
                                                            <p class="text-muted">
                                                                {{ $order->user->addresses->first()->phone }} </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Driver Details end here --}}

                            <div role="tabpanel" class="tab-pane" id="two">
                                {{-- Order Details start here --}}

                                <div class="card" style="border-radius: 10px;">
                                    <div class="card-header px-4 py-5">
                                        <h5 class="text-muted mb-0">Driver detail
                                        </h5>
                                    </div>
                                    <div class="card-body p-4">
                                        @foreach ($order->details as $detail)
                                            <div class="card shadow-0 border mb-4">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src="{{ asset('uploads\images\laundry.png') }}"
                                                                class="img-fluid" alt="Phone">
                                                        </div>
                                                        <div
                                                            class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                            <p class="text-muted mb-0"> {{ $detail->item }} </p>
                                                        </div>
                                                        <div
                                                            class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                        </div>
                                                        <div
                                                            class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                        </div>
                                                        <div
                                                            class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                            <p class="text-muted mb-0 small">MYR {{ $detail->price }} </p>
                                                        </div>
                                                        <div
                                                            class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                            <a data-toggle="collapse"
                                                                href="#collapseExample{{ $detail->id }}"
                                                                style="color: #3c3939" role="button" aria-expanded="false"
                                                                aria-controls="collapseExample{{ $detail->id }}">
                                                                Detail <i class="fa-solid fa-angle-down"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">

                                                    <div class="collapse" id="collapseExample{{ $detail->id }}">

                                                        @foreach ($detail->package->services as $serivce)
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <img src="{{ asset('uploads\images\service.png') }}"
                                                                        class="img-fluid" alt="Phone">
                                                                </div>
                                                                <div
                                                                    class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                                    <p class="text-muted mb-0">{{ $serivce->name }}</p>

                                                                </div>
                                                                <div
                                                                    class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                                </div>
                                                                <div
                                                                    class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                                </div>
                                                                <div
                                                                    class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                                    </a>
                                                                </div>
                                                                <div
                                                                    class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                                    <p class="text-muted mb-0 small">MYR
                                                                        {{ $serivce->price }}</p>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach


                                        <div class="d-flex justify-content-between pt-2">
                                            <p class="fw-bold mb-0"><b>Order Details</b></p>
                                            <p class="text-muted mb-0"><span class="fw-bold me-4"><b>Total:</b></span> MYR
                                                {{ $order->total_price }} </p>
                                        </div>

                                        <div class="d-flex justify-content-between pt-2">
                                            <p class="text-muted mb-0">Delivery Type : {{ $order->deliveries->type }}</p>
                                            <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Fee:</span> MYR
                                                {{ $order->deliveries->price }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between ">
                                            <p class="text-muted mb-0">Order Number : {{ $order->id }}</p>
                                            <p class="text-muted mb-0"></p>
                                        </div>
                                    </div>
                                    <div class="card-footer border-0 px-4 py-5"
                                        style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                                        <h4
                                            class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">
                                            Total paid: MYR {{ $order->deliveries->price + $order->total_price }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('style/assets/js/infobox.js') }}"></script>
    <script src="{{ asset('style/assets/js/sr.js') }}"></script>

@stop
