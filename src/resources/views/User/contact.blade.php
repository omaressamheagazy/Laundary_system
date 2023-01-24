@extends('layouts.user')


@section('title')
    laudrex
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Contact Form</h1>
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

    <div class="container mt-5">
        <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        <form action="" method="post" action="{{ route('contact.store') }}">
    @csrf
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" id="name">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control @error('email')is-invalid @enderror" name="email" id="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control @error('phone')is-invalid @enderror" name="phone" id="phone">
        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label>Subject</label>
        <input type="text" class="form-control @error('subject')is-invalid @enderror" name="subject"
            id="subject">
        @error('subject')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label>Message</label>
        <textarea class="form-control @error('message')is-invalid @enderror" name="message" id="message"
            rows="4"></textarea>
        @error('message')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
    </form>
    </div>
@endsection

@section('contents')
    <div class="content mt-3">
        <div class="animated fadeIn">

        </div><!-- .animated -->
    </div><!-- .content -->
@endsection