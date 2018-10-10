<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->


    <link href="web/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  	<!-- Bootstrap css -->
  	<link href="web/css/style.css" rel="stylesheet" type="text/css" media="all" />
  	<!-- Main css -->
  	<link rel="web/stylesheet" href="css/fontawesome-all.css">
  	<!-- Font-Awesome-Icons-CSS -->
  	<link href="web/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
  	<!-- pop-up-box -->
  	<link href="web/css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="web/css/flexslider.css" type="text/css" media="screen" />
  	<!-- menu style -->
  	<!-- //Custom-Files -->

  	<!-- web fonts -->
  	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
  	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
  	    rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('shop.header')
        @include('shop.navbar')
        @yield('content')
    </div>
    <script src="js/app.js" defer></script>
<!--    <script src="https://unpkg.com/vue@latest"></script>
  	<script src="https://cdn.jsdelivr.net/npm/vue@2.5"></script> -->

    <script src="web/js/jquery-2.2.3.min.js"></script>
    <script src="web/js/bootstrap.js"></script>
    <script src="web/js/imagezoom.js"></script>
    <script src="web/js/jquery.flexslider.js"></script>
    <!-- //jquery -->

    <!-- nav smooth scroll -->
    <script>
      $(document).ready(function () {
        $(".dropdown").hover(
          function () {
            $('.dropdown-menu', this).stop(true, true).slideDown("fast");
            $(this).toggleClass('open');
          },
          function () {
            $('.dropdown-menu', this).stop(true, true).slideUp("fast");
            $(this).toggleClass('open');
          }
        );
      });
    </script>
    <!-- //nav smooth scroll -->

  	<!-- //imagezoom -->

  	<!-- flexslider -->



  	<script>
    (function(jQuery){
        jQuery(window).load(function(){
            jQuery('.flexslider').flexslider({
            animation: "fade", controlNav: "thumbnails", directionNav: false,
            start: function(slider){
              jQuery('.slider-container').removeClass('loading');
            }
          });
         jQuery('.sliderTitle').css('opacity',0.9);
        });
    }(jQuery));
  	</script>



</body>
</html>
