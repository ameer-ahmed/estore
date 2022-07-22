<!doctype html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
    @include('admin.layouts.tags.head')
</head>

<body data-topbar="colored">

<!-- Begin page -->
<div id="layout-wrapper">

    @include('admin.layouts.navigations.topbar')

    <!-- ========== Left Sidebar Start ========== -->
    @include('admin.layouts.navigations.sidebar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        @yield('content')

        @include('admin.layouts.navigations.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
@include('admin.layouts.tags.js')
@yield('required_js')
</body>
</html>
