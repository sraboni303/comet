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
                                        <th>Permissions</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_data as $data)
                                        {{-- @php
                                            $permission = json_decode('permissions');
                                            $test = implode(', ', $permission);
                                        @endphp --}}
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->permissions }}</td>
                                            <td class="text-right">
                                                <div class="actions">
                                                    <a id="edit_role_btn" class="btn btn-sm bg-success-light" href="#">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                                    <a  data-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
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
                <h5 class="modal-title">Edit Specialities</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row form-row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Specialities</label>
                                <input type="text" class="form-control" value="Cardiology">
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

<!-- Delete Modal -->
<div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
        <!--	<div class="modal-header">
                <h5 class="modal-title">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>-->
            <div class="modal-body">
                <div class="form-content p-2">
                    <h4 class="modal-title">Delete</h4>
                    <p class="mb-4">Are you sure want to delete?</p>
                    <button type="button" class="btn btn-primary">Save </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Modal -->









    </div>
    <!-- /Main Wrapper -->
@endsection
