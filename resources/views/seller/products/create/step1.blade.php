@php use Mcamara\LaravelLocalization\Facades\LaravelLocalization; @endphp
@extends('seller.layouts.main')
@section('title', 'Seller Dashboard - Add New Product - Step One')

@section('content')

    <div class="page-content">
        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <h4 class="page-title mb-1">SELL</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Products</li>
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
                                <h5 class="header-title mb-4">Add New Product - Step One: Initial Product Data</h5>
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
                                <form action="{{ route('seller-product-create-1') }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-custom mb-4">
                                                <h5 class="font-size-14">Product Initial Name in English</h5>
                                                <input name="init_name_en" type="text"
                                                       placeholder="Ex: Apple iPhone XS Max With Facetime"
                                                       class="form-control" value="{{ old('init_name_en') }}">
                                                @error('init_name_en')
                                                <div class="invalid-feedback"
                                                     style="display: block;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-custom mb-4">
                                                <h5 class="font-size-14">Product Initial Name in Arabic</h5>
                                                <input name="init_name_ar" type="text"
                                                       placeholder="Ex: ابل ايفون اكس اس ماكس بخاصية فيس تايم"
                                                       class="form-control" value="{{ old('init_name_ar') }}">
                                                @error('init_name_ar')
                                                <div class="invalid-feedback"
                                                     style="display: block;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-custom mb-4">
                                                <h5 class="font-size-14">Product Initial Price</h5>
                                                <input name="init_price" type="number" min="0" step="0.01"
                                                       class="form-control" value="{{ old('init_price', 0) }}">
                                                @error('init_price')
                                                <div class="invalid-feedback"
                                                     style="display: block;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-group-custom mb-4">
                                                <h5 class="font-size-14">Product Category</h5>
                                                <select name="category" class="form-control">
                                                    <option value="" selected="">Select a category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                <div class="invalid-feedback"
                                                     style="display: block;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div id="product_options">
                                        @if(!empty(old('option_number')))
                                            @for($i = 1; $i <= count(old('option_number')); $i++)
                                                <div class="row form-group product_option">
                                                    <div class="col-sm-1 text-center" style="display: flex;align-items: center;justify-content: center;">
                                                        <span class="font-size-20">Add</span>
                                                        </div>
                                                    <div class="col-sm-2">
                                                        <input name="option_number[]" class="form-control" type="number" min="1" step="1" value="{{ old('option_number.' . $i - 1, '1') }}">
                                                        @error('option_number.' . $i - 1)
                                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                                        @enderror
                                                        </div>
                                                    <div class="col-sm-1 text-center" style="display: flex;align-items: center;justify-content: center;">
                                                        <span class="font-size-20">of</span>
                                                        </div>
                                                    <div class="col-sm-4">
                                                        <select name="option[]" class="form-control">
                                                            <option value="" selected="">Select an option</option>
                                                            @foreach($productExistedSettings as $setting)
                                                                <option {{ old('option.' . $i - 1) == $setting->key ? "selected" : "" }} value="{{ $setting->key }}">{{ $setting->name }}</option>
                                                            @endforeach
                                                            </select>
                                                        @error('option.' . $i - 1)
                                                        <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                                                        @enderror
                                                        </div>
                                                    <div class="col-sm-3 text-left" style="display: flex;align-items: center;">
                                                        <i class="fas fa-minus-circle font-size-20 cancel_option" style="color: #f06543;cursor: pointer;"></i>
                                                        </div>
                                                    </div>
                                            @endfor
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <span id="new_option" class="btn btn-light waves-effect">+ New Option</span>
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

@section('required_js')
    <script type="text/javascript">
        $(function () {
            const option = '' +
                '<div class="row form-group product_option">' +
                    '<div class="col-sm-1 text-center" style="display: flex;align-items: center;justify-content: center;">' +
                        '<span class="font-size-20">Add</span>' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                        '<input name="option_number[]" class="form-control" type="number" min="1" step="1" value="1">' +
                    '</div>' +
                    '<div class="col-sm-1 text-center" style="display: flex;align-items: center;justify-content: center;">' +
                        '<span class="font-size-20">of</span>' +
                    '</div>' +
                    '<div class="col-sm-4">' +
                        '<select name="option[]" class="form-control">' +
                            '<option value="" selected="">Select an option</option>' +
                            @foreach($productExistedSettings as $setting)
                                '<option value="{{ $setting->key }}">{{ $setting->name }}</option>' +
                            @endforeach
                        '</select>' +
                        @error('option')
                            '<div class="invalid-feedback" style="display: block;">{{ $message }}</div>' +
                        @enderror
                    '</div>' +
                    '<div class="col-sm-3 text-left" style="display: flex;align-items: center;">' +
                        '<i class="fas fa-minus-circle font-size-20 cancel_option" style="color: #f06543;cursor: pointer;"></i>' +
                    '</div>' +
                '</div>';

            $('#new_option').click(function () {
                $('#product_options').append(option);
            });
            $("body").on("click", ".cancel_option", function () {
                $(this).parent().parent().remove();
            });
        });
    </script>
@endsection
