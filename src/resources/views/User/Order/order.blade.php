@extends('layouts.user')


@section('title')
    laudrex
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Order Management</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">



            <div class="p-4 full-height " id="options_container" style="display: block; margin: 0px -20px">

                <h1 align="center" class="mt-4">Choose your Package</h1>

                <div class="row p-5 text-center">
                    <form class="col-md-4" method="POST" action="{{ route('order') }}" id="order">
                    @csrf
                        <input type="hidden" name="id" value="{{ Auth::id() }}">
                        <div class="border border-primary p-4 rounded bg-white zoom">
                            <h3 value="Clean" name="package_name">Clean</h3>
                            <p class="my-2">Ideal service for first time</p>
                            <h1 class="text-primary mt-4" value="10.00" name="price">$10.00</h1>

                            <hr>

                            <div class="text-left p-4">
                                <h4 class="mb-4">Sub Services comparison</h4>

                                    <span><i class="fa fa-check text-success">&nbsp;</i>Towels</span><br>
                                    <span><i class="fa fa-check text-success mt-3">&nbsp;</i>Pillowcases</span><br>
                                    <span><i class="fa-solid fa-xmark text-danger mt-3">&nbsp;&nbsp;</i>Sheets</span><br>
                                    <span><i class="fa fa-check text-success mt-3">&nbsp;</i>Blankets</span><br>
                                    <span><i class="fa-solid fa-xmark text-danger mt-3">&nbsp;&nbsp;</i>Face Cloths</span><br>
                                    <span><i class="fa fa-check text-success mt-3">&nbsp;</i>Pillowcases</span><br>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-outline-primary">Add to cart</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="border border-primary p-4 rounded bg-white zoom">
                            <h3>Dry</h3>
                            <p class="my-2">Ideal service for buyers</p>
                            <h1 class="text-primary mt-4">$15.00</h1>

                            <hr>

                            <div class="text-left p-4">
                                <h4 class="mb-4">Sub Services comparison</h4>

                                <span><i class="fa-solid fa-xmark text-danger">&nbsp;&nbsp;</i>Face Cloths</span><br>
                                    <span><i class="fa fa-check text-success mt-3">&nbsp;</i>Towels</span><br>
                                    <span><i class="fa fa-check text-success mt-3">&nbsp;</i>Pillowcases</span><br>
                                    <span><i class="fa fa-check text-success mt-3">&nbsp;</i>Blankets</span><br>
                                    <span><i class="fa-solid fa-xmark text-danger mt-3">&nbsp;&nbsp;</i>Sheets</span><br>
                                    <span><i class="fa fa-check text-success mt-3">&nbsp;</i>Pillowcases</span><br>
                            </div>
                            <div>
                                <button class="btn btn-outline-primary">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="border border-primary p-4 rounded bg-white zoom">
                            <h3>Clean & Dry</h3>
                            <p class="my-2">best service for all</p>
                            <h1 class="text-primary mt-4">$20.00</h1>

                            <hr>

                            <div class="text-left p-4">
                                <h4 class="mb-4">Sub Services comparison</h4>

                                    <span><i class="fa fa-check text-success">&nbsp;</i>Towels</span><br>
                                    <span><i class="fa fa-check text-success mt-3">&nbsp;</i>Pillowcases</span><br>
                                    <span><i class="fa-solid fa-xmark text-danger mt-3">&nbsp;&nbsp;</i>Sheets</span><br>
                                    <span><i class="fa fa-check text-success mt-3">&nbsp;</i>Blankets</span><br>
                                    <span><i class="fa fa-check text-success mt-3">&nbsp;</i>Pillowcases</span><br>
                                    <span><i class="fa-solid fa-xmark text-danger mt-3">&nbsp;&nbsp;</i>Face Cloths</span><br>
                            </div>
                            <div>
                                <button class="btn btn-outline-primary">Add to cart</button>
                            </div>
                        </div>
                    </div>
            </div>

        </div>


        </div><!-- .animated -->
    </div><!-- .content -->
@endsection

