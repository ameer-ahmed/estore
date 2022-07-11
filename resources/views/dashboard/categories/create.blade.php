@extends('dashboard.layouts.main')
@section('title', 'Admin Dashboard - Add New Category')


@section('content')
    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <h4 class="page-title mb-1">CATEGORIES AND PRODUCTS</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="header-title mb-4">Add New Category</h5>
                                @if(session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                                <form action="{{ route('admin-categories-create') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-custom mb-4">
                                                <h5 class="font-size-14">Category name in English</h5>
                                                <input name="name_en" type="text" placeholder="Ex: Mobiles, Tablets & Accessories" class="form-control">
                                                @error('name_en')
                                                <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-custom mb-4">
                                                <h5 class="font-size-14">Category name in Arabic</h5>
                                                <input name="name_ar" type="text" placeholder="Ex: هواتف، أجهزة التابلت وإكسسواراتها" class="form-control">
                                                @error('name_ar')
                                                <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-custom mb-4">
                                                <h5 class="font-size-14">Slug</h5>
                                                <input name="slug" type="text" placeholder="Ex: mobiles-tablets-accessories" class="form-control">
                                                @error('slug')
                                                <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="font-size-14">Category image</h5>
                                            <div class="custom-file">
                                                <input name="image" type="file" class="custom-file-input" id="validationCustomFile">
                                                <label class="custom-file-label" for="validationCustomFile">Choose file...</label>
                                                @error('image')
                                                <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-2" style="display: table;">
                                            <div class="custom-control custom-checkbox mb-2" style="display: table-cell;vertical-align: middle;text-align: center;">
                                                <input name="is_active" type="checkbox" class="custom-control-input" id="customCheck1" checked>
                                                <label class="custom-control-label" for="customCheck1">Active</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- end page-content-wrapper -->
    </div>
@endsection
