<!DOCTYPE html>
<html lang="en">
<head>
    <title>OMNIYAT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('public/site/img/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('public/site/img/favicon.ico')}}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/font-awesome.css')}}">  
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/common.css')}}" /> 
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/innerpages.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/vendor/menu/jquery.easymenu.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/vendor/aosanimations/aos.css')}}" />
    
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/vendor/slick/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/vendor/slick/slick-theme.css')}}" />
    <!--mobile-->
    <link href="{{asset('public/site/vendor/mobile_menu/css/ma5-menu.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/responsive.css')}}" />
    <link rel="stylesheet" href="{{asset('public/site/css/mobile.css')}}" />
    
    <link rel="stylesheet" href="{{asset('public/site/css/dynamic.css')}}" />
    <script src="{{asset('public/site/js/jquery-2.2.0.min.js')}}"></script>
</head>
<body>

    @include('website.layouts.portfolio_inner_header')
    @yield('pageContent')


    
    <script src="{{asset('public/site/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/site/vendor/menu/jquery.easymenu.js')}}"></script>
    <script src="{{asset('public/site/vendor/aosanimations/aos.js')}}"></script>
          <script>
        $(document).ready(function(){
            $(this).scrollTop(0);
        });    

        $(document).ready(function(){
            $("#hamburger").click(function(){
                $(".main_menu").toggleClass("show");
            });

            $('#hamburger').click(function(){
                $(this).toggleClass('open');
            });

            $("#headermenu").easymenu();
        });

        AOS.init();
    </script>      
<script>
    $(document).ready(function(){
        $(this).scrollTop(0);
    });    
</script>    
<script>
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 30) {
            $(".clearHeader").addClass("white_bg");
        } else {
            $(".clearHeader").removeClass("white_bg");
        }
    }); 
</script>    
<script>
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 140) {
            $(".nav-tabs-center").addClass("fixed_strip");
        } else {
            $(".nav-tabs-center").removeClass("fixed_strip");
        }
    }); 
</script>     
<script>
    AOS.init();
</script>
    <!--mobile    -->
       <script src="{{asset('public/site/vendor/mobile_menu/js/site.min.js')}}"></script>
    <script src="{{asset('public/site/vendor/mobile_menu/js/ma5-menu.min.js')}}"></script>
   
    <script>
        $(".list-unstyled").on("click", ".init", function() {
            $(this).closest(".list-unstyled").children('li:not(.init)').toggle();
        });

        var allOptions = $(".list-unstyled").children('li:not(.init)');
        $(".list-unstyled").on("click", "li:not(.init)", function() {
            allOptions.removeClass('selected');
            $(this).addClass('selected');
            $(".list-unstyled").children('.init').html($(this).html());
            allOptions.toggle();
        });
    </script>
    <script src="{{asset('public/site/vendor/slick/slick.js')}}"></script>
    
    <script type="text/javascript">
        var $counter = $('.slide-count');
        var $slider = $('.slider');
        $slider.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
            var i = (currentSlide ? currentSlide : 0) + 1;
            $counter.text(i + '/' + slick.slideCount);
        });
        $(document).on('ready', function() {
            $(".newsfeed").slick({
                dots: false,
                infinite: true,
                slidesToShow:1,
                slidesToScroll:1,
                nextArrow: '<a class="next"><i class="fa fa-arrow-right"></i></a>',
                prevArrow: '<a class="prev"><i class="fa fa-arrow-left"></i></a>',  
            });  
        });
    </script>
    <script>
        $('.m-share').click( function() {
            $(".share").toggleClass("active");
            $(".slick-arrow").removeClass("active");
        } );
    </script>
</body>
</html>