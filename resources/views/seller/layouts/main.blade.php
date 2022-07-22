<!doctype html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
    @include('seller.layouts.tags.head')
</head>

<body data-topbar="colored">

<!-- Begin page -->
<div id="layout-wrapper">

    @include('seller.layouts.navigations.topbar')

    <!-- ========== Left Sidebar Start ========== -->
    @include('seller.layouts.navigations.sidebar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        @yield('content')

        @include('seller.layouts.navigations.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
@include('seller.layouts.tags.js')
@yield('required_js')
</body>
</html>
