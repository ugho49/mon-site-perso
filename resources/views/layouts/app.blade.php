<!DOCTYPE html>
<html>
<head>

    <!-- Important Header -->
    <title>Ugho Stephan</title>
    <meta charset="utf-8" />
    <meta name="language" content="fr">
    <link rel="shortcut icon" href="{{ URL::to('/build/images/icons/favicon.ico') }}" type="image/icon">
    <link rel="alternate" href="{{ URL::to('/') }}" hreflang="fr" />
    <meta name="keywords" content="ugho stephan, developpeur, etudiant, mobile, web">
    <meta name="description" content="Site personnel de Ugho STEPHAN étudiant en informatique ...">
    <meta name="author" content="Ugho STEPHAN">
    <meta name="publisher" content="Ugho STEPHAN">
    <meta name="copyright" content="Ugho STEPHAN">
    <meta name="theme-color" content="#453925">

    <!-- Let browser know website is optimized for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ URL::to('/') . elixir('css/bundle.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/') . elixir('css/app.css') }}">

</head>

<body>

    @include('layouts.partials.header')
    @include('layouts.partials.navbar')

    @yield('content')

    @include('layouts.partials.footer')


    <!-- Scripts -->
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&amp;language=fr"></script>
    <script type="text/javascript" src='https://www.google.com/recaptcha/api.js?hl=fr'></script>
    <script type="text/javascript" src="{{ URL::to('/') . elixir('js/bundle.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('/') . elixir('js/app.js') }}"></script>

    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-48402317-4', 'auto');
        ga('send', 'pageview');
    </script>
</body>
</html>