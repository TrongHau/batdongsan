<!DOCTYPE html>
<html>
@include('layouts.header')
<body class="bg-site">
<div class="site-center">
    @include('layouts.wapper')
    @yield('content')
    @include('layouts.footer')
</div>
@yield('contentJS')
<script src="/js/functions.js"></script>
</body>
</html>
