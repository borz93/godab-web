<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    @include('admin.layouts.base')
<body class="skin-black">
<div class="wrapper">

    <!-- Header -->
    @include('admin.layouts.header')
    <!-- Sidebar -->
    @include('admin.layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                 @yield('page-title')
                <small>{{ $page_description or null }}</small>
            </h1>
            <!-- You can dynamically generate breadcrumbs here -->
            @include('admin.layouts.breadcrumbs')

        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    @include('admin.layouts.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/admin.js') }}"></script>
@yield('javascript')

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>
</html>