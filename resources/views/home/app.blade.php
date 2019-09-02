<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <!--====== USEFULL META ======-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="meta title" content="@yield('meta_title')" />
    <meta name="description" content="@yield('meta_desc')" />
    <meta name="keywords" content="@yield('meta_keywords')" />

    <!--====== TITLE TAG ======-->
    <title>@yield('title') - {{ config('variable.SITE_NAME') }}</title>

    <!--====== FAVICON ICON =======-->
    <link rel="shortcut icon" type="image/ico" href="img/favicon.png" />

    <!--====== STYLESHEETS ======-->

    <link rel="stylesheet" href="{{ asset('onepro/css/normalize.css') }}">
    <link rel="stylesheet" href=" {{ asset('onepro/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('onepro/css/stellarnav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('onepro/css/progressbar.css') }}">
    <link rel="stylesheet" href="{{ asset('onepro/css/owl.carousel.css') }}">
    <link href="{{ asset('onepro/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('onepro/css/font-awesome.min.css') }}" rel="stylesheet">

    <!--====== MAIN STYLESHEETS ======-->

    <link href="{{ asset('onepro/style.css') }}" rel="stylesheet">
    <link href="{{ asset('onepro/css/responsive.css') }}" rel="stylesheet">

    <script src="{{ asset('onepro/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style> 
            .stellarnav.dark, .stellarnav.dark ul ul {
            background: #ddd;
            }
        </style>
</head>

<body data-spy="scroll" data-target=".mainmenu-area" data-offset="90">

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!--- PRELOADER -->
    <div class="preeloader">
        <div class="preloader-spinner"></div>
    </div>

    <!--SCROLL TO TOP-->
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>

    <!--START TOP AREA-->
    <header class="top-area" id="home">
       @include('home.header')
    </header>
    <!--END TOP AREA-->

    <!--WELCOME SLIDER AREA-->
    @yield('content')
    <!--WELCOME SLIDER AREA END-->



    <!--FOOER AREA-->
    @include('home.footer')
    <!--FOOER AREA END-->


    <!--====== SCRIPTS JS ======-->
    <script src="{{ asset('onepro/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('onepro/js/vendor/bootstrap.min.js') }}"></script>

    <!--====== PLUGINS JS ======-->
    <script src="{{ asset('onepro/js/vendor/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('onepro/js/vendor/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('onepro/js/vendor/jquery.appear.js') }}"></script>
    <script src="{{ asset('onepro/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('onepro/js/stellar.js') }}"></script>
    <script src="{{ asset('onepro/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('onepro/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('onepro/js/wow.min.js') }}"></script>
    <script src="{{ asset('onepro/js/stellarnav.min.js') }}"></script>
    <script src="{{ asset('onepro/js/contact-form.js') }}"></script>
    <script src="{{ asset('onepro/js/jquery.sticky.js') }}"></script>

    <!--===== ACTIVE JS=====-->
    <script src="{{ asset('onepro/js/main.js') }}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTS_KEDfHXYBslFTI_qPJIybDP3eceE-A&sensor=false"></script>
    <script src="{{ asset('onepro/js/maps.active.js') }}"></script>

    <script>
    function langfn(ln) {  

        var url = window.location.href;
	   
        if(url.indexOf("en") != -1) { // en exists

            url = url.substring(0, url.indexOf("/en"));            

        } else if(url.indexOf("ar") != -1) {

            url = url.substring(0, url.indexOf("/ar"));

        }

       window.location.href =  url + '/' + ln;
    }
    
    </script>

</body>

</html>