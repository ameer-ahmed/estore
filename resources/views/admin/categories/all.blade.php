@extends('admin.layouts.main')
@section('title', 'Admin Dashboard - All Categories')


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
                                <table id="datatable"
                                       class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                       style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                       aria-describedby="datatable_info">
                                    <thead>
                                    <tr>
                                        <th class="text-center align-middle">#</th>
                                        <th class="text-center align-middle">Image</th>
                                        <th class="text-center align-middle">English Name</th>
                                        <th class="text-center align-middle">Arabic Name</th>
                                        <th class="text-center align-middle">Slug</th>
                                        <th class="text-center align-middle">Status</th>
                                        <th class="text-center align-middle">Modify</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td class="text-center align-middle">{{ $category->id }}</td>
                                            <td class="text-center align-middle"><img height="40px"
                                                                                      src="{{ $category->image_path }}"
                                                                                      alt=""></td>
                                            <td class="text-center align-middle">{{ $category->translate('en')->name }}</td>
                                            <td class="text-center align-middle">{{ $category->translate('ar')->name }}</td>
                                            <td class="text-center align-middle"><span
                                                        class="badge badge-soft-primary">{{ $category->slug }}</span>
                                            </td>
                                            <td class="text-center align-middle">{{ $category->is_active }}</td>
                                            <td class="text-center align-middle"><a
                                                        href="/admin/categories/edit/{{ $category->id }}">
                                                    <button type="button"
                                                            class="btn btn-outline-warning btn-rounded waves-effect waves-light">
                                                        Edit
                                                    </button>
                                                </a></td>
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
