<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/font-awesome.css')}}" />  
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/common.css')}}" /> 
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/innerpages.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/vendor/menu/jquery.easymenu.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/vendor/aosanimations/aos.css')}}" />
    <!--mobile-->
    <link href="{{asset('public/site/vendor/mobile_menu/css/ma5-menu.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/responsive.css')}}" />
    <link rel="stylesheet" href="{{asset('public/site/css/mobile.css')}}" />
    <link rel="stylesheet" href="{{asset('public/site/css/dynamic.css')}}" />
    <script src="{{asset('public/site/js/jquery-2.2.0.min.js')}}"></script>
    @include('website.layouts.inquire_script')
</head>
<body>

@include('website.layouts.header')    
    
@yield('pageContent')

<script src="{{asset('public/site/js/bootstrap.js')}}"></script>
<script src="{{asset('public/site/vendor/menu/jquery.easymenu.js')}}"></script>
<script src="{{asset('public/site/vendor/aosanimations/aos.js')}}"></script>
    <script>
        $("#header").load("header.html");
        $("#footer").load("footer.html");
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
<!--
<script>
    liClicked = false;
    var navID = '#topNav'; //Pass here the ID of navigation
    $(window).scroll(function(){
        var y = $(this).scrollTop();
        var top = $(window).scrollTop();
        var body = $("html, body");

        if(top >=0){
            $(navID).addClass('show');
        }else{
            $(navID).removeClass('show');
        }

        $(navID+' li[id]').each(function () {
            var id = $(this).attr('id');
            var viewPort = $('.'+id).offset().top;
            if (y >= viewPort) {
                if (!liClicked) {
                    $(navID+' li').not(this).removeClass('active');
                    $(this).addClass('active');
                }
            }
        });
    });

    $(navID+' li').click(function(){
        var attr = $(this).attr('id');
        var divPosition = $('.'+attr).offset();
        if(attr){
            $('html, body').animate({
                scrollTop: divPosition.top-0
            }, 300);
            $(navID+' li').removeClass('active');
            $(this).addClass('active');
        }
        return false;
    });
</script>    
-->
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
    <script src="vendor/mobile_menu/js/site.min.js"></script>
    <script src="vendor/mobile_menu/js/ma5-menu.min.js"></script>
    
    <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("topNav");
        var btns = header.getElementsByClassName("d_link");
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function() {
          var current = document.getElementsByClassName("active");
          if (current.length > 0) { 
            current[0].className = current[0].className.replace(" active", "");
          }
          this.className += " active";
          });
        }
    </script>
    <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("myDIV");
        var btns = header.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function() {
          var current = document.getElementsByClassName("active");
          if (current.length > 0) { 
            current[0].className = current[0].className.replace(" active", "");
          }
          this.className += " active";
          });
        }
    </script>
</body>
</html>
