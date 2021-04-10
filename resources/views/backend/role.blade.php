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
                            <h3 class="page-title">Roles</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Roles</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a id="add_role_btn" href="#" class="btn btn-primary float-right mt-2">Add</a>
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
                                                <th>Roles</th>
                                                <th>Slug</th>
                                                <th>Permissions</th>
                                                <th>Status</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="role_body"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Wrapper -->


        <!-- Add Modal -->
        <div class="modal fade" id="add_role_modal" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="add_role_form" method="POST">
                            @csrf
                            <div class="row form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Role Name</label>
                                        <input name="name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label><b>Permissions:</b></label>
                                    <div class="list-group">
                                        <label class="list-group-item pl-4">
                                        <input name="per[]" class="form-check-input me-1" type="checkbox" value="One">
                                        One
                                        </label>
                                        <label class="list-group-item pl-4">
                                        <input name="per[]" class="form-check-input me-1" type="checkbox" value="Two">
                                        Two
                                        </label>
                                        <label class="list-group-item pl-4">
                                        <input name="per[]" class="form-check-input me-1" type="checkbox" value="Three">
                                        Three
                                        </label>
                                        <label class="list-group-item pl-4">
                                        <input name="per[]" class="form-check-input me-1" type="checkbox" value="Four">
                                        Four
                                        </label>
                                        <label class="list-group-item pl-4">
                                        <input name="per[]" class="form-check-input me-1" type="checkbox" value="Five">
                                        Five
                                        </label>
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

        <!-- Edit Details Modal -->
        <div class="modal fade" id="edit_role_modal" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Roles</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form id="edit_role_form" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="get_id">
                            <div class="row form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Role Name</label>
                                        <input name="name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label><b>Permissions:</b></label>
                                    <div class="list-group">
                                        <div id="edit_per">

                                        </div>
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
    <!-- /Main Wrapper -->
@endsection
