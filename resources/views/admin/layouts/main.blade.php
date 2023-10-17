<!DOCTYPE html>
<html lang="en">
@include('admin.layouts.header')

<body>

<section id="container" class="">
    @include('admin.layouts.header-main')
    @include('admin.layouts.slider')
   @yield('main')
</section>

@include('admin.layouts.footer')

</body>
</html>
