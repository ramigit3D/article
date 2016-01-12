<?php //dd(\App::getLocale()); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>{{ trans('app.title') }}</title>
    	
    	<!-- core CSS -->
    	<link href="/app.css" rel="stylesheet">
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/font-awesome.min.css" rel="stylesheet">
        <link href="/css/animate.min.css" rel="stylesheet">
        <link href="/css/prettyPhoto.css" rel="stylesheet">
        <link href="/css/main.css" rel="stylesheet">
        <link href="/css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body class="homepage">
        
        <header id="header">
            @include('partials.header')
        </header>
        
        <section id="blog" class="container">
            @yield('container')
        </section>  
        
        <footer id="footer" class="midnight-blue">
            @include('partials.footer')
        </footer>

        <script src="/js/jquery.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/jquery.prettyPhoto.js"></script>
        <script src="/js/jquery.isotope.min.js"></script>
        <script src="/js/main.js"></script>
        <script src="/js/wow.min.js"></script>
        <script type="text/javascript" src="//www.clubdesign.at/floatlabels.js"></script>
        
         @yield('addscript')     
    </body>
</html>
    