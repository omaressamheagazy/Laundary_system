@extends('layouts.user')


@section('title')
    laudrex
@endsection

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Profile</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#detail" data-toggle="tab">Detail</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#update_detail" data-toggle="tab">Update
                                        Detail</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="detail">
                                    <form class="form-horizontal" method="POST" action="{{ url('profile') }}"
                                        id="detailform">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name" placeholder="Name"
                                                    value="{{ Auth::user()->name }}" name="name" readonly>
                                                <span class="text-danger error-text name_error"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="email"
                                                    placeholder="Email" value="{{ Auth::user()->email }}" name="email"
                                                    readonly>
                                                <span class="text-danger error-text email_error"></span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="update_detail">
                                    <form class="form-horizontal" method="POST" action="{{ route('profile') }}"
                                        id="updateform">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ Auth::id() }}">
                                        <form class="form-horizontal" method="POST" action="{{ url('profile') }}"
                                            id="updateform">
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Name:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputname"
                                                        placeholder="Enter Name" value="{{ Auth::user()->name }}"
                                                        name="name">
                                                    <span class="text-danger error-text name_error"></span>
                                                </div>
                                            </div>
                                            <!-- div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputemail"
                                                        placeholder="Enter Email" value="{{ Auth::user()->email }}"
                                                        name="email">
                                                    <span class="text-danger error-text email_error"></span>
                                                </div>
                                            </div -->
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-success">Update Detail</button>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('contents')
    <div class="content mt-3">
        <div class="animated fadeIn">

        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
