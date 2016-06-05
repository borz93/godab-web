<!DOCTYPE html>
<html>
@include('frontend.layouts.base')
<body>
<div class="container">
    {{--NAVBAR--}}
    @include('frontend.layouts.navbar')
    {{--CONTENT--}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('frontend.layouts.breadcrumbs')
            </div>
        </div>
        {{--Main content--}}
        <section class="content">
            @yield('content')
        </section>
    </div>
</div>
{{--Footer --}}
@include('frontend.layouts.footer')

<!-- REQUIRED JS SCRIPTS -->
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/material.js') }}"></script>
<script src="{{ asset('/js/front-end.js') }}"></script>
@yield('javascript')

</body>
</html>