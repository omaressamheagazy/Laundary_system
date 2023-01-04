@extends('layouts.driver')


@section('title')
    laudrex
@endsection

@section('front-script')
    <link rel="stylesheet" href="{{ asset('style/assets/css/order.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/request-detail.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/ion.rangeSlider.skinFlat.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/grey.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/elegant_font/elegant_font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/fontello/css/fontello.min.css') }}">
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
                                    <i class="fa-regular fa-user"></i></i>User Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#two" role="tab" data-toggle="tab">
                                    <i class="fa-regular fa-file-lines"></i>Order Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#three" role="tab" data-toggle="tab">
                                    <i class="fa-solid fa-shop"></i>Laundry Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12 mb-30">
                    <div class="service-layout5">
                        <div class="tab-content">
                            {{-- User Details start here --}}
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

                                                        <div class="col-6 mb-3">
                                                            <h6 class="">Phone
                                                            </h6>
                                                            <p class="text-muted">
                                                                {{ $order->user->addresses->first()->phone }} </p>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <h6 class="">
                                                                Address</h6>
                                                            <p class="text-muted">
                                                                {{ $order->user->addresses->where('default_address',1)->first()->address }}</p>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <h6 class="">Email
                                                            </h6>
                                                            <p class="text-muted">{{ $order->user->email }}</p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- User Details end here --}}

                            <div role="tabpanel" class="tab-pane" id="two">
                                {{-- Order Details start here --}}

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
                            {{-- Laundry Details start here --}}

                            <div role="tabpanel" class="tab-pane" id="three">
                                <div class="collapse show" id="collapseExample13">
                                    <div id="tools">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-4 col-5">
                                                <div class="styled-select">
                                                    <select name="sort_rating" id="sort_rating">
                                                        <option value="" selected>Sort by Nearest </option>
                                                        <i class="fa-solid fa-angle-down"></i>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-sm-8 col-7">
                                                <a href="grid_list.html" class="bt_filters"><i class="icon-th"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <!--End tools -->
                                    @foreach ($laundries as $laundry)
                                        <div class="strip_list wow fadeIn" data-wow-delay="0.1s">
                                            <div class="ribbon_1">
                                                Popular
                                            </div>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="desc">
                                                        <div class="thumb_strip">
                                                            <a href="detail_page.html"><img src={{ asset('uploads/'.$laundry->image) }}
                                                                    alt=""></a>
                                                        </div>

                                                        <h3>{{ $laundry->name }}</h3>
                                                        <div class="type">
                                                            {{-- Mexican / American --}}
                                                        </div>
                                                        {{-- <div class="location">
                                                            Inside UTM. <span class="opening">Open</span>
                                                            Minimum order: $15
                                                        </div> --}}
                                                        <ul>
                                                            <li>Suitable for: {{ $laundry->suitable_for }}<i class="icon_check_alt2 ok"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="go_to">
                                                        <div>
                                                            <a href="{{ route('viewLaundry',['id' => $laundry['id']]) }}" class="btn_1">View On Map</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- End row-->
                                        </div><!-- End strip_list-->
                                        <!-- End Content =============================================== -->
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-group btn-group-md float-right">
                <button type="button" class="btn btn-secondary mr-2">Back</button>
            </div>
        </div>
    </section>
    <!-- Service Area End Here -->

@endsection
@section('script')
    <script src="{{ asset('style/assets/js/ion.rangeSlider.js') }}"></script>
    <script src="{{ asset('style/assets/js/infobox.js') }}"></script>
    <script src="{{ asset('style/assets/js/sr.js') }}"></script>

@stop
