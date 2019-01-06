<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/imgs/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <meta http-equiv="audience" content="general">
    <meta name="resource-type" content="document">
    <meta name="abstract" content="Thông tin nhà đất Việt Nam">
    <meta name="classification" content="Bất động sản Việt Nam">
    <meta name="area" content="Nhà đất và bất động sản">
    <meta name="placename" content="Việt Nam">
    <meta name="author" content="Batdongsan.com.vn">
    <meta name="copyright" content="©2007 Batdongsan.com.vn">
    <meta name="owner" content="Batdongsan.com.vn">
    <meta name="generator" content="Daiviet Software Jsc">
    <meta name="distribution" content="Global">
    <meta name="keywords" content="Kênh, thông, tin, số, 1, về, bất, động, sản">
    <meta name="description"
          content="Kênh thông tin số 1 về bất động sản tại Việt Nam. Mang đến nguồn thông tin mua bán và cho thuê nhà đất, văn phòng, chung cư... Cập nhật tin tức bất động sản nhanh nhất và chính xác nhất.">
    <meta name="revisit-after" content="1 days">
    <meta name="robots" content="follow">
    <meta name="apple-itunes-app" content="app-id=866492094">
    <title>
        Kênh thông tin bất động sản - Mua bán nhà đất số 1 Việt Nam
    </title>
    @yield('contentCSS')
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" media="all" />
    <link rel="stylesheet" type="text/css" href="/css/banner-preview.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="/css/print.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link id="spStyleCss" rel="stylesheet" href="/css/sp-style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="/css/custom.css">
    <script src="/js/jquery-1.11.1.js"></script>
    <script src="/js/jcarousellite.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script>
        var csrfToken = "{{csrf_token()}}";
        var loaded = false;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
        $( document ).ajaxStop(function() {
            loaded = false;
        });
    </script>
</head>
