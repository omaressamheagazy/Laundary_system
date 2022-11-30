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
            <div class="col-md-3">
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                  <img class="user-avatar rounded-circle" src="{{ asset('style/images/admin.jpg') }}" alt="User Avatar">
                  </div>
                  <p class="text-muted text-center">Customer</p>
                  <input type="file" name="admin_image" id="admin_image" style="opacity: 0;height:1px;display:none">
                  <a href="javascript:void(0)" class="btn btn-primary btn-block" id="change_picture_btn"><b>Change picture</b></a>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
          
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
              <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#detail" data-toggle="tab">Detail</a></li>
                    <li class="nav-item"><a class="nav-link" href="#update_detail" data-toggle="tab">Update Detail</a></li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="detail">
                      <form class="form-horizontal" method="POST" action="{{ url('profile') }}" id="detailform">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Name:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Name" value="{{ Auth::user()->name }}" name="name" readonly>
                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" placeholder="Email" value="{{ Auth::user()->email }}" name="email" readonly>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">No. Phone:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="nophone" placeholder="No. Phone" value="999{{ Auth::user()->nophone }}" name="no.phone" readonly>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="update_detail">
                    <form class="form-horizontal" method="POST" action="{{ url('profile') }}" id="updateform">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Name:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputname" placeholder="Enter Name" value="{{ Auth::user()->name }}" name="name">
                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputemail" placeholder="Enter Email" value="{{ Auth::user()->email }}" name="email">
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">No. Phone:</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputnophone" placeholder="Enter No. Phone" value="999{{ Auth::user()->nophone }}" name="favoritecolor">
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Update Detail</button>
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
