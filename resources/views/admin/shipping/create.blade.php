@extends('admin.layouts.main')
@section('title', 'Admin Dashboard - Add Shipping Method')


@section('content')
    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <h4 class="page-title mb-1">Shipping</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Shipping Methods</li>
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
                                <h5 class="header-title mb-4">Add Shipping Method</h5>
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
                                <form action="{{ route('admin-shipping-create') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-custom mb-4">
                                                <h5 class="font-size-14">Shipping method name in English</h5>
                                                <input name="name_en" type="text"
                                                       placeholder="Ex: Inner shipping"
                                                       class="form-control" value="{{ old('name_en') }}">
                                                @error('name_en')
                                                <div class="invalid-feedback"
                                                     style="display: block;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-custom mb-4">
                                                <h5 class="font-size-14">Shipping method name in Arabic</h5>
                                                <input name="name_ar" type="text"
                                                       placeholder="Ex: شحن داخلي"
                                                       class="form-control" value="{{ old('name_ar') }}">
                                                @error('name_ar')
                                                <div class="invalid-feedback"
                                                     style="display: block;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group form-group-custom mb-4">
                                                <h5 class="font-size-14">Start tariff</h5>
                                                <input name="start_tariff" type="number" min="0" step="any"
                                                       class="form-control" value="{{ old('start_tariff', '0.0') }}">
                                                @error('start_tariff')
                                                <div class="invalid-feedback"
                                                     style="display: block;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-group-custom mb-4">
                                                <h5 class="font-size-14">Tariff per 1 kilogram</h5>
                                                <div class="custom-file">
                                                    <input name="kilogram_tariff" type="number" min="0" step="any"
                                                           class="form-control" value="{{ old('kilo_tariff', '0.0') }}">
                                                    @error('kilo_tariff')
                                                    <div class="invalid-feedback"
                                                         style="display: block;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-group-custom mb-4">
                                                <h5 class="font-size-14">Minimum kilograms to start tariffing</h5>
                                                <div class="custom-file">
                                                    <input name="minimum_kilogram_tariff" type="number" min="0"
                                                           step="any"
                                                           class="form-control"
                                                           value="{{ old('minimum_kilogram_tariff', '0.0') }}">
                                                    @error('minimum_kilogram_tariff')
                                                    <div class="invalid-feedback"
                                                         style="display: block;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5 class="font-size-14">Shipping method status</h5>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-light active">
                                                    <input type="radio" name="is_active" id="option1"
                                                           value="1" {{ old('is_active') === '1' || old('is_active') === null ? 'checked' : '' }}>
                                                    Active
                                                </label>
                                                <label class="btn btn-light">
                                                    <input type="radio" name="is_active" id="option2"
                                                           value="0" {{ old('is_active') === '0' &&  old('is_active') !== null ? 'checked' : '' }}>
                                                    Inactive
                                                </label>
                                            </div>
                                            @error('is_active')
                                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn btn-primary waves-effect waves-light float-right"
                                                type="submit">Submit
                                        </button>
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
