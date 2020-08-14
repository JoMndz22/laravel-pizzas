<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="theme-color" content="#148f6a" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

        <title>Pizza | API </title>

        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
        {{-- <link rel="stylesheet" type="text/css" href="/css/bootstrap-material-design.min.css" /> --}}
        <link rel="stylesheet" type="text/css" href="/css/hamburgers.min.css"/>
        <link rel="stylesheet" type="text/css" href="/plugins/slick-slider/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="/plugins/slick-slider/slick/slick-theme.css"/>
        <link rel="stylesheet" type="text/css" href="/plugins/fancybox-master/dist/jquery.fancybox.min.css" />    
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" type="text/css" href="/css/style.css" />

    </head>
    <body>

    @include('layout.nav')

    
    @yield('body')


    @include('layout.footer')

        <script src="/js/jquery.min.js"></script>
        <script src="/js/jquery.serialize-object.min.js"></script>
        <script src="/js/popper.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
{{--         <script src="/js/bootstrap-material-design.min.js"></script>
 --}}        <script src="/plugins/wow/dist/wow.min.js"></script>  
        <script src="/plugins/slick-slider/slick/slick.min.js"></script>
        <script src="/plugins/fancybox-master/dist/jquery.fancybox.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script src="/js/myFunctions.js"></script>
    </body>
</html>