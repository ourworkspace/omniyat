<!DOCTYPE html>
<html lang="en">
<head>
    <title>OMNIYAT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://www.omniyat.com/wp-content/themes/omniyat-theme/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="https://www.omniyat.com/wp-content/themes/omniyat-theme/img/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/site/css/font-awesome.css')}}">  
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/common.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/style.css')}}" />


    <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/responsive.css')}}" />
    <style>
		#jarallax-container-1 iframe {
            width: 116% !important;
            margin-left: -29px !important;
        }
        .jarallax {
            position: relative;
            z-index: 0;
            height: 100vh;
        }
        .jarallax > .jarallax-img {
            position: absolute;
            object-fit: cover;
            /* support for plugin https://github.com/bfred-it/object-fit-images */
            font-family: 'object-fit: cover;';
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        
        @media screen and (min-width:1025px) {
            .mobile_div, .mobile_view{display: none;}
        }
        @media screen and (max-width:1024px) {
            .desktop_view{display: none;}
        }
        </style>
</head>
<body id="positionbody">

    
    <div class="section introPage"  >
    <!--<div class="jarallax" data-jarallax-video="https://youtu.be/rQtmG68AhEk"></div>-->
        
        <div class="jarallax desktop_view" data-jarallax-video="https://youtu.be/np0UxD9Pj5w"></div>
        <div class="jarallax mobile_view" data-jarallax-video="https://youtu.be/7U0xT3-k6Ks"></div>
        
        
		<!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/rQtmG68AhEk?autoplay=1&showinfo=0&controls=0&loop=1&playlist=rQtmG68AhEk&mute=1&iv_load_policy=3" frameborder="0"  allow="autoplay; encrypted-media"' allowfullscreen></iframe> -->
        <div class="skipHome">
            <a href="{{route('site.home')}}" id="skipHome">Skip</a>
        </div>
	</div>

    
<script type="text/javascript" src="{{asset('public/site/js/jquery-2.2.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/site/js/bootstrap.js')}}"></script>
<!-- Jarallax -->
<script src="{{asset('public/site/vendor/intro/jarallax.min.js')}}"></script>

<!-- Include it if you want to use Video parallax -->
<script src="{{asset('public/site/vendor/intro/jarallax-video.min.js')}}"></script>

<script>
    $('.jarallax').jarallax({
        speed: 0.2
    });
    </script>
</body>
</html>
