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
                                <h5 class="header-title mb-4">All Categories</h5>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>English Name</th>
                                        <th>Arabic Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td><img height="50px" src="{{ url(CATEGORIES_IMGS_ACCESS . $category->image_path) }}"></td>
                                            <td>{{ $category->translate('en')->name }}</td>
                                            <td>{{ $category->translate('ar')->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>{{ $category->is_active }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $categories->links() }}

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
    <script src="{{asset('dashboard/assets/js/pages/datatables.init.js')}}"></script>
@endsection
