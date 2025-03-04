@extends('backend.layouts.app')

@section('content')

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        @include('backend.layouts.header')
        @include('backend.layouts.menu')



        <!-- Main Wrapper -->
        <div class="page-wrapper" style="min-height: 548px;">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-header">
                            <div class="row align-items-center">
                                <div class="col-auto profile-image">
                                    <a href="#">
                                        <img class="rounded-circle" alt="User Image" src="{{ URL::to('') }}/media/users/{{ $user->photo }}">
                                    </a>
                                </div>
                                <div class="col ml-md-n2 profile-user-info">
                                    <h4 class="user-name mb-0">{{ Auth::user()->name }}</h4>
                                    <h6 class="text-muted">{{ Auth::user()->email }}</h6>
                                    <div class="user-Location"><i class="fa fa-map-marker"></i> Florida, United States</div>
                                    <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                </div>
                                <div class="col-auto profile-btn">
                                    <a id="change_btn" href="#" class="btn btn-danger">Change Profile Picture</a>
                                </div>

                                {{-- Change Profile Picture Modal --}}
                                <div id="change_modal" class="modal fade">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content text-center">
                                            <form id="image_update_form" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="card">
                                                    <input type="hidden" name="old_photo" value="{{ Auth::user()->photo }}">
                                                    <img src="{{ URL::to('') }}/media/users/{{ Auth::user()->photo }}" class="card-img-top mt-4 mx-auto" alt="">
                                                    <div class="card-body">
                                                      <input type="file" id="profile_photo" style="display: none" name="photo">
                                                      <label class="btn btn-success" style="cursor: pointer" for="profile_photo">Browse Photo</label>
                                                    </div>
                                                    <div class="card-footer">
                                                        <input type="submit" class="btn btn-block btn-info" style="cursor: pointer">
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-menu">
                            <ul class="nav nav-tabs nav-tabs-solid">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content profile-tab-cont">

                            <!-- Personal Details Tab -->
                            <div class="tab-pane fade show active" id="per_details_tab">

                                <!-- Personal Details -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title d-flex justify-content-between">
                                                    <span>Personal Details</span>
                                                    <a class="edit-link" href="#"><i class="fa fa-edit mr-1"></i>Edit</a>
                                                </h5>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                                    <p class="col-sm-10">{{ Auth::user()->name }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                                    <p class="col-sm-10">{{ Auth::user()->email }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                                    <p class="col-sm-10">+ {{ Auth::user()->phone_number }}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-2 text-muted text-sm-right mb-0">Username</p>
                                                    <p class="col-sm-10 mb-0">{{ Auth::user()->username }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Edit Details Modal -->
                                        <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Personal Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="edit_profile_form" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="get_id" value="">
                                                            <div class="row form-row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input name="name" type="text" class="form-control" value="{{ $user->name }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Username</label>
                                                                        <input name="username" type="text" class="form-control" value="{{ $user->username }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Email ID</label>
                                                                        <input name="email" type="email" class="form-control" value="{{ $user->email }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Mobile</label>
                                                                        <input name="phone_number" type="text" value="{{ $user->phone_number }}" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Edit Details Modal -->

                                    </div>


                                </div>
                                <!-- /Personal Details -->

                            </div>
                            <!-- /Personal Details Tab -->

                            <!-- Change Password Tab -->
                            <div id="password_tab" class="tab-pane fade">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Change Password</h5>
                                        <div class="row">
                                            <div class="col-md-10 col-lg-6">
                                                <form id="change_password_form" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label>Old Password</label>
                                                        <input name="old_password" type="password" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input name="new_password" type="password" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Confirm Password</label>
                                                        <input name="confirm_password" type="password" class="form-control">
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Change Password Tab -->

                        </div>
                    </div>
                </div>

            </div>
        </div>







    </div>
    <!-- Main Wrapper End -->
@endsection
