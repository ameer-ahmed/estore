<!doctype html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
    @include('dashboard.layouts.tags.head')
</head>

<body data-topbar="colored">

<!-- Begin page -->
<div id="layout-wrapper">

    @include('dashboard.layouts.navigations.topbar')

    <!-- ========== Left Sidebar Start ========== -->
    @include('dashboard.layouts.navigations.sidebar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        @yield('content')

        @include('dashboard.layouts.navigations.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
@include('dashboard.layouts.tags.js')
@yield('required_js')
</body>
</html>
