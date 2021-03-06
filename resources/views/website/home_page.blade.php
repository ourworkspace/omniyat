<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>OMNIYAT</title>
		<link rel="shortcut icon" href="https://www.omniyat.com/wp-content/themes/omniyat-theme/img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="https://www.omniyat.com/wp-content/themes/omniyat-theme/img/favicon.ico" type="image/x-icon">
		<!-- CSS -->
		<!--
		-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<!--
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		-->
		<!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('public/site/assets/css/common.css')}}" />
		<link rel="stylesheet" href="{{asset('public/site/assets/css/examples.css')}}" />
		<link rel="stylesheet" href="{{asset('public/site/assets/css/jquery.easymenu.css')}}" />
		<link rel="stylesheet" href="{{asset('public/site/assets/css/fixed-positioning.css')}}" />
		<link rel="stylesheet" href="{{asset('public/site/assets/css/styles.css')}}" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css">
        <!--mobile-->
        <link href="{{asset('public/site/vendor/mobile_menu/css/ma5-menu.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/responsive.css')}}" />
        <link rel="stylesheet" href="{{asset('public/site/css/mobile.css')}}" />
		<script src="{{asset('public/site/assets/js/jquery-2.2.0.min.js')}}"></script>
		@include('website.layouts.inquire_script')
	</head>
    <style>
        @media screen and (max-width:1024px) {
            html, body{overflow-y: auto !important;height: auto !important;overflow-x: hidden;}
            .inner_mobile_header{padding: 15px;}
        }
    </style>
	<body>
        
		<nav class="navbar navbar-default fixed-top navbar-expand-lg navbar-light transparent-bg desktop_view" data-_p1logoandtextsection-1="z-index: 800;" data-_p1logoandtextsection-2="z-index: 5999;">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="{{asset('public/site/assets/images/logo-omniyat1.svg')}}" alt="logo" class="logo-black" data-_p2bannersectionzoomend--170="display: block;visibility:visible;" data-_p2bannersectionzoomend--100="display: none;visibility:hidden;" data-_p2logobgsectionhideposition-200="display:block;visibility:visible;" data-_p3bannersectionzoomend--100="display: none;visibility:hidden;" data-_p3logobgsectionhideposition-200="display:block;visibility:visible;" />
					<img src="{{asset('public/site/assets/images/logo-omniyat-white.svg')}}" alt="logo" class="logo-white" data-_p2bannersectionzoomend--170="display: none;visibility:hidden;" data-_p2bannersectionzoomend--100="display: block;visibility:visible;" data-_p2logobgsectionhideposition-200="display:none;visibility:hidden;" data-_p3bannersectionzoomend--100="display: block;visibility:visible;" data-_p3logobgsectionhideposition-200="display:none;visibility:hidden;" />
				</a>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<div id="hamburger" class="hamburger-el hamburger-dark" data-_p2bannersectionzoomend--170="display: block;visibility:visible;" data-_p2bannersectionzoomend--100="display: none;visibility:hidden;" data-_p2logobgsectionhideposition-200="display:block;visibility:visible;" data-_p3bannersectionzoomend--100="display: none;visibility:hidden;" data-_p3logobgsectionhideposition-200="display:block;visibility:visible;">
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</div>
						<div id="hamburger" class="hamburger-el hamburger-white" data-_p2bannersectionzoomend--170="display: none;visibility:hidden;" data-_p2bannersectionzoomend--100="display: block;visibility:visible;" data-_p2logobgsectionhideposition-200="display:none;visibility:hidden;" data-_p3bannersectionzoomend--100="display: block;visibility:visible;" data-_p3logobgsectionhideposition-200="display:none;visibility:hidden;">
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</div>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right clearfix main_menu headermenu-el" id="headermenu">
					<li class="main-item has-child"><a href="javascript:0;" class="company-menu-link">Company</a>
						<ul style="left: 0px; top: 40px; display: none;">
							<li class="sub-item"><a href="{{route('site.about.company')}}" class="about-menu-link">About Omniyat</a></li>  
							<li class="sub-item"><a href="{{route('site.philosophy')}}" class="philosophy-menu-link">Philosophy</a></li>
							<li class="sub-item"><a href="{{route('site.leadership')}}" class="leadership-menu-link">Leadership</a></li>
                            <!--<li class="sub-item"><a href="#" class="partners-brands-menu-link">Partners &amp; Brands </a></li>-->
						</ul>
					</li>
					<li class="main-item"><a href="{{route('site.whats.new')}}" class="whats-new-menu-link">What's new</a></li>
					<li class="main-item"><a href="{{route('site.portfolio')}}" class="portfolio-menu-link">Portfolio</a></li>
                    <!--<li class="main-item"><a href="javascript:void(0);" class="media-menu-link">Media</a></li>-->
                    <li class="sub_menu"><a href="javascript:void(0)" class="media-menu-link">Media</a>
                        <ul>
                            <li><a href="{{route('site.whats.on.media')}}">What's on media</a></li>
                            <li><a href="{{route('site.press.release')}}">Press Releases</a></li>
                            <li><a href="{{route('site.press.kit')}}">Press Kit</a></li> 
                            <!--<li><a href="chairman-newsletter.html">Chairman Newsletters</a></li> -->
                            <li><a href="{{route('site.csr')}}">CSR</a></li>
                            <li><a href="{{route('site.sponsorships')}}">Sponsorships</a></li>
                        </ul>
                    </li>
					<li class="main-item"><a href="{{route('site.contact.us')}}" class="contactus-menu-link">Contact us</a></li>
					
				</ul>
			</div>
		</nav>

        <div class="mobile_div">
            <nav class="navbar mobile_header inner_mobile_header">
                <div class="logo">
                    <a class="navbar-brand" href="#"><img src="{{asset('public/site/img/logo-omniyat1.svg')}}"></a>
                </div>
                <div class="m_menu">
                    <button class="ma5menu__toggle btn" type="button">
                        <span></span>
                        <span></span>
                    </button> 
                    <div class="mobile_nav">
                        <nav class="ma5menu" itemscope="" >
                            <div class="ma5menu__header">
                                <a class="ma5menu__home" href="index.html" tabindex="-1">
                                    <img src="{{asset('public/site/img/logo-omniyat1_white.png')}}"/>
                                </a>
                                <a class="ma5menu__toggle menu_close" tabindex="-1">
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                            <ul class="lvl-0 ma5menu__panel--active" data-ma5order="ma5-ul">
                                <li class="ma5menu__li--current" data-ma5order="ma5-li-1">
                                    <span class="ma5menu__btn--enter ma5menu__category  ma5menu__path">Company</span>
                                    <ul class="lvl-1" data-ma5order="ma5-ul-1">
                                        <li data-ma5order="ma5-li-1-1">
                                            <div class="ma5menu__leave"><span class="ma5menu__btn--leave"></span>Company</div>
                                            <a href="{{route('site.about.company')}}">About Omniyat</a>
                                        </li>

                                        <li data-ma5order="ma5-li-1-2">
                                            <a href="{{route('site.philosophy')}}">Philosophy</a>
                                        </li>
                                        <li data-ma5order="ma5-li-1-3">
                                            <a href="{{route('site.leadership')}}">Leadership</a>
                                        </li>
                                        <!--
                                            <li data-ma5order="ma5-li-1-4">
                                                <a href="partners-brands.html">Partners & Brands</a>
                                            </li>
                                        -->
                                    </ul>
                                </li>
                                <li data-ma5order="ma5-li-2"><a href="{{route('site.whats.new')}}">What's new</a></li>
                                <li data-ma5order="ma5-li-3"><a href="{{route('site.portfolio')}}">Portfolio</a></li>
                                <li data-ma5order="ma5-li-4">
                                    <span class="ma5menu__btn--enter ma5menu__category">Media</span>
                                    <ul class="lvl-1" data-ma5order="ma5-ul-4">

                                        <li data-ma5order="ma5-li-4-1">
                                            <div class="ma5menu__leave"><span class="ma5menu__btn--leave"></span>Media</div>
                                            <li><a href="{{route('site.whats.on.media')}}">What's on media</a></li>
                                        </li>
                                        <li data-ma5order="ma5-li-4-2"><a href="{{route('site.press.release')}}">Press Releases</a></li>
                                        <li data-ma5order="ma5-li-4-3"><a href="{{route('site.press.kit')}}">Press Kit</a></li>
                                        <!--<li data-ma5order="ma5-li-4-4"><a href="chairman-newsletter.html">Chairman Newsletters</a></li>-->
                                        <li data-ma5order="ma5-li-4-5"><a href="{{route('site.csr')}}">CSR</a></li>
                                        <li data-ma5order="ma5-li-4-6"><a href="{{route('site.sponsorships')}}">Sponsorships</a></li>
                                    </ul>
                                </li>
                                <li data-ma5order="ma5-li-5"><a href="{{route('site.contact.us')}}">Contact us</a></li>
                                <li data-ma5order="ma5-li-6"><a href="javascript:0;">Privacy Policy</a></li>
                                <li data-ma5order="ma5-li-7"><a href="javascript:0;">Terms & Use</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </nav>
        </div> 

        
		<div class="container-fluid main-container min-h-100vh">
			<!-- banner -->
			<div class="row">
				<div class="col-12 section section1 min-h-100vh project_1 bg-size-cover p1-banner-section" id="section1" data-0="background-image:!url('{{asset('public/site/assets/images/project_01.jpg')}}');opacity:1;"  data-_p1bannersectionheight="background-image:!url('{{asset('public/site/assets/images/project_01.jpg')}}');opacity:0;" data-_p1bannersectionheight-1="opacity:0;" data-_p1bannersectionheight-2="opacity:0;">
					<div class="p1-top-banner-text project_desc">
						<h6 class="wow animated fadeInDown  animated_delay_1">AN EXTRAORDINARY VISION</h6>
						<p class="wow animated fadeInLeft  animated_delay_15">A SCULPTURAL AND EMBLEMATIC LANDMARK <br>FOR DUBAI, IMAGINED BY PURE GENIUS</p>
						<p class="red_txt wow animated fadeInRight animated_delay_2">Burj khalifa district</p>
					</div>
				</div>
			</div>
			
			<!-- logo background -->
			<!--
			<div class="row">
				<div class="col-12 section section2 min-h-100vh p1-logo-bg-section" id="section2" data-0="background-color:rgb(26,24,24); opacity: 1; top: 100%;" data-_p1bannersectionheight="background-color:rgb(26,24,24); opacity: 1; top: 0%;" data-_p1bannersectionheight-1="visibility:visible;" data-_p1bannersectionheight-2="visibility:hidden;"></div>
			</div>
			-->
			
			<!-- logo -->
			<div class="section3 logo-section p1-logo-section" id="section3" data-_p1bannersectionheight--101="visibility: hidden; transform: translate(-50%, -50%) scale(8);top: 50%;" data-_p1bannersectionheight--100="visibility: visible;" data-_p1logoandtextsection="visibility: visible; transform: translate(-50%, -50%) scale(1);top: 44%;"
			data-_p1logoandtextsection-400="transform: translate(-50%, 0%) scale(1);top: 2%;" 
			data-_p1projectplacesdatasection-580="opacity: 1;" data-_p1projectplacesdatasection-600="opacity: 0;">
				<img src="{{asset('public/site/assets/images/Logo-shape1.svg')}}" alt="logo" class="inner-logo1" />
			</div>
			
			<!-- logo text -->
			<div class="section4 logo-text-section p1-logo-text-section" id="section4" data-_p1logoandtextsection--30="visibility: hidden; transform: translate(-60%, -70%) scale(1); opacity: 0;top: 50%;" data-_p1logoandtextsection--29="visibility: visible;" data-_p1logoandtextsection="visibility: visible; transform: translate(-50%, -50%) scale(1); opacity: 1;top: 56%;" 
			data-_p1logoandtextsection-400="transform: translate(-50%, 0%) scale(1);top: 16%;" 
			data-_p1projectplacesdatasection-580="opacity: 1;" data-_p1projectplacesdatasection-600="opacity: 0;">
				<img src="{{asset('public/site/assets/images/Logo-shape2.svg')}}" alt="logo" class="inner-logo1" />
			</div>
			
			<!-- logo and text -->
			<!--
			<div class="section4-a logo-with-text-section p1-logo-with-text-section">
				<img src="assets/images/icon4.svg" alt="logo" class="full-logo" />
			</div>
			-->
			
			<!-- project places image -->
			<div class="section5 p1-project-places-data-section" id="section5" data-_p1logoandtextsection--10="display:none;visibility:hidden; opacity: 0; transform: translate(-50%, 0%) scale(1);opacity: 0;" data-_p1logoandtextsection-200="display:none;visibility:hidden; opacity: 0; transform: translate(-50%, 0%) scale(1);opacity: 0;" data-_p1logoandtextsection-205="display:block;visibility: visible;  opacity: 0;" data-_p1projectplacesdatasection="display:block;visibility: visible; transform: translate(-50%, 0%) scale(1);opacity: 1;"
			data-_p1projectplacesdatasection-600="opacity: 1; transform: translate(-50%, 0%) scale(1);" data-_p1projectplacesdatasection-751="opacity: 0;" data-_p1projectplacesdatasection-755="opacity: 0;display:none;visibility:hidden;"
			>
				<img src="{{asset('public/site/assets/images/project_01_trans.png')}}" alt="image" class="p1-project-places-data-section-image" />

				<div class="p1_pointer_main">
					<div class="image">
						<div class="point point1" data-_p1projectplacesdatasection--150="visibility: hidden;" data-_p1projectplacesdatasection--20="visibility: hidden;" data-_p1projectplacesdatasection--19="visibility: visible;"  data-_p1projectplacesdatasection-580="opacity: 1;" data-_p1projectplacesdatasection-600="opacity: 0;">
							<div class="pulse"></div>
							<div class="line line1"></div>
							<p class="desc desc1">Serviced Residences</p>
						</div>
						<div class="point point2" data-_p1projectplacesdatasection--150="visibility: hidden;" data-_p1projectplacesdatasection--20="visibility: hidden;" data-_p1projectplacesdatasection--19="visibility: visible;"  data-_p1projectplacesdatasection-580="opacity: 1;" data-_p1projectplacesdatasection-600="opacity: 0;">
							<div class="pulse"></div>
							<div class="line line2"></div>
							<p class="desc desc2">Exclusive Offices</p>
						</div>
						<div class="point point3" data-_p1projectplacesdatasection--150="visibility: hidden;" data-_p1projectplacesdatasection--20="visibility: hidden;" data-_p1projectplacesdatasection--19="visibility: visible;"  data-_p1projectplacesdatasection-580="opacity: 1;" data-_p1projectplacesdatasection-600="opacity: 0;">
							<div class="pulse"></div>
							<div class="line line3"></div>
							<p class="desc desc3">food &amp; Beverage Entertainment</p>
						</div>
						<div class="point point4" data-_p1projectplacesdatasection--150="visibility: hidden;" data-_p1projectplacesdatasection--20="visibility: hidden;" data-_p1projectplacesdatasection--19="visibility: visible;"  data-_p1projectplacesdatasection-580="opacity: 1;" data-_p1projectplacesdatasection-600="opacity: 0;">
							<div class="pulse"></div>
							<div class="line line4"></div>
							<p class="desc desc4">Designed by Zaha Hadid</p>
						</div>
						<div class="point point5" data-_p1projectplacesdatasection--150="visibility: hidden;" data-_p1projectplacesdatasection--20="visibility: hidden;" data-_p1projectplacesdatasection--19="visibility: visible;"  data-_p1projectplacesdatasection-580="opacity: 1;" data-_p1projectplacesdatasection-600="opacity: 0;">
							<div class="pulse"></div>
							<div class="line line5"></div>
							<p class="desc desc5">Me Dubai Hotel</p>
						</div>
						<div class="point point6" data-_p1projectplacesdatasection--150="visibility: hidden;" data-_p1projectplacesdatasection--20="visibility: hidden;" data-_p1projectplacesdatasection--19="visibility: visible;" data-_p1projectplacesdatasection-580="opacity: 1;" data-_p1projectplacesdatasection-600="opacity: 0;">
							<div class="pulse"></div>
							<div class="line line6"></div>
							<p class="desc desc6">The Terrace</p>
						</div>
					</div>
				</div>
			</div>
			
			<!-- p1-project-transparent-data-section : using container just for height purpose-->
			<div class="section6 p1-project-transparent-data-section" id="section6" data-_p1projectplacesdatasection--606="display: none;" data-_p1projectplacesdatasection-650="display: block; visibility: hidden; opacity: 0; transform: translate(-50%, 0%) scale(1);" data-_p1projectplacesdatasection-651="visibility: visible;" data-_p1projectplacesdatasection-841="opacity: 1; transform: translate(-50%, 0%) scale(1);" data-_p1projectplacesdatasection-891="opacity: 1; transform: translate(-50%, 0%) scale(1);" data-_p1projecttransparentdatasectionprojectanimationdone="opacity: 1;" 
			data-_p1projecttransparentdatasectionprojectdatadisplayclear="transform: translate(-50%, 0%) scale(1);" data-_p1projecttransparentdatasectionzoomingtransparentimageend="transform: translate(-50%, 0%) scale(1);" data-_p2bannersectionzoomend-10="display: none;" data-_p1projecttransparentdatasectionzoomingtransparentimageend-10="bottom:0%;opacity:1;" data-_p2bannersectionzoomend--50="bottom:36%;opacity:0;">
				<div class="p1-project-transparent-data-section-image-container">
					<img src="{{asset('public/site/assets/images/project_01_vector.png')}}" alt="image" class="p1-project-transparent-data-section-image" />
					<!-- points -->
					<div class="p1_pointer_main p1_pointer_vector">
						<div class="image">
							<div class="point point1" data-_p1projectplacesdatasection--251="visibility: hidden;" data-_p1projecttransparentdatasectionprojectanimationdone--20="visibility: visible;"  data-_p1projecttransparentdatasectionprojectanimationdone--19="opacity: 0;" data-_p1projecttransparentdatasectionprojectanimationdone="opacity: 1;" 
							>
								<div class="pulse"></div>
								<div class="blackDot"></div>
								<div class="line line1"></div>
								<div class="desc">
									<span>SERVICED RESIDENCES</span>
								</div>
							</div>
							<div class="pointThumbnailImage thumbnailImage1" data-_p1projectplacesdatasection-651="opacity:1; left: -200%; top: -10%; transform: scale(5);" data-_p1projecttransparentdatasectionprojectanimationdone="opacity:1; left: 21%; top: 21%; transform: scale(1);" >
								<a href="{{asset('public/site/assets/images/serviced_residences.png')}}" data-lightbox="serviced_residences">
									<img src="{{asset('public/site/assets/images/serviced_residences.png')}}" alt="image" />
								</a>
							</div>
							<div class="point point2" data-_p1projectplacesdatasection--251="visibility: hidden;" data-_p1projecttransparentdatasectionprojectanimationdone--20="visibility: visible;"  data-_p1projecttransparentdatasectionprojectanimationdone--19="opacity: 0;" data-_p1projecttransparentdatasectionprojectanimationdone="opacity: 1;" >
								<div class="pulse"></div>
								<div class="blackDot"></div>
								<div class="line line2"></div>
								<div class="desc">
									<span>EXCLUSIVE OFFICES</span>
								</div>
							</div>
							<div class="pointThumbnailImage thumbnailImage2" data-_p1projectplacesdatasection-651="opacity:1; left: -200%; top: 70%; transform: scale(5);" data-_p1projecttransparentdatasectionprojectanimationdone="opacity:1; left: -2%; top: 57%; transform: scale(1);" >
								<a href="{{asset('public/site/images/assets/images/zaha_profile_bw_xtend.png')}}" data-lightbox="zaha_profile_bw_xtend">
									<img src="{{asset('public/site/assets/images/zaha_profile_bw_xtend.png')}}" alt="image" />
								</a>
							</div>
							<div class="point point3" data-_p1projectplacesdatasection--251="visibility: hidden;" data-_p1projecttransparentdatasectionprojectanimationdone--20="visibility: visible;"  data-_p1projecttransparentdatasectionprojectanimationdone--19="opacity: 0;" data-_p1projecttransparentdatasectionprojectanimationdone="opacity: 1;" >
								<div class="pulse"></div>
								<div class="blackDot"></div>
								<div class="line line3"></div>
								<div class="desc">
									<span>ME DUBAI HOTEL</span>
								</div>
							</div>
							<div class="pointThumbnailImage thumbnailImage3" data-_p1projectplacesdatasection-651="opacity:1; right: -200%; bottom: 85%; transform: scale(5);" data-_p1projecttransparentdatasectionprojectanimationdone="opacity:1; right: -8%; bottom: 44%; transform: scale(1);" >
								<a href="{{asset('public/site/assets/images/bedroom-1-the_opus_by_zaha_hadid.png')}}" data-lightbox="bedroom-1-the_opus_by_zaha_hadid">
									<img src="{{asset('public/site/assets/images/bedroom-1-the_opus_by_zaha_hadid.png')}}" alt="image" />
								</a>
							</div>
							<div class="point point4" data-_p1projectplacesdatasection--251="visibility: hidden;" data-_p1projecttransparentdatasectionprojectanimationdone--20="visibility: visible;"  data-_p1projecttransparentdatasectionprojectanimationdone--19="opacity: 0;" data-_p1projecttransparentdatasectionprojectanimationdone="opacity: 1;" >
								<div class="pulse"></div>
								<div class="blackDot"></div>
								<div class="line line4"></div>
								<div class="desc">
									<span>THE TERRACE</span>
								</div>
							</div>
							<div class="pointThumbnailImage thumbnailImage4" data-_p1projectplacesdatasection-651="opacity:1; right: -200%; bottom: -10%; transform: scale(5);" data-_p1projecttransparentdatasectionprojectanimationdone="opacity:1; right: -2%; bottom: 11%; transform: scale(1);" >
								<a href="{{asset('public/site/assets/images/terrace%20_swimming_pool.png')}}" data-lightbox="terrace_swimming_pool">
									<img src="{{asset('public/site/assets/images/terrace%20_swimming_pool.png')}}" alt="image" />
								</a>
							</div>
						</div>
						<p class="explore_link" data-_p1projectplacesdatasection--251="visibility: hidden;" data-_p1projecttransparentdatasectionprojectanimationdone--20="visibility: visible;"  data-_p1projecttransparentdatasectionprojectanimationdone--19="opacity: 0;" data-_p1projecttransparentdatasectionprojectanimationdone="opacity: 1;" >
							<a href="portfolio-details-theopus.html">Explore MORE <span>➜</span></a>
						</p>
					</div>
				</div>					
			</div>
			
			<div class="project2">
				<!-- banner -->
				<div class="row">
					<div class="col-12 section section7 min-h-100vh bg-size-cover p2-banner-section" id="section7" data-_p1projecttransparentdatasectionzoomingtransparentimageend--10="visibility: hidden;" data-_p1projecttransparentdatasectionzoomingtransparentimageend--5="background-image:!url('{{asset('public/site/assets/images/project_2_banner.png')}}');visibility: visible;" data-_p1projecttransparentdatasectionzoomingtransparentimageend="background-image:!url('{{asset('public/site/assets/images/project_2_banner.png')}}'); transform: scale(1);top:100%;" data-_p2bannersectionzoomend--50="transform: scale(1);top:0%;"  data-_p2bannerhidetransitionstartposition-1="opacity:1;" data-_p2logobgsectionhideposition-2="opacity:0;visibility: hidden;">
						<div class="p2_banner_desc" data-_p2bannersectionzoomend--50="opacity:0;" data-_p2bannersectionzoomend="opacity:1;" data-_p2bannersectionshowtextend="opacity:1;">
							<p>THE ULTIMATE ADDRESS</p>
							<h4>ONE OF A KIND</h4>
						</div>
					</div>
				</div>
				
				<!-- logo background -->
				<!--
				<div class="row">
					<div class="col-12 section section8 min-h-100vh p2-logo-bg-section" id="section8" data-_p2bannersectionshowtextend--50="top: 100%;" data-_p2bannersectionshowtextend="top: 100%;" data-_p2logobgsectionend="top: 0;" data-_p2logobgsectionhideposition-1="visibility:visible;" data-_p2logobgsectionhideposition-2="visibility:hidden;"></div>
				</div>
				-->
				
				<!-- logo -->
				<div class="section9 logo-section p2-logo-section" id="section9" data-_p2logobgsectionhideposition--101="visibility: hidden; transform: translate(-50%, -50%) scale(1);z-index: 1048;top: 50%;width: 800px;" data-_p2logobgsectionhideposition--100="visibility: visible;top: 50%;" data-_p2logoandtextsectionend="visibility: visible; transform: translate(-50%, -60%) scale(1);top: 46%;width: 55px;"
				data-_p2logoandtextsectionend="transform: translate(-50%, -60%) scale(1);z-index: 6666;top: 46%;width: 55px;" data-_p2projectplacesdatasectionbuildingimagezoominend="transform: translate(-50%, 0%) scale(1);top: 4%;width: 55px;" data-_p2projectplacesdatasectionbuildingimagezoominend-10="z-index: 1048;" 
				data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;visibility: hidden;"
				>
					<img src="{{asset('public/site/assets/images/onepalm-logo1.svg')}}" alt="logo" class="inner-logo2" />
				</div>
				
				<!-- logo text -->
				<div class="section10 logo-text-section p2-logo-text-section" id="section10" data-_p2logoandtextsectionend--30="visibility: hidden; transform: translate(-50%, -50%) scale(1); opacity: 0;z-index: 1048;top: 50%;" data-_p2logoandtextsectionend--29="visibility: visible;top: 50%;" data-_p2logoandtextsectionend="visibility: visible; transform: translate(-50%, -50%) scale(1); opacity: 1;top: 54%;" 
				data-_p2logoandtextsectionend="transform: translate(-50%, -50%) scale(1);z-index: 6666;top: 54%;" data-_p2projectplacesdatasectionbuildingimagezoominend="transform: translate(-50%, 0%) scale(1);top: 8%;" data-_p2projectplacesdatasectionbuildingimagezoominend-10="z-index: 1048;" 
				data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;visibility: hidden;"
				>
					<img src="{{asset('public/site/assets/images/onepalm-logo2.svg')}}" alt="logo" class="inner-logo2" />
				</div>
				
				<!-- project places image -->
				<div class="section11 p2-project-places-data-section" id="section11" data-_p2logoandtextsectionscreenwaitingtimeend="display:none;visibility:hidden; opacity: 0; transform: translate(-50%, 0%) scale(1);" data-_p2logoandtextsectionscreenwaitingtimeend-5="display:block;visibility: visible;  opacity: 0;" data-_p2projectplacesdatasectionbuildingimagezoominend="display:block;visibility: visible; transform: translate(-50%, 0%) scale(1);opacity: 1;"
				data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1; transform: translate(-50%, 0%) scale(1);" data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionendposition="display:none;opacity: 0;visibility: hidden;"
				>
					<img src="{{asset('public/site/assets/images/project2-building1.png')}}" alt="image" class="p2-project-places-data-section-image" />

					<div class="p2_pointer_main">
						<div class="image">
							<div class="point point1" data-_p2projectplacesdatasectionbuildingimagezoominend--150="visibility: hidden;" data-_p2projectplacesdatasectionbuildingimagezoominend--20="visibility: hidden;" data-_p2projectplacesdatasectionbuildingimagezoominend--19="visibility: visible;"  data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;">
								<div class="pulse"></div>
								<div class="line line1"></div>
								<p class="desc desc1">BREATHTAKING VIEWS</p>
							</div>
							<div class="point point2" data-_p2projectplacesdatasectionbuildingimagezoominend--150="visibility: hidden;" data-_p2projectplacesdatasectionbuildingimagezoominend--20="visibility: hidden;" data-_p2projectplacesdatasectionbuildingimagezoominend--19="visibility: visible;"  data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;">
								<div class="pulse"></div>
								<div class="line line2"></div>
								<p class="desc desc2">DESIGNED BY SUPER <br/>POTATO</p>
							</div>
							<div class="point point3" data-_p2projectplacesdatasectionbuildingimagezoominend--150="visibility: hidden;" data-_p2projectplacesdatasectionbuildingimagezoominend--20="visibility: hidden;" data-_p2projectplacesdatasectionbuildingimagezoominend--19="visibility: visible;"  data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;">
								<div class="pulse"></div>
								<div class="line line3 top-bottom"></div>
								<p class="desc desc3">PRIVATE <br/>BEACH</p>
							</div>
							<div class="point point4" data-_p2projectplacesdatasectionbuildingimagezoominend--150="visibility: hidden;" data-_p2projectplacesdatasectionbuildingimagezoominend--20="visibility: hidden;" data-_p2projectplacesdatasectionbuildingimagezoominend--19="visibility: visible;"  data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;">
								<div class="pulse"></div>
								<div class="line line4 right-left"></div>
								<p class="desc desc4">EXCLUSIVE PENTHOUSES</p>
							</div>
							<div class="point point5" data-_p2projectplacesdatasectionbuildingimagezoominend--150="visibility: hidden;" data-_p2projectplacesdatasectionbuildingimagezoominend--20="visibility: hidden;" data-_p2projectplacesdatasectionbuildingimagezoominend--19="visibility: visible;"  data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;">
								<div class="pulse"></div>
								<div class="line line5 right-left"></div>
								<p class="desc desc5">MANAGED BY <br/>DORCHESTER <br/>COLLECTION</p>
							</div>
							<div class="point point6" data-_p2projectplacesdatasectionbuildingimagezoominend--150="visibility: hidden;" data-_p2projectplacesdatasectionbuildingimagezoominend--20="visibility: hidden;" data-_p2projectplacesdatasectionbuildingimagezoominend--19="visibility: visible;"  data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;">
								<div class="pulse"></div>
								<div class="line line6 right-left"></div>
								<p class="desc desc6">DESIGNED BY ELICYON</p>
							</div>
							<div class="point point7" data-_p2projectplacesdatasectionbuildingimagezoominend--150="visibility: hidden;" data-_p2projectplacesdatasectionbuildingimagezoominend--20="visibility: hidden;" data-_p2projectplacesdatasectionbuildingimagezoominend--19="visibility: visible;"  data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;">
								<div class="pulse"></div>
								<div class="line line7 right-left"></div>
								<p class="desc desc7">BESPOKE AMENITIES &amp; <br/>FACILITIES</p>
							</div>
						</div>
					</div>
				</div>
				
				<!-- p2-project-transparent-data-section : using container just for height purpose-->
				<div class="section12 p2-project-transparent-data-section" id="section12" data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionendposition--505="display: none;" data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionendposition--500="display: block; visibility: hidden; opacity: 0; transform: translate(-50%, 0%) scale(1);" data-_p2projectplacesdatasectionbuildingimageafterzoomouttransitionendposition--499="visibility: visible;" data-_p2projecttransparentimagesectionstaticstillend="opacity: 1; transform: translate(-50%, 0%) scale(1);" data-_p2projecttransparentimagesectionslightzoominend="opacity: 1; transform: translate(-50%, 0%) scale(1);" data-_p2projecttransparentimagesectionsdatahidetransitionend="opacity: 1; transform: translate(-50%, 0%) scale(1);" data-_p2projecttransparentdatasectionzoomingtransparentimageend="opacity: 1; transform: translate(-50%, 0%) scale(1);" data-_p3bannersectionzoomend-10="opacity: 1;" data-_p3bannersectionzoomend-15="opacity: 0; visibility: hidden; display: none;" data-_p2projecttransparentdatasectionzoomingtransparentimageend-10="bottom:0%;opacity:1;" data-_p3bannersectionzoomend--50="bottom:36%;opacity:0;">
					<div class="p2-project-transparent-data-section-image-container">
						<img src="{{asset('public/site/assets/images/project2-building2.png')}}" alt="image" class="p2-project-transparent-data-section-image" />
						<!-- points -->
						<div class="p2_pointer_main p2_pointer_vector">
							<div class="image">
								<div class="point point1" data-_p2projecttransparentimagesectionssideimagestransitionend--251="visibility: hidden;" data-_p2projecttransparentimagesectionssideimagestransitionend--20="visibility: visible;"  data-_p2projecttransparentimagesectionssideimagestransitionend--19="opacity: 0;" data-_p2projecttransparentimagesectionssideimagestransitionend="opacity: 1;" 
								>
									<div class="pulse"></div>
									<div class="blackDot"></div>
									<div class="line line1"></div>
									<div class="desc">
										<span>BREATHTAKING VIEWS</span>
									</div>
								</div>
								<div class="pointThumbnailImage thumbnailImage1" data-_p2projecttransparentimagesectionslightzoominend--51="visibility: hidden;" data-_p2projecttransparentimagesectionslightzoominend="visibility: visible;opacity:1; left: -300%; top: -10%; transform: scale(5);" data-_p2projecttransparentimagesectionssideimagestransitionend="opacity:1; left: -19%; top: 50%; transform: scale(1);" >
									<a href="{{asset('public/site/assets/img/project1/breathtaking_views2.png')}}" data-lightbox="breathtaking_views2">
										<img src="{{asset('public/site/assets/images/breathtaking_views2.png')}}" alt="image" />
									</a>
								</div>
								<div class="point point2" data-_p2projecttransparentimagesectionssideimagestransitionend--251="visibility: hidden;" data-_p2projecttransparentimagesectionssideimagestransitionend--20="visibility: visible;"  data-_p2projecttransparentimagesectionssideimagestransitionend--19="opacity: 0;" data-_p2projecttransparentimagesectionssideimagestransitionend="opacity: 1;" 
								>
									<div class="pulse"></div>
									<div class="blackDot"></div>
									<div class="line line2"></div>
									<div class="desc">
										<span>PRIVATE BEACH</span>
									</div>
								</div>
								<div class="pointThumbnailImage thumbnailImage2" data-_p2projecttransparentimagesectionslightzoominend--51="visibility: hidden;" data-_p2projecttransparentimagesectionslightzoominend="visibility: visible;opacity:1; left: -300%; bottom: 15%; transform: scale(5);" data-_p2projecttransparentimagesectionssideimagestransitionend="opacity:1; left: -19%; bottom: 6%; transform: scale(1);" >
									<a href="{{asset('public/site/assets/images/beach_front_living.png')}}" data-lightbox="beach_front_living">
										<img src="{{asset('public/site/assets/images/beach_front_living.png')}}" alt="image" />
									</a>
								</div>
								<div class="point point3" data-_p2projecttransparentimagesectionssideimagestransitionend--251="visibility: hidden;" data-_p2projecttransparentimagesectionssideimagestransitionend--20="visibility: visible;"  data-_p2projecttransparentimagesectionssideimagestransitionend--19="opacity: 0;" data-_p2projecttransparentimagesectionssideimagestransitionend="opacity: 1;" 
								>
									<div class="pulse"></div>
									<div class="blackDot"></div>
									<div class="line line3 right-left"></div>
									<div class="desc">
										<span>EXCLUSIVE PENTHOUSES</span>
									</div>
								</div>
								<div class="pointThumbnailImage thumbnailImage3" data-_p2projecttransparentimagesectionslightzoominend--51="visibility: hidden;" data-_p2projecttransparentimagesectionslightzoominend="visibility: visible;opacity:1; right: -300%; bottom: 85%; transform: scale(5);" data-_p2projecttransparentimagesectionssideimagestransitionend="opacity:1; right: -18%; bottom: 48%; transform: scale(1);" >
									<a href="{{asset('public/site/assets/images/breathtaking_views.png')}}" data-lightbox="breathtaking_views">
										<img src="{{asset('public/site/assets/images/breathtaking_views.png')}}" alt="image" />
									</a>
								</div>
								<div class="point point4" data-_p2projecttransparentimagesectionssideimagestransitionend--251="visibility: hidden;" data-_p2projecttransparentimagesectionssideimagestransitionend--20="visibility: visible;"  data-_p2projecttransparentimagesectionssideimagestransitionend--19="opacity: 0;" data-_p2projecttransparentimagesectionssideimagestransitionend="opacity: 1;" 
								>
									<div class="pulse"></div>
									<div class="blackDot"></div>
									<div class="line line4 right-left"></div>
									<div class="desc">
										<span>DESIGNED BY ELICYON</span>
									</div>
								</div>
								<div class="pointThumbnailImage thumbnailImage4" data-_p2projecttransparentimagesectionslightzoominend--51="visibility: hidden;" data-_p2projecttransparentimagesectionslightzoominend="visibility: visible;opacity:1; right: -300%; bottom: -10%; transform: scale(5);" data-_p2projecttransparentimagesectionssideimagestransitionend="opacity:1; right: -23%; bottom: 6%; transform: scale(1);" >
									<a href="{{asset('public/site/assets/images/arrival.png')}}" data-lightbox="arrival">
										<img src="{{asset('public/site/assets/images/arrival.png')}}" alt="image" />
									</a>
								</div>
							</div>
							<p class="explore_link" data-_p2projecttransparentimagesectionssideimagestransitionend--251="visibility: hidden;" data-_p2projecttransparentimagesectionssideimagestransitionend--20="visibility: visible;"  data-_p2projecttransparentimagesectionssideimagestransitionend--19="opacity: 0;" data-_p2projecttransparentimagesectionssideimagestransitionend="opacity: 1;" 
								>
								<a href="portfolio-details.html">Explore MORE <span>➜</span></a>
							</p>
						</div>
					</div>					
				</div>
				
				
			</div>
		

			
			<div class="project3">
				<!-- banner -->
				<div class="row">
					<div class="col-12 section section13 min-h-100vh bg-size-cover p3-banner-section" id="section13" data-_p2projecttransparentdatasectionzoomingtransparentimageend--10="visibility: hidden;" data-_p2projecttransparentdatasectionzoomingtransparentimageend--5="background-image:!url('{{asset('public/site/assets/images/project_3_banner.png')}}');visibility: visible;" data-_p2projecttransparentdatasectionzoomingtransparentimageend="background-image:!url('{{asset('public/site/assets/images/project_3_banner.png')}}'); transform: scale(1);top:100%;" data-_p3bannersectionzoomend--50="transform: scale(1);top:0%;"  data-_p3bannerhidetransitionstartposition-1="opacity:1;" data-_p3logobgsectionhideposition-2="opacity:0;visibility: hidden;">
						<div class="p3_banner_desc" data-_p3bannersectionzoomend--50="opacity:0;" data-_p3bannersectionzoomend="opacity:1;" data-_p3bannersectionshowtextend="opacity:1;">
							<p>BURJ KHALIFA DISTRICT</p>
							<h4>A LIFE WITHOUT LIMITS</h4>
						</div>
					</div>
				</div>
				
				<!-- logo background -->
				<!--
				<div class="row">
					<div class="col-12 section section14 min-h-100vh p3-logo-bg-section" id="section14" data-_p3bannersectionshowtextend--50="top: 100%;" data-_p3bannersectionshowtextend="top: 100%;" data-_p3logobgsectionend="top: 0;" data-_p3logobgsectionhideposition-1="visibility:visible;" data-_p3logobgsectionhideposition-2="visibility:hidden;"></div>
				</div>
				-->
				
				<!-- logo -->
				<div class="section15 logo-section p3-logo-section" id="section15" data-_p3logobgsectionhideposition--101="visibility: hidden; transform: translate(-50%, -50%) scale(20);z-index: 1048;" data-_p3logobgsectionhideposition--100="opacity: 1;visibility: visible;" data-_p3logoandtextsectionend="visibility: visible; transform: translate(-50%, -50%) scale(1);top: 50%;"
				data-_p3logoandtextsectionend="transform: translate(-50%, -50%) scale(1);z-index: 6666;top: 50%;" data-_p3logoandtextsectionend-1="opacity: 1;visibility:hidden;" data-_p3logoandtextsectionend-5="opacity: 0;visibility:hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend="transform: translate(-50%, 0%) scale(1);top: 4%;" data-_p3projectplacesdatasectionbuildingimagezoominend-10="z-index: 1048;" 
				data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;visibility: hidden;"
				>
					<!--
					<img src="assets/images/project_3_logo.png" alt="logo" class="inner-logo2" />
					-->
					<img src="{{asset('public/site/assets/images/project3-logoicon.svg')}}" alt="logo" class="inner-logo2" />
				</div>
				
				<!-- logo text -->
				<div class="section16 logo-text-section p3-logo-text-section" id="section16" data-_p3logoandtextsectionend--30="visibility: hidden; transform: translate(-50%, -50%) scale(1); opacity: 0;z-index: 1048;" data-_p3logoandtextsectionend--29="visibility: visible;" data-_p3logoandtextsectionend="visibility: visible; transform: translate(-50%, -50%) scale(1); opacity: 1;top: 50%;" 
				data-_p3logoandtextsectionend="transform: translate(-50%, -50%) scale(1);z-index: 6666;top: 50%;" data-_p3projectplacesdatasectionbuildingimagezoominend="transform: translate(-50%, 0%) scale(1);top: 4%;" data-_p3projectplacesdatasectionbuildingimagezoominend-10="z-index: 1048;" 
				data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;visibility: hidden;"
				>
					<img src="{{asset('public/site/assets/images/project3-completelogo.svg')}}" alt="logo" class="inner-logo2" />
				</div>
				
				<!-- project places image -->
				<div class="section17 p3-project-places-data-section" id="section17" data-_p3logoandtextsectionscreenwaitingtimeend="display:none;visibility:hidden; opacity: 0; transform: translate(-50%, 0%) scale(1);" data-_p3logoandtextsectionscreenwaitingtimeend-5="display:block;visibility: visible;  opacity: 0;" data-_p3projectplacesdatasectionbuildingimagezoominend="display:block;visibility: visible; transform: translate(-50%, 0%) scale(1);opacity: 1;"
				data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1; transform: translate(-50%, 0%) scale(1);" data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionendposition="opacity: 0;visibility: hidden;display:none;"
				>
					<img src="{{asset('public/site/assets/images/project_3_building.png')}}" alt="image" class="p3-project-places-data-section-image" />

					<div class="p3_pointer_main">
						<div class="image">
							<div class="point point1" data-_p3projectplacesdatasectionbuildingimagezoominend--150="visibility: hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend--20="visibility: hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend--19="visibility: visible;"  data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;">
								<div class="pulse"></div>
								<div class="line line1"></div>
								<p class="desc desc1">BURJ KHALIFA DISTRICT</p>
							</div>
							<div class="point point2" data-_p3projectplacesdatasectionbuildingimagezoominend--150="visibility: hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend--20="visibility: hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend--19="visibility: visible;"  data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;">
								<div class="pulse"></div>
								<div class="line line2"></div>
								<p class="desc desc2">ROOFTOP INFINITY POOL <br/> &amp; FACILITIES</p>
							</div>
							<div class="point point3" data-_p3projectplacesdatasectionbuildingimagezoominend--150="visibility: hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend--20="visibility: hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend--19="visibility: visible;"  data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;">
								<div class="pulse"></div>
								<div class="line line3"></div>
								<p class="desc desc3">10TH ICONIC DORCHESTER <br/>COLLECTION HOTEL</p>
							</div>
							<div class="point point4" data-_p3projectplacesdatasectionbuildingimagezoominend--150="visibility: hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend--20="visibility: hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend--19="visibility: visible;"  data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;">
								<div class="pulse"></div>
								<div class="line line4"></div>
								<p class="desc desc4">WATERFRONT LIVING</p>
							</div>
							<div class="point point5" data-_p3projectplacesdatasectionbuildingimagezoominend--150="visibility: hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend--20="visibility: hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend--19="visibility: visible;"  data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;">
								<div class="pulse"></div>
								<div class="line line5 right-left"></div>
								<p class="desc desc5">THE PENTHOUSES</p>
							</div>
							<div class="point point6" data-_p3projectplacesdatasectionbuildingimagezoominend--150="visibility: hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend--20="visibility: hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend--19="visibility: visible;"  data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;">
								<div class="pulse"></div>
								<div class="line line6 right-left"></div>
								<p class="desc desc6">MANAGED BY <br/>DORCHESTER COLLECTION</p>
							</div>
							<div class="point point7" data-_p3projectplacesdatasectionbuildingimagezoominend--150="visibility: hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend--20="visibility: hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend--19="visibility: visible;"  data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;">
								<div class="pulse"></div>
								<div class="line line7 right-left"></div>
								<p class="desc desc7">INTERIORS BY GILLS &amp; <br/>BOSSIER</p>
							</div>
							<div class="point point8" data-_p3projectplacesdatasectionbuildingimagezoominend--150="visibility: hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend--20="visibility: hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend--19="visibility: visible;"  data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;">
								<div class="pulse"></div>
								<div class="line line8 right-left"></div>
								<p class="desc desc8">RESIDENTIAL <br/>OUTDOOR POOL</p>
							</div>
							<div class="point point9" data-_p3projectplacesdatasectionbuildingimagezoominend--150="visibility: hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend--20="visibility: hidden;" data-_p3projectplacesdatasectionbuildingimagezoominend--19="visibility: visible;"  data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition="opacity: 1;" data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionstartposition-20="opacity: 0;">
								<div class="pulse"></div>
								<div class="line line9 right-left"></div>
								<p class="desc desc9">RETAIL / F&ampB</p>
							</div>
						</div>
					</div>
				</div>
				<!-- p3-project-transparent-data-section : using container just for height purpose-->
				<div class="section18 p3-project-transparent-data-section" id="section18" data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionendposition--500="display: block; visibility: hidden; opacity: 0; transform: translate(-50%, 0%) scale(1);" data-_p3projectplacesdatasectionbuildingimageafterzoomouttransitionendposition--499="visibility: visible;" data-_p3projecttransparentimagesectionstaticstillend="opacity: 1; transform: translate(-50%, 0%) scale(1);" data-_p3projecttransparentimagesectionslightzoominend="opacity: 1; transform: translate(-50%, 0%) scale(1);" data-_p3projecttransparentimagesectionsdatahidetransitionend="opacity: 1; transform: translate(-50%, 0%) scale(1);" data-_p3projecttransparentdatasectionzoomingtransparentimageend="opacity: 0; transform: translate(-50%, 0%) scale(1);" data-_aboutbannersectionzoomend-10="opacity: 0;" data-_aboutbannersectionzoomend-15="opacity: 0; visibility: hidden; display: none;">
					<div class="p3-project-transparent-data-section-image-container">
						<img src="{{asset('public/site/assets/images/project_3_vector.png')}}" alt="image" class="p3-project-transparent-data-section-image" />
						<!-- points -->
						<div class="p3_pointer_main p3_pointer_vector">
							<div class="image">
								<div class="point point1" data-_p3projecttransparentimagesectionssideimagestransitionend--251="visibility: hidden;" data-_p3projecttransparentimagesectionssideimagestransitionend--20="visibility: visible;"  data-_p3projecttransparentimagesectionssideimagestransitionend--19="opacity: 0;" data-_p3projecttransparentimagesectionssideimagestransitionend="opacity: 1;" 
								>
									<div class="pulse"></div>
									<div class="blackDot"></div>
									<div class="line line1"></div>
									<div class="desc">
										<span>BURJ KHALIFA DISTRICT</span>
									</div>
								</div>
								<div class="pointThumbnailImage thumbnailImage1" data-_p3projecttransparentimagesectionslightzoominend--51="visibility: hidden;" data-_p3projecttransparentimagesectionslightzoominend="visibility: visible;opacity:1; left: -300%; top: -10%; transform: scale(5);" data-_p3projecttransparentimagesectionssideimagestransitionend="opacity:1; left: 25%; top: 24%; transform: scale(1);" >
									<a href="{{asset('public/site/assets/img/project1/p3_1.png')}}" data-lightbox="p3_1">
										<img src="{{asset('public/site/assets/images/p3_1.png')}}" alt="image" />
									</a>
								</div>
								<div class="point point2" data-_p3projecttransparentimagesectionssideimagestransitionend--251="visibility: hidden;" data-_p3projecttransparentimagesectionssideimagestransitionend--20="visibility: visible;"  data-_p3projecttransparentimagesectionssideimagestransitionend--19="opacity: 0;" data-_p3projecttransparentimagesectionssideimagestransitionend="opacity: 1;" 
								>
									<div class="pulse"></div>
									<div class="blackDot"></div>
									<div class="line line2"></div>
									<div class="desc">
										<span>10TH ICONIC DORCHESTER <br/>COLLECTION HOTEL</span>
									</div>
								</div>
								<div class="pointThumbnailImage thumbnailImage2" data-_p3projecttransparentimagesectionslightzoominend--51="visibility: hidden;" data-_p3projecttransparentimagesectionslightzoominend="visibility: visible;opacity:1; left: -300%; bottom: 40%; transform: scale(5);" data-_p3projecttransparentimagesectionssideimagestransitionend="opacity:1; left: -2%; bottom: 38%; transform: scale(1);" >
									<a href="{{asset('public/site/assets/images/p3_2.png')}}" data-lightbox="p3_1">
										<img src="{{asset('public/site/assets/images/p3_2.png')}}" alt="image" />
									</a>
								</div>
								<div class="point point3" data-_p3projecttransparentimagesectionssideimagestransitionend--251="visibility: hidden;" data-_p3projecttransparentimagesectionssideimagestransitionend--20="visibility: visible;"  data-_p3projecttransparentimagesectionssideimagestransitionend--19="opacity: 0;" data-_p3projecttransparentimagesectionssideimagestransitionend="opacity: 1;" 
								>
									<div class="pulse"></div>
									<div class="blackDot"></div>
									<div class="line line2"></div>
									<div class="desc">
										<span>WATERFRONT LIVING</span>
									</div>
								</div>
								<div class="pointThumbnailImage thumbnailImage3" data-_p3projecttransparentimagesectionslightzoominend--51="visibility: hidden;" data-_p3projecttransparentimagesectionslightzoominend="visibility: visible;opacity:1; left: -300%; bottom: 4%; transform: scale(5);" data-_p3projecttransparentimagesectionssideimagestransitionend="opacity:1; left: -19%; bottom: 6%; transform: scale(1);" >
									<a href="{{asset('public/site/assets/images/p3_3.png')}}" data-lightbox="p3_3">
										<img src="{{asset('public/site/assets/images/p3_3.png')}}" alt="image" />
									</a>
								</div>
								<div class="point point4" data-_p3projecttransparentimagesectionssideimagestransitionend--251="visibility: hidden;" data-_p3projecttransparentimagesectionssideimagestransitionend--20="visibility: visible;"  data-_p3projecttransparentimagesectionssideimagestransitionend--19="opacity: 0;" data-_p3projecttransparentimagesectionssideimagestransitionend="opacity: 1;" 
								>
									<div class="pulse"></div>
									<div class="blackDot"></div>
									<div class="line line3 right-left"></div>
									<div class="desc">
										<span>MANAGED BY DORCHESTER <br/>COLLECTION</span>
									</div>
								</div>
								<div class="pointThumbnailImage thumbnailImage4" data-_p3projecttransparentimagesectionslightzoominend--51="visibility: hidden;" data-_p3projecttransparentimagesectionslightzoominend="visibility: visible;opacity:1; right: -300%; top: -10%; transform: scale(5);" data-_p3projecttransparentimagesectionssideimagestransitionend="opacity:1; right: -33%; top: 5%; transform: scale(1);" >
									<a href="{{asset('public/site/assets/images/p3_4.png')}}" data-lightbox="p3_4">
										<img src="{{asset('public/site/assets/images/p3_4.png')}}" alt="image" />
									</a>
								</div>
								<div class="point point5" data-_p3projecttransparentimagesectionssideimagestransitionend--251="visibility: hidden;" data-_p3projecttransparentimagesectionssideimagestransitionend--20="visibility: visible;"  data-_p3projecttransparentimagesectionssideimagestransitionend--19="opacity: 0;" data-_p3projecttransparentimagesectionssideimagestransitionend="opacity: 1;" 
								>
									<div class="pulse"></div>
									<div class="blackDot"></div>
									<div class="line line4 right-left"></div>
									<div class="desc">
										<span>RETAIL / F&amp;B</span>
									</div>
								</div>
								<div class="pointThumbnailImage thumbnailImage5" data-_p3projecttransparentimagesectionslightzoominend--51="visibility: hidden;" data-_p3projecttransparentimagesectionslightzoominend="visibility: visible;opacity:1; right: -300%; bottom: -10%; transform: scale(5);" data-_p3projecttransparentimagesectionssideimagestransitionend="opacity:1; right: -21%; bottom: 10%; transform: scale(1);" >
									<a href="{{asset('public/site/assets/images/p3_5.png')}}" data-lightbox="p3_5">
										<img src="{{asset('public/site/assets/images/p3_5.png')}}" alt="image" />
									</a>
								</div>
							</div>
							<p class="explore_link" data-_p3projecttransparentimagesectionssideimagestransitionend--251="visibility: hidden;" data-_p3projecttransparentimagesectionssideimagestransitionend--20="visibility: visible;"  data-_p3projecttransparentimagesectionssideimagestransitionend--19="opacity: 0;" data-_p3projecttransparentimagesectionssideimagestransitionend="opacity: 1;" 
								>
								<a href="portfolio-details-theresidences.html">Explore MORE <span>➜</span></a>
							</p>
						</div>
					</div>					
				</div>
				
				
			</div>
				
			
			<div class="data-sections-container row" data-_p3projecttransparentimagesectionsdatahidetransitionend--10="visibility: hidden;z-index: -1;" data-_p3projecttransparentimagesectionsdatahidetransitionend--5="visibility: visible;z-index: 1900;" data-_p3projecttransparentimagesectionsdatahidetransitionend="z-index: 1900;" data-_datasectionscontainerend="z-index: 1900;">
			<!--
			<div class="data-sections-container row" data-_p3projecttransparentimagesectionsdatahidetransitionend--10="visibility: hidden;z-index: -1;" data-_p3projecttransparentimagesectionsdatahidetransitionend--5="visibility: visible;z-index: 1900;" data-_p3projecttransparentimagesectionsdatahidetransitionend="z-index: 1900;" data-_datasectionscontainerend="z-index: 1900;" style="background-image:url('assets/images/short_details_screen_bg.png');">
			-->
			<!--
			data-_p3projecttransparentimagesectionsdatahidetransitionend--10="visibility: hidden;z-index: -1;" data-_p3projecttransparentimagesectionsdatahidetransitionend--5="visibility: visible;z-index: 1900;" data-_p3projecttransparentimagesectionsdatahidetransitionend="transform: translateY(0%);" data-_datasectionscontainerend="transform: translateY(-100%);"
			-->
			
				<!-- about us -->
				<div class="about-us-section-container col-12" style="background-image:url('assets/images/short_details_screen_bg.png');">
					<!-- banner -->
					<div class="row">
						<div class="col-12 section section19 min-h-100vh bg-size-contain about-us-banner-section" id="section19">
						</div>
					</div>
					
					<div class="about_us_banner_desc short_details_screen section20" id="section20">
						<h4>
							DETAILS MAKE PERFECTION
						</h4>
						<p>
							CREATING ARCHITECTURAL MASTERPIECES WITH THE WORLD'S LEADING ARCHITECTS DESIGNERS &amp; ARTISTS SINCE 2005
						</p>
					</div>
				</div>
				
				
				<!-- portfolio -->
				<div class="col-12 section section21 fp-section fp-table active fp-completely min-h-100vh portfolio-container" id="section21">
					<div class="fp-tableCell">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="pageTitle">
										<h2 class="wow animated slideInDown animated_delay_05 animated animated animated animated animated animated animated animated animated animated animated animated animated animated" style="visibility: visible; animation-name: slideInDown;">The Portfolio</h2>
										<p class="wow animated slideInLeft animated_delay_1 animated animated animated animated animated animated animated animated animated animated animated animated animated animated" style="visibility: visible; animation-name: slideInLeft;">Bring Art into Architecture</p>
									</div>
									<div class="portfolioContent">

										<div class="tab-content">
											<div role="tabpanel" class="tab-pane active" id="commercial">
												<div class="portfolioList wow animated fadeInUp animated_delay_2 animated animated animated animated animated animated animated animated animated animated animated animated animated animated" style="visibility: visible; animation-name: fadeInUp;">
													<div class="row">
														<div class="col-md-4">
															<a class="portfolioItem portfolioItem1" href="portfolio-list.html#residential" data-_portfoliosectionanimationstart-50="transform: scale(0.5);left:100%;" data-_portfoliosectionanimationend="transform: scale(1);left:0%;">
																<span>Residential Collections</span>
																<img src="{{asset('public/site/assets/images/profile2.png')}}" alt="">
															</a>
														</div>
														<div class="col-md-4">
															<a class="portfolioItem portfolioItem2" href="portfolio-list.html#commercial" data-_portfoliosectionanimationstart-50="transform: scale(0.7);" data-_portfoliosectionanimationend="transform: scale(1);">
                                                                <span>Commercial Solutions</span>
																<img src="{{asset('public/site/assets/images/profile1.png')}}" alt="">
															</a>
														</div>
														<div class="col-md-4">
															<a class="portfolioItem portfolioItem3" href="portfolio-list.html#mixed-use" data-_portfoliosectionanimationstart-50="transform: scale(0.5);right:100%;" data-_portfoliosectionanimationend="transform: scale(1);right:0%;">
																<span>Mixed use developments</span>
																<img src="{{asset('public/site/assets/images/profile3.png')}}" alt="">
															</a>
														</div>
													</div>
												</div>
											</div>
										  
										   
										</div>

										<div class="loadmore wow animated fadeInUp animated_delay_25 animated animated animated animated animated animated animated animated animated animated animated animated animated animated" style="visibility: visible; animation-name: fadeInUp;">
											<a href="portfolio-list.html">Load More <span>➜</span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				<!-- whats new -->
				<div class="col-12 section section22 banner_desc3 fp-section fp-table active fp-completely min-h-100vh whatsnew-container" id="section22">
					<div class="fp-tableCell">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="pageTitle">
										<h2 class="wow animated slideInDown animated_delay_05 animated animated animated animated animated animated animated animated animated animated animated" style="visibility: visible; animation-name: slideInDown;">What’s New </h2>
										<p class="wow animated slideInLeft animated_delay_1 animated animated animated animated animated animated animated animated animated animated animated" style="visibility: visible; animation-name: slideInLeft;">NEWS FEED</p>
									</div>
									<div class="whatsNew wow animated fadeInUp animated_delay_2 animated animated animated animated animated animated animated animated animated animated animated" style="visibility: visible; animation-name: fadeInUp;">
										<div class="dropdown custom_dropdwon">
											<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">ALL
											<span class="caret"></span></button>
											<ul class="dropdown-menu">
											  <li><a href="#">ALL</a></li>
											  <li><a href="#">The Opus</a></li>
											  <li><a href="#">The Residences</a></li>
											  <li><a href="#">The One</a></li>
											  <li><a href="#">One Palm at jumeirah</a></li>
											</ul>
										  </div>
										<div class="whatsNewList">
											<div class="whatsNewItemMain whatsNewItemLarge">
												<div class="whatsnewItem">
													<span class="latestNews">Latest News</span>
													<div class="whatsnewImg">
														<img src="{{asset('public/site/assets/images/image1.jpg')}}" alt="">
													</div>
													<div class="whatsnewItemContent">
														<h4>Look inside Zaha Hadid-designed The Opus's ME Dubai</h4>
														<div class="text-right">
														<a href="#">Read More <span>➜</span></a>
													</div>
													</div>
												</div>
											</div>
											<div class="whatsNewItemMain">
												<div class="whatsnewItem">
													<span class="latestNews">Latest News</span>
													<img src="{{asset('public/site/assets/images/image2.jpg')}}" alt="">
													<div class="whatsnewItemContent">
														<h4>Look inside Zaha Hadid- designed The Opus's ME  Dubai</h4>
														<p>ME Dubai is the first ME by Melia hotel in the Middle East and is the only hotel in the world to be designed    both inside and out by the late Zaha Hadid.</p>
														<a href="#">Read More <span>➜</span></a>
													</div>
												</div>
											</div>
											<div class="whatsNewItemMain">
												<div class="whatsnewItem">
													<span class="latestNews">Latest News</span>
													<img src="{{asset('public/site/assets/images/image3.jpg')}}" alt="">
													<div class="whatsnewItemContent">
														<h4>Look inside Zaha Hadid- designed The Opus's ME  Dubai</h4>
														<p>ME Dubai is the first ME by Melia hotel in the Middle East and is the only hotel in the world to be designed    both inside and out by the late Zaha Hadid.</p>
														<a href="#">Read More <span>➜</span></a>
													</div>
												</div>
											</div>
										</div>
									   
									</div>
									<div class="loadmore  wow animated fadeInUp animated_delay_25 animated animated animated animated animated animated animated animated animated animated animated" style="visibility: visible; animation-name: fadeInUp;">
										<a href="whatsnew.html">Load More <span>➜</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				<!-- contact us -->
				<div class="col-12 section section23 banner_desc3 fp-section fp-table active fp-completely min-h-100vh contactus-container" id="section23" style="background-image: url('{{asset('public/site/assets/images/connect_bg.jpg')}}');">
					<div class="fp-tableCell">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="pageTitle">
										<h2 class="wow animated slideInDown animated_delay_05 animated animated animated animated animated animated animated animated animated animated animated animated" style="visibility: visible; animation-name: slideInDown;">let’s get connected </h2>
										<p class="wow animated slideInLeft animated_delay_1 animated animated animated animated animated animated animated animated animated animated animated animated" style="visibility: visible; animation-name: slideInLeft;">Contact Us</p>
									</div>
									<div class="connectPage">
										<div class="contactForm wow animated fadeInLeft animated_delay_15 animated animated animated animated animated animated animated animated animated animated animated animated" style="visibility: visible; animation-name: fadeInLeft;">
										<div id="Feedbackmessage"></div>
										<form id="HomeContactFormSubmit">
											{{csrf_field()}}
											<div class="row">
												<div class="col-md-6 pd-0">
													<div class="form-group my-5">
														<input type="text" class="form-control text-uppercase" id="f_name"
															placeholder="first name" required="" name="first_name">
													</div>
												</div>
												<div class="col-md-6 pd-0">
													<div class="form-group my-5">
														<input type="text" class="form-control text-uppercase" id="l_name"
															placeholder="last name" required="" name="last_name">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 pd-0">
													<div class="form-group my-5">
														<input type="text" class="form-control text-uppercase" id="email"
															placeholder="Email" required="" name="email">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 pd-0">
													<div class="form-group my-5">
														<input type="text" class="form-control text-uppercase" id="phone"
															placeholder="Phone" name="phone" required="">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 pd-0">
													<div class="form-group my-5">
														<textarea class="form-control text-uppercase" rows="4" id="message"
															placeholder="message" name="message" required=""></textarea>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 pd-0">
													<!--<div class="formBtn">
														<a href="#.">enquire more</a>
													</div>-->
													<button type="submit" id="HomecontactBtnReport" class="btn btn-default btn-link btn-red btn-block text-uppercase tss-msb py-10 px-45 mt-0 mb-5 fs-14">inquire more</button>
												</div>
											</div>
										</form>
										</div>
										<div class="contactInfo wow animated fadeInRight animated_delay_2 animated animated animated animated animated animated animated animated animated animated animated animated" style="visibility: visible; animation-name: fadeInRight;">
											<img src="assets/images/location.png" alt="">
											<h4>Omniyat Headquarters:</h4>
											<p>26th Floor, One by Omniyat, Business Bay</p>
										</div>
										<div class="newsLetter wow animated fadeInLeft animated_delay_25 animated animated animated animated animated animated animated animated animated animated animated animated" style="visibility: visible; animation-name: fadeInLeft;">
											<h4>Subscribe to OUR NEWSLETTER</h4>
											<div class="newsLetterForm">
												{{csrf_field()}}
												<input class="form-control" type="text" placeholder="ENTER YOUR EMAIL ADDRESS">
												<button type="submit" class="btn btn-default">Register</button>
											</div>
										</div>
										<div class="row wow animated fadeInUp animated_delay_25 animated animated animated animated animated animated animated animated animated animated animated animated" style="visibility: visible; animation-name: fadeInUp;">
											<div class="col-md-4">
												<p class="copyrights ">Copyrights reserved 2020</p>
											</div>
											<div class="col-md-4">
												<div class="followUs">
													<h4>follow us here</h4>
													<div class="sociallink">
														<a target="_blank" href="https://www.facebook.com/OmniyatOfficial"> <img src="{{asset('public/site/assets/images/facebook.png')}}" alt=""></a>
														<a target="_blank" href="https://www.instagram.com/omniyatofficial/"> <img src="{{asset('public/site/assets/images/instagram.png')}}" alt=""></a>
														<a target="_blank" href="https://www.linkedin.com/company/omniyat-group"> <img src="{{asset('public/site/assets/images/linkedin.png')}}" alt=""></a>
														<a target="_blank" href=" https://twitter.com/OmniyatOfficial"> <img src="{{asset('public/site/assets/images/twitter.png')}}" alt=""></a>
														<a target="_blank" href="https://www.youtube.com/channel/UCZvDnJo6wz5WUm1K8PcUfKw/videos"> <img src="{{asset('public/site/assets/images/youtube.png')}}" alt=""></a>
													</div>
												</div>
											</div>
											<div class="col-md-4">
                                                <p class="terms"><a href="terms-and-conditions.html" style="color: #000;">terms &amp; Conditions</a> | <a href="privacy-policy.html" style="color: #000;">privacy policy</a></p>
											</div>
										</div>
										
									</div>
								 
								</div>
							</div>
						</div>
					</div>
				</div>
			
			</div>
		</div>
		
		<div class="loader-container">
			<img src="{{asset('public/site/assets/images/loader.gif')}}" alt="loader" />
		</div>
	
		<!-- jQuery and JS bundle w/ Popper.js -->
		<!--
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		-->
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
		<script type="text/javascript" src="{{asset('public/site/assets/js/jquery.easymenu.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
		<script src="{{asset('public/site/assets/js/skrollr.min.js')}}"></script>
		<script src="{{asset('public/site/assets/js/script.js')}}"></script>
		<script>
			sentContactMails('HomeContactFormSubmit', 'HomecontactBtnReport', 'Feedbackmessage');
    $(document).ready(function(){
      $(".hamburger-el").click(function(){
        $(".main_menu").toggleClass("show");
      });
        
        $('.hamburger-el').click(function(){
            // $(this).toggleClass('open');
            $('.hamburger-el').toggleClass('open');
			setMenuColorClass();
        });
        $(".headermenu-el").easymenu();
		
		$(window).scroll(function(){
			setMenuColorClass();
		});
		
		function setMenuColorClass() {
			if($('.hamburger-dark').css('display') == 'none')
			{
				$(".headermenu-el").addClass("headermenu-white");
			} else {
				$(".headermenu-el").removeClass("headermenu-white");
			}
		}
    });
</script>
<!--    mobile    -->
    <script src="{{asset('public/site/vendor/mobile_menu/js/site.min.js')}}"></script>
    <script src="{{asset('public/site/vendor/mobile_menu/js/ma5-menu.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            ma5menu({
                position: 'right',
                closeOnBodyClick: true
            });
        });
    </script>    
	</body>
</html>