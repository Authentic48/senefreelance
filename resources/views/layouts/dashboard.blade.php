<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SenFreelance') }}</title>

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/scrollbar.css">
	<link rel="stylesheet" href="/css/fontawesome/fontawesome-all.css">
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/themify-icons.css">
	<link rel="stylesheet" href="/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/css/jquery-ui.css">
	<link rel="stylesheet" href="/css/linearicons.css">
	<link rel="stylesheet" href="/css/tipso.css">
	<link rel="stylesheet" href="/css/chosen.css">
	<link rel="stylesheet" href="/css/prettyPhoto.css">
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/dashboard.css">
	<link rel="stylesheet" href="/css/color.css">
	<link rel="stylesheet" href="/css/transitions.css">
	<link rel="stylesheet" href="/css/responsive.css">
    <link rel="stylesheet" href="/css/dbresponsive.css">
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      
        ga('create', 'G-3Y6XNWQ74F', 'auto');
        ga('send', 'pageview');
      
    </script>
</head>

<body class="wt-login">

    <div class="preloader-outer">
        <div class="loader"></div>
    </div>

    <div id="wt-wrapper" class="wt-wrapper wt-haslayout">
        <div class="wt-contentwrapper">
            @include('includes.header')

            <main id="wt-main" class="wt-main wt-haslayout">
                
                @if (Auth::check())
                   @include('includes.sidebar')
                @endif
                @yield('content')
            </main>

            @include('includes.footer')
        </div>
    </div>

    <script src="/js/vendor/jquery-3.3.1.js"></script>
    <script src="/js/vendor/jquery-library.js"></script>
    <script src="/js/vendor/bootstrap.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/chosen.jquery.js"></script>
    <script src="/js/scrollbar.min.js"></script>
    <script src="/js/tilt.jquery.js"></script>
    <script src="/js/prettyPhoto.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/readmore.js"></script>
    <script src="/js/countTo.js"></script>
    <script src="/js/appear.js"></script>
    <script src="/js/tipso.js"></script>
    <script src="/js/jRate.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	<script>
		const menu_icon = document.querySelector('.menu-icon');
		function addClassFunThree() {
	        this.classList.toggle("click-menu-icon");
	    }
	    menu_icon.addEventListener('click', addClassFunThree);
	</script>
</body>
</html>