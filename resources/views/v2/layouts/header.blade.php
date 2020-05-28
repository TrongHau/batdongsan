<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/imgs/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="audience" content="general">
    <meta name="resource-type" content="document">
    <meta name="abstract" content="Thông tin nhà đất Việt Nam">
    <meta name="area" content="Nhà đất và bất động sản">
    <meta name="placename" content="Việt Nam">
    <title>
        Kênh thông tin bất động sản - Mua bán nhà đất số 1 Việt Nam
    </title>
    @yield('meta')
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="xmlrpc.php">
    {{--<link rel='dns-prefetch' href='/http://api-idx.diversesolutions.com/' />--}}
    <link rel='dns-prefetch' href='/http://maps.googleapis.com/' />
    <link rel='dns-prefetch' href='/http://fonts.googleapis.com/' />
    <link rel='dns-prefetch' href='/http://s.w.org/' />
    <link rel="alternate" type="application/rss+xml" title="Homesweet &raquo; Feed" href="feed/index.html" />
    <link rel="alternate" type="application/rss+xml" title="Homesweet &raquo; Comments Feed" href="comments/feed/index.html" />
    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>

    <link rel='stylesheet' id='homesweet-theme-fonts-css' href='/https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Dosis:300,400,500,600,700,800&amp;subset=latin%2Clatin-ext' type='text/css' media='all' />
    <link rel='stylesheet' id='js_composer_front-css' href='/wp-content/uploads/js_composer/js_composer_front_custom3c21.css?ver=5.1.1' type='text/css' media='all' />
    <link rel='stylesheet' id='awesome-css' href='/wp-content/themes/homesweet/css/awesome1849.css?ver=4.7.0' type='text/css' media='all' />
    <link rel='stylesheet' id='font-ionicons-css' href='/wp-content/themes/homesweet/css/ioniconsf427.css?ver=v2.0.0' type='text/css' media='all' />
    <link rel='stylesheet' id='apus-font-css' href='/wp-content/themes/homesweet/css/apus-font8a54.css?ver=1.0.0' type='text/css' media='all' />
    <link rel='stylesheet' id='material-design-iconic-font-css' href='/wp-content/themes/homesweet/css/material-design-iconic-font3601.css?ver=2.2.0' type='text/css' media='all' />
    <link rel='stylesheet' id='animate-css' href='/wp-content/themes/homesweet/css/animate3b71.css?ver=3.5.0' type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-css' href='/wp-content/themes/homesweet/css/bootstrap55a0.css?ver=3.2.0' type='text/css' media='all' />
    <link rel='stylesheet' id='homesweet-template-css' href='/wp-content/themes/homesweet/css/templatecf1b.css?ver=3.2' type='text/css' media='all' />
    <style id='homesweet-template-inline-css' type='text/css'>
        .vc_custom_1502157337810{padding-top: 40px !important;padding-bottom: 40px !important;background-color: #13293d !important;}
        /* check main color *//* check second color *//* Typo *//* seting background main */body, p{}/* seting background main */h1,h2,h3,h4,h5,h6,.widget-title,.widgettitle{}/* Custom CSS */
    </style>
    <link rel='stylesheet' id='homesweet-style-css' href='/wp-content/themes/homesweet/stylecf1b.css?ver=3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='magnific-popup-css' href='/wp-content/themes/homesweet/js/magnific/magnific-popupf488.css?ver=1.1.0' type='text/css' media='all' />
    <link rel='stylesheet' id='colorbox-css' href='/wp-content/themes/homesweet/js/colorbox/colorboxf488.css?ver=1.1.0' type='text/css' media='all' />
    <link rel='stylesheet' id='perfect-scrollbar-css' href='/wp-content/themes/homesweet/css/perfect-scrollbard0c7.css?ver=0.6.12' type='text/css' media='all' />
    <script type='text/javascript' src='/wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4'></script>
    <script type='text/javascript' src='/wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var dsidxAjaxHandler = {"ajaxurl":"https:\/\/demoapus.com\/homesweet\/wp-admin\/admin-ajax.php"};
        /* ]]> */
    </script>
    {{--<script type='text/javascript' src='/https://api-idx.diversesolutions.com/combo-js?config=dsidxpress&amp;ver=2.4.1'></script>--}}
    <script src="/js/jquery-1.11.1.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/custom_v2.css">
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
    @yield('contentCSS')
    <?php
    use Jenssegers\Agent\Agent;
    $Agent = new Agent();
    ?>
    @if($Agent->isMobile())
        <link rel="stylesheet" type="text/css" href="/css/mobile_v2.css">
    @endif

</head>
