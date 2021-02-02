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
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/vendor/masonry/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/vendor/slick/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/vendor/slick/slick-theme.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/vendor/custom_scrollbar/jquery.mCustomScrollbar.min.css')}}" />

    <!--mobile-->
    <link href="{{asset('public/site/vendor/lightbox/flexbin.css')}}" type="text/css" rel="stylesheet" media="all" />
    <link href="{{asset('public/site/vendor/lightbox/css/lightgallery.css')}}" rel="stylesheet">
    <link href="{{asset('public/site/vendor/mobile_menu/css/ma5-menu.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/responsive.css')}}" />
    <link rel="stylesheet" href="{{asset('public/site/css/mobile.css')}}" />
    <link rel="stylesheet" href="{{asset('public/site/css/dynamic.css')}}" />
    <script src="{{asset('public/site/js/jquery-2.2.0.min.js')}}"></script>


    @include('website.layouts.inquire_script')
    <style>
        .dropbtn {/* background-color: #3498DB; */color: white;/* padding: 16px; */font-size: 16px;border: none;}
        .dropup {position: relative;display: inline-block;}
        .dropup-content {display: none;position: absolute;background-color: hsl(352, 60%, 50%);min-width: 150px;bottom: 50px;z-index: 1;box-shadow: 0 0px 15px 1px #921a2a inset;}
        .dropup-content a {color: black;padding: 0px 15px !important;text-decoration: none;display: block;width: -webkit-fill-available;font-size: 12px;font-family: 'Montserrat', sans-serif !important;}
        .dropup-content a:hover {background-color: #efefef;width: -webkit-fill-available;color: #ca3246;}
        .dropup:hover .dropup-content {display: block;}
        .dropup:hover .dropbtn {background-color: none;}
    </style>
</head>

<body>

    @include('website.layouts.portfolio_inner_header')
    @yield('pageContent')

    <!-- Modal -->
    @include('website.layouts.portfolio_inner_models')

    <script src="{{asset('public/site/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/site/vendor/menu/jquery.easymenu.js')}}"></script>
    <script src="{{asset('public/site/vendor/aosanimations/aos.js')}}"></script>
    <script src="{{asset('public/site/js/jquery.hoverCarousel.js')}}"></script>
    <script src="{{asset('public/site/vendor/masonry/script.js')}}"></script>
    <script src="{{asset('public/site/vendor/custom_scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

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

    <script type= "text/javascript">
        $('ul.portal_menu_ul li').click(function(e) 
        { 
            if($(this).find('a').hasClass('special_header_cls')){
                $('.portfolio_details').addClass('white_theme');
            }else{
                $('.portfolio_details').removeClass('white_theme');
            }
        });
        if($('ul.portal_menu_ul li.active').find('a').hasClass('special_header_cls')){
            $('.portfolio_details').addClass('white_theme');
        }else{
            $('.portfolio_details').removeClass('white_theme');
        }
    </script>

    <!--mobile-->
    <script>
        if (screen && screen.width < 1024) {
            document.write('<script type="text/javascript" src="{{asset('public/site/vendor/mobile_menu/js/site.min.js')}}"><\/script>');
            document.write('<script type="text/javascript" src="{{asset('public/site/vendor/mobile_menu/js/ma5-menu.min.js')}}"><\/script>');    
        }


        $(document).ready(function () {
            ma5menu({
                position: 'right',
                closeOnBodyClick: true
            });
        });

    </script>



    <script src="{{asset('public/site/vendor/slick/slick.js')}}"></script>

    <script type="text/javascript">
        $(document).on('ready', function() {
        $(".lifestyle").slick({
            dots: false,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            nextArrow: '<a class="prev"><i class="fa fa-angle-right"></i></a>',
            prevArrow: '<a class="next"><i class="fa fa-angle-left"></i></a>',  
        });  
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#lightgallery').lightGallery();
        });

    </script>
    <script src="{{asset('public/site/vendor/lightbox/js/lightgallery-all.min.js')}}"></script> 
    <script>
        $(document).ready(function(){
            $(".content").slice(0, 3).show();
            $("#loadMore").on("click", function(e){
                e.preventDefault();
                $(".content:hidden").slice(0, 3).slideDown();
                if($(".content:hidden").length == 0) {
                    $("#loadMore").text("No Content").addClass("noContent");
                }
            });
        })
    </script>
    

</body>

</html>