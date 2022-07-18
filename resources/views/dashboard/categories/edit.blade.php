@extends('dashboard.layouts.main')
@section('title', 'Admin Dashboard - Edit Category #'.$id)


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
                                <h5 class="header-title mb-4">Edit Category #{{ $id }}</h5>
                                @if(session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        {{ session()->get('success') }}
                                    </div>
                                @elseif(session()->has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                                <form action="{{ route('admin-categories-edit', [$id, 'update_category']) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-custom mb-4">
                                                <h5 class="font-size-14">Category name in English</h5>
                                                <input name="name_en" type="text"
                                                       placeholder="Ex: Mobiles, Tablets & Accessories"
                                                       class="form-control" value="{{ old('name_en', $category->translate('en')->name) }}">
                                                @error('name_en')
                                                <div class="invalid-feedback"
                                                     style="display: block;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-custom mb-4">
                                                <h5 class="font-size-14">Category name in Arabic</h5>
                                                <input name="name_ar" type="text"
                                                       placeholder="Ex: هواتف، أجهزة التابلت وإكسسواراتها"
                                                       class="form-control" value="{{ old('name_ar', $category->translate('ar')->name) }}">
                                                @error('name_ar')
                                                <div class="invalid-feedback"
                                                     style="display: block;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-custom mb-4">
                                                <h5 class="font-size-14">Slug</h5>
                                                <input name="slug" type="text"
                                                       placeholder="Ex: mobiles-tablets-accessories"
                                                       class="form-control" value="{{ old('slug', $category->slug) }}">
                                                @error('slug')
                                                <div class="invalid-feedback"
                                                     style="display: block;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button name="update_category" value="details" class="btn btn-primary waves-effect waves-light" type="submit">Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                @if(session()->has('image_delete_success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        {{ session()->get('image_delete_success') }}
                                    </div>
                                @elseif(session()->has('image_delete_error'))
                                    <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        {{ session()->get('image_delete_error') }}
                                    </div>
                                @elseif(session()->has('image_delete_success'))
                                    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        {{ session()->get('image_delete_success') }}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 class="font-size-14">Category #{{ $category->id }} image:</h5>
                                    </div>
                                    <div class="col-sm-9">

                                        <form action="{{ route('admin-categories-edit', [$category->id, 'change_image']) }}" method="post" enctype="multipart/form-data">
                                            @if(empty($category->image_path))
                                                <div class="invalid-feedback" style="display: block;font-weight: bold !important;">No image was picked before.</div>
                                            @else
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <img height="60px" src="{{ $category->image_path }}" />
                                                    </div>
                                                    <div class="col-sm-2 align-self-center">
                                                        <a class="btn btn-danger waves-effect waves-light" href="{{ route('admin-categories-edit', [$category->id, 'delete_image']) }}">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="row">
                                                <div class="col-sm-5"><hr></div>
                                                <div class="col-sm-2 text-center">or</div>
                                                <div class="col-sm-5"><hr></div>
                                            </div>
                                            @csrf
                                            <div class="custom-file">
                                                <input name="image" type="file" class="custom-file-input"
                                                       id="validationCustomFile">
                                                <label class="custom-file-label" for="validationCustomFile">Choose
                                                    file...</label>
                                                @error('image')
                                                <div class="invalid-feedback"
                                                     style="display: block;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mt-4">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit" name="upload" value="change_image">Upload
                                                </button>
                                            </div>
                                        <form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 class="font-size-14">Activeness: <span style="color: {{ $category->is_active == 'Active' ? '#20724f' : '#f06543' }};font-weight: bold !important;">{{ $category->is_active }}</span></h5>
                                    </div>
                                    <div class="col-sm-9">
                                        @if($category->is_active == 'Active')
                                            <a href="{{ route('admin-categories-edit', [$category->id, 'toggle_activation']) }}" class="btn btn-danger waves-effect waves-light">Inactivate</a>
                                            <div class="invalid-feedback"
                                                 style="display: block;font-weight: bold !important;">Note: Inactivating a category will disable their products accordingly. No worries, you can activate it back. Nothing will be deleted.</div>
                                        @else
                                            <a href="{{ route('admin-categories-edit', [$category->id, 'toggle_activation']) }}" class="btn btn-success waves-effect waves-light">Activate</a>
                                            <div class="valid-feedback"
                                                 style="display: block;font-weight: bold !important;">Note: Activating back a category will enable their products accordingly.</div>
                                        @endif
                                    </div>
                                </div>
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
