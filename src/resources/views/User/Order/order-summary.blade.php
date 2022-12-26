@extends('layouts.user')


@section('title')
    laudrex
@endsection

@section('front-script')
    <link rel="stylesheet" href="{{ asset('style/assets/css/cart.css') }}">
@endsection
@section('content')
    <div class="card">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>Shopping Cart</b></h4>
                        </div>
                        @inject('cartItem', 'App\Http\Controllers\User\OrderController')
                        <div class="col align-self-center text-right text-muted">{{ $cartItem::countCartItems() }} items
                        </div>
                    </div>
                </div>
                @php
                    $totalPackagesPrice = 0;
                @endphp

                @foreach ($items as $item)
                    @php $Packageprice = 0; @endphp
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="{{ asset('uploads\images\laundry.png') }}">
                            </div>
                            <div class="col">
                                <div class="row text-muted">Package</div>
                                <div class="row">{{ $item->packages->name }}</div>
                            </div>
                            <div class="col">
                            </div>
                            @foreach ($item->packages->services as $service)
                                @php $Packageprice+= $service->price @endphp
                            @endforeach
                            <div class="col">MYR {{ $Packageprice }}

                                <form action="{{ route('delete-item', ['id' => $item['id']]) }}" style="display: inline"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="packageName[]">
                                    <input type="hidden" name="price[]">
                                    <button type="submit" class="close">&#10005;</button>
                                </form>
                            </div>
                            @php
                                $totalPackagesPrice += $Packageprice;
                            @endphp
                        </div>
                    </div>
                @endforeach

                <div class="back-to-shop"><a href="{{ route('order') }}">&leftarrow;</a><span class="text-muted">Back to
                        menu</span>
                </div>
            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5><b>Summary</b></h5>
                </div>
                <hr>
                <div class="row">
                    <div class="col" style="padding-left:0;">ITEMS {{ $cartItem::countCartItems() }}</div>
                    <div class="col text-right">MYR {{ $totalPackagesPrice }} </div>
                </div>
                <form
                action="{{ route('checkout', ['totalPackagesPrice' => $totalPackagesPrice]) }}"
                method="POST" style="display: inline">
                @csrf
                <p>SHIPPING</p>
                <select name="deliveryType">
                    @foreach ($deliveryTypes as $delivery)
                        <option class="text-muted" value="{{ $delivery['id'] }}"> {{ $delivery['type'] }}
                            MYR{{ $delivery['price'] }}</option>
                    @endforeach
                </select>
                <p>GIVE CODE</p>
                <input id="code" placeholder="Enter your code">
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    {{-- <div class="col">TOTAL PRICE</div>
                    <div class="col text-right">MYR {{ $totalPackagesPrice }}</div> --}}
                </div>
                    <button type="submit" class="checkButton">CHECKOUT</button>
                </form>
            </div>
        </div>

    </div>
@endsection
