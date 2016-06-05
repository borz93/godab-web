<!DOCTYPE html>
<html>
@include('frontend.layouts.base')
<body class="">
<div class="container">
    <!-- NAVBAR -->
    @include('frontend.layouts.navbar')

    <!-- CONTENT -->
    <div class="container-fluid">
        @include('frontend.layouts.breadcrumbs')
        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section>
    </div>

</div>
<!-- Footer -->
@include('frontend.layouts.footer')
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/material.js') }}"></script>
<script src="{{ asset('/js/front-end.js') }}"></script>
@yield('javascript')

</body>
</html>