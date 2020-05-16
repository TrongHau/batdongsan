<!DOCTYPE html>
<html>
@include('v2.layouts.header')
@include('v2.layouts.wapper')
<body class="home page-template-default page page-id-5 header-transparent apus-body-loading image-lazy-loading wpb-js-composer js-comp-ver-5.1.1 vc_responsive">
@yield('content')
@include('v2.layouts.footer')
</body>
@yield('contentJS')
<script src="/js/functions_v2.js"></script>
</body>
</html>
