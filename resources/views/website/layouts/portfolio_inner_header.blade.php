<div class="header clearHeader portfolio_details desktop_view">
    <nav class="navbar navbar-default navbar-fixed-top">

        <div class="header-container">

            <div class="navbar-header">
                <a class="navbar-brand" href="{{route('site.home')}}">
                    <img class="normalLogo" src="{{asset('public/site/img/logo-omniyat1.svg')}}" alt="logo">
                    <img class="whiteLogo" src="{{asset('public/site/img/logo-omniyat-white.svg')}}" alt="logo" style="display: none;">
                </a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <!--<li><button class="hamburger">Toggle</button></li>-->
                <li>
                    <div id="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    </div>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right clearfix main_menu " id="headermenu">
                <li><a href="javascript:void(0)">Company</a>
                    <ul>
                        <li><a href="{{route('site.about.company')}}">About Omniyat</a></li>  
                        <li><a href="{{route('site.philosophy')}}">Philosophy</a></li>
                        <li><a href="{{route('site.leadership')}}">Leadership</a></li>
                        <!--<li><a href="javascript:void(0)">Partners & Brands </a></li>-->
                    </ul>
                </li>
                <li><a href="{{route('site.whats.new')}}">What's new</a></li>
                <li><a href="{{route('site.portfolio')}}">Portfolio</a></li>
                <li class="sub_menu"><a href="javascript:void(0)">Media</a>
                    <ul>
                        <li><a href="{{route('site.whats.on.media')}}">What's on media</a></li>
                        <li><a href="{{route('site.press.release')}}">Press Releases</a></li>
                        <li><a href="{{route('site.press.kit')}}">Press Kit</a></li> 
                        <!--<li><a href="javascript:void(0)">Chairman Newsletters</a></li>-->
                        <li><a href="{{route('site.csr')}}">CSR</a></li>
                        <li><a href="{{route('site.sponsorships')}}">Sponsorships</a></li>
                    </ul>
                </li>
                <li><a href="{{route('site.contact.us')}}">Contact us</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="mobile_div">

    <nav class="navbar mobile_header inner_mobile_header">

        <div class="logo">
            <a class="navbar-brand" href="javascript:void(0)"><img src="{{asset('public/site/img/logo-omniyat1.svg')}}"></a>
        </div>

        <div class="m_menu">

            <button class="ma5menu__toggle btn" type="button">
                <span></span>
                <span></span>
            </button> 

            <div class="mobile_nav">
                <nav class="ma5menu" itemscope="" >
                    <div class="ma5menu__header">
                        <a class="ma5menu__home" href="{{route('site.index')}}" tabindex="-1">
                            <img src="{{asset('public/site/img/logo-omniyat-white.svg')}}"/>
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
                                    <a href="javascript:void(0)">Partners & Brands</a>
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
                        <li data-ma5order="ma5-li-6"><a href="{{route('site.privacy.policy')}}">Privacy Policy</a></li>
                        <li data-ma5order="ma5-li-7"><a href="{{route('site.terms.and.conditions')}}">Terms & Conditions</a></li>

                    </ul>

                </nav>
            </div>

        </div>

    </nav>

</div>