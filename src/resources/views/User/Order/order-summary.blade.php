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
                        @inject('cartItem','App\Http\Controllers\User\OrderController')
                        <div class="col align-self-center text-right text-muted">{{ $cartItem::countCartItems()}} items</div>
                    </div>
                </div>
                @php 
                $totalPrice = 0;
                $price;
                $itemName;
                @endphp
                
                @foreach ($items as $item)
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="{{asset('uploads\images\laundry.png')}}"></div>
                            <div class="col">
                                <div class="row text-muted">Package</div>
                                <div class="row">{{ $item->packages->name }}</div>
                            </div>
                            <div class="col">
                            </div>
                            <div class="col">MYR {{ $item->packages->price }} 

                                <form action="{{ route('delete-item', [ 'id' => $item['id']] ) }}"      style="display: inline" method="POST">
                                    @csrf
                                    <input type="hidden" name="packageName[]">
                                    <input type="hidden" name="price[]">
                                    <button type="submit" class="close">&#10005;</button>
                                </form>
                            </div>
                            @php
                                $totalPrice += $item->packages->price; 
                                $itemName[] = $item->packages->name;
                                $price[] = $item->packages->price;
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
                    <div class="col" style="padding-left:0;">ITEMS {{ $cartItem::countCartItems()}}</div>
                    <div class="col text-right">MYR {{ $totalPrice }} </div>
                </div>
                <form>
                    <p>SHIPPING</p>
                    <select>
                        <option class="text-muted">Standard-Delivery- MYR3.00</option>
                    </select>
                    <p>GIVE CODE</p>
                    <input id="code" placeholder="Enter your code">
                </form>
                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">TOTAL PRICE</div>
                    <div class="col text-right">MYR {{ $totalPrice + 3}}</div>
                </div>
                <form action="{{route('checkout', ['price' => $totalPrice]) }}" method="POST" style="display: inline">
                    @csrf
                    {{-- @php
                        $itemName = implode(",", $itemName);
                        $price = implode(",", $price);
                    @endphp --}}
                    {{-- <input type="hidden" name="itemName[]" value="{{ $itemName}}">
                    <input type="hidden" name="price[]" value="{{ $price}}"> --}}
                    <button type="submit" class="checkButton">CHECKOUT</button>
                </form>
            </div>
        </div>

    </div>
@endsection
