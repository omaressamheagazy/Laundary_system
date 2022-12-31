@extends('layouts.driver')


@section('title')
    laudrex
@endsection
@section('breadcrumbs')
@endsection
@section('front-script')
@endsection
@section('content')
    <section class="vh-100" style="background-color">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-10 col-xl-8">
                    <h6 class="mb-3" style="cursor:pointer; width:fit-content;" data-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="true" aria-controls="collapseExample">
                        User Details
                        <small><i class="fa-solid fa-angle-down"></i></small>
                    </h6>
                    <div class="collapse show" id="collapseExample">
                        <div class="card mb-3" style="border-radius: .5rem;">
                            <div class="row g-0" >
                                <div class="col-md-4 gradient-custom text-center text-white"
                                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                    <img src="{{ asset('uploads\images\user_Icon.png') }}" alt="Avatar"
                                        class="img-fluid my-4" style="width: 80px;" />
                                    <h5 style="color: black">{{ $order->user->name }}</h5>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <h6>Information</h6>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">

                                            <div class="col-6 mb-3">
                                                <h6>Phone</h6>
                                                <p class="text-muted">{{ $order->user->addresses->first()->phone }} </p>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <h6>Address</h6>
                                                <p class="text-muted">{{ $order->user->addresses->first()->address }}</p>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <h6>Email</h6>
                                                <p class="text-muted">{{ $order->user->email }}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="h-100 gradient-custom">
        <div class="container py-1 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-10 col-xl-8">
                    <h6 class="mb-3" style="cursor:pointer; width:fit-content;" data-toggle="collapse" href="#collapseExample1"
                        role="button" aria-expanded="true" aria-controls="collapseExample">
                        Order Details
                        <small><i class="fa-solid fa-angle-down"></i></small>
                    </h6>
                    <div class="collapse show" id="collapseExample1">
                        <div class="card" style="border-radius: 10px;">

                            <div class="card-header px-4 py-5">
                                <h5 class="text-muted mb-0">Order detail
                                </h5>
                            </div>
                            <div class="card-body p-4">
                                @foreach ($order->details as $detail)
                                    <div class="card shadow-0 border mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img src="{{ asset('uploads\images\laundry.png') }}" class="img-fluid"
                                                        alt="Phone">
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
                                                    <a data-toggle="collapse" href="#collapseExample{{ $detail->id }}"
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
                                                            <p class="text-muted mb-0 small">MYR {{ $serivce->price }}</p>
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
                                <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">
                                    Total
                                    paid: <span class="h2 mb-0 ms-2">MYR
                                        {{ $order->deliveries->price + $order->total_price }}</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
