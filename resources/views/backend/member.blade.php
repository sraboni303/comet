@extends('backend.layouts.app')
@section('content')
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        @include('backend.layouts.header')
        @include('backend.layouts.menu')

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">Members</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Members</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a id="add_member_btn" href="#" class="btn btn-primary float-right mt-2">Add</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Photo</th>
                                                <th>Status</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="member_body">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Wrapper -->
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="add_member_modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_member_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row form-row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <select class="custom-select" name="role">
                                    <option selected disabled>-Select Role-</option>

                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mt-3">Photo</label>
                                    <input name="photo" type="file" class="form-control-file" id="preload_file">
                                    <img src="" alt="" id="preload_img" style="max-width:200px">
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /ADD Modal -->






@endsection
