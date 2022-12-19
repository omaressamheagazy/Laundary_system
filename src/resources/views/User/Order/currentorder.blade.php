@extends('layouts.user')


@section('title')
    laudrex
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Current Order</h1>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Package Name</th>
                    <th scope="col">Price</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                @csrf
                    <input type="hidden" class="id" value="{{ Auth::id() }}">
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('contents')
    <div class="content mt-3">
        <div class="animated fadeIn">

        </div><!-- .animated -->
    </div><!-- .content -->
@endsection