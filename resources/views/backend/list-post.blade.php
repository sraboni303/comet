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
                            <h3 class="page-title">All Posts</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">All Posts</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a id="" href="{{ route('create.post') }}" class="btn btn-primary float-right mt-2">Create</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-sm-12">
                        <a class="badge badge-primary" href="#">Published {{ ($published == 0 ? '' : $published) }}</a>
                        <a class="badge badge-danger" href="#">Trash {{ ($trash == 0 ? '' : $trash) }}</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Categories</th>
                                                <th>Tags</th>
                                                <th>Featured Type</th>
                                                <th>Posted</th>
                                                <th>Status</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($all_data as $data)
                                            @php
                                                $featured = json_decode($data->featured);
                                            @endphp
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $data->title }}</td>
                                                <td>{{ $data->user->name }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach ($data->categories as $cat)
                                                            <li>
                                                                {{ $cat->name }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        @foreach ($data->tags as $tag)
                                                            <li>
                                                                {{ $tag->name }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>{{ $featured->type }}</td>
                                                <td>{{ date('d M, Y', strtotime($data->created_at)) }}</td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input status_id="{{ $data->id }}" type="checkbox" id="status_{{ $loop->index+1 }}" class="check" {{ ($data->status == true ? "checked" : "") }}>
                                                        <label for="status_{{ $loop->index+1 }}" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="actions text-right">
                                                        <a class="btn btn-sm bg-success-light" href="#">
                                                            <i class="fe fe-pencil"></i>
                                                        </a>
                                                        <a trash_id="{{ $data->id }}" href="#" class="btn btn-sm bg-danger-light trash">
                                                            <i class="fe fe-trash"></i>
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
    </div>

    {{-- <!-- Add Modal -->
    <div class="modal fade" id="add_category_modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_category_form" method="POST">
                        @csrf
                        <div class="row form-row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input name="name" type="text" class="form-control">
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


    <!-- Edit Modal -->
    <div class="modal fade" id="edit_cat_modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_cat_form" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="get_id">
                        <div class="row form-row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input name="name" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Modal --> --}}






@endsection
