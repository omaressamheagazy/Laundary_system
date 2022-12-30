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
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="{{ asset('uploads\images\user_Icon.png') }}" alt="Avatar" class="img-fluid my-4"
                                    style="width: 80px;" />
                                <h5 style="color: black">Omar Essam</h5>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Information</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">

                                        <div class="col-6 mb-3">
                                            <h6>Phone</h6>
                                            <p class="text-muted">123 456 789 </p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6>Address</h6>
                                            <p class="text-muted">123 456 789</p>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <h6>Email</h6>
                                            <p class="text-muted">info@example.com</p>
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
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-10 col-xl-8">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header px-4 py-5">
                            <h5 class="text-muted mb-0">Order detail
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
                                <p class="small text-muted mb-0">Receipt Voucher : 1KAU9-84UIL</p>
                            </div>
                            <div class="card shadow-0 border mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{ asset('uploads\images\laundry.png') }}"
                                                class="img-fluid" alt="Phone">
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0">Standard</p>
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <p class="text-muted mb-0 small">$499</p>
                                        </div>
                                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                            <a data-toggle="collapse" href="#collapseExample" style="color: #3c3939"
                                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                                Detail <i class="fa-solid fa-angle-down"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">

                                    <div class="collapse" id="collapseExample">

                                        
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="{{ asset('uploads\images\service.png') }}"
                                                    class="img-fluid" alt="Phone">
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0">Clean</p>

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
                                                <p class="text-muted mb-0 small">$499</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="{{ asset('uploads\images\service.png') }}"
                                                    class="img-fluid" alt="Phone">
                                            </div>
                                            <div
                                                class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0">Clean</p>

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
                                                <p class="text-muted mb-0 small">$499</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="d-flex justify-content-between pt-2">
                                <p class="fw-bold mb-0">Order Details</p>
                                <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span> $898.00</p>
                            </div>

                            <div class="d-flex justify-content-between pt-2">
                                <p class="text-muted mb-0">Invoice Number : 788152</p>
                                <p class="text-muted mb-0"><span class="fw-bold me-4">Discount</span> $19.00</p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="text-muted mb-0">Invoice Date : 22 Dec,2019</p>
                                <p class="text-muted mb-0"><span class="fw-bold me-4">GST 18%</span> 123</p>
                            </div>

                            <div class="d-flex justify-content-between mb-5">
                                <p class="text-muted mb-0">Recepits Voucher : 18KU-62IIK</p>
                                <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span> Free</p>
                            </div>
                        </div>
                        <div class="card-footer border-0 px-4 py-5"
                            style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                            <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
                                paid: <span class="h2 mb-0 ms-2">$1040</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
