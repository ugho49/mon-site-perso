    <!-- jQuery -->
    <script type="text/javascript" src="/components/jquery/dist/jquery.min.js"></script>
    <!-- Appear -->
    <script type="text/javascript" src="/js/appear/appear.min.js"></script>
    <!-- Materialize -->
    <script type="text/javascript" src="/components/Materialize/dist/js/materialize.min.js"></script>
    <!-- App -->
    <script type="text/javascript" src="/js/app.min.js"></script>
    <!-- Modernizr -->
    <script type="text/javascript" src="/components/modernizr/modernizr.js"></script>
    <!-- Google Map -->
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&amp;language=<?= $_SESSION['lang']; ?>"></script>
    <script type="text/javascript" src="/components/gmap3/dist/gmap3.min.js"></script>
    <!-- Google Recaptcha -->
    <script type="text/javascript" src='https://www.google.com/recaptcha/api.js?hl=<?= $_SESSION['lang']; ?>'></script>
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
