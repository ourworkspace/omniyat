@extends('website.layouts.portfolio_inner_layout')
@section('title','Portfolio Details')
@section('pageContent')

    <div class="inner-page mt-0 desktop_view">
        
        @include('website.layouts.portfolio_inner_bottom_tabs')

        <div class="tab-content portfolio_detail">
            @if(isset($about))
                <div id="about" class="tab-pane fade in active">
                    <section class="about w-100 bg_img about_sec anwa_about">
                        @if(isset($about->background_image) && file_exists($about->background_image))
                            <img src="{{asset($about->background_image)}}" class="anwa_about">
                        @endif

                        <div class="header-container container-vertical-middle">

                            <div class="row">

                                <div class="col-md-8 pull-right px-45 ">
                                    @if(isset($about->logo) && file_exists($about->logo))
                                        <div class="logo text-left mb-30"><img src="{{asset($about->logo)}}" alt="logo"></div>
                                    @endif
                                    
                                    @if(isset($about->title) && !empty($about->title))
                                        <h2 class="text-black text-uppercase tss-mb fs-16 mb-15 ls-1 tss-lh-1-4 pt-45">{{$about->title}}</h2>
                                    @endif

                                    @if(isset($about->description_1) && !empty($about->description_1))
                                        <!-- <p class="text-black tss-mr fs-11 tss-lh-1-4 text-justify">ANWA by Omniyat is the first freehold residential property located near the historic Bur Dubai area. It’s a luxury waterfront development and will act as the prime residential area for people working in the areas of DMC, Jebel Ali, Mina Rashid and Bur Dubai.</p> -->
                                        <?php echo $about->description_1; ?>
                                    @endif


                                    @if(isset($about->description_2) && !empty($about->description_2))
                                        <div class="btm-details mt-30">
                                            <!-- <p class="text-black tss-mr fs-8 tss-lh-1-4 text-left mb-0">RERA PROJECT REGISTRATION</p>
                                            <p class="text-black tss-mr fs-8 tss-lh-1-4 text-left mb-0">ANWA - 1636</p> -->
                                            <?php echo $about->description_2; ?>
                                        </div>
                                    @endif


                                </div>

                            </div>

                        </div>

                    </section>
                </div>
            @endif

            @if(isset($location))
                <div id="location" class="tab-pane fade">

                    <section class="w-100 bg_img location_sec anwa_location_sec">
                        @if(isset($location->background_image) && file_exists($location->background_image))
                            <img src="{{asset($location->background_image)}}" class="anwa_location">
                        @endif

                        <div class="header-container container-vertical-right-bottom">
                            <div class="row">
                                <div class="col-md-6 float-right pr-45">
                                    @if(isset($location->title))
                                        <h2 class="text-black text-uppercase tss-mb fs-20 mb-30 ls-1 tss-lh-1-3">{{$location->title}}</h2>
                                    @endif

                                    @if(isset($location->description_1))    
                                        <?php echo $location->description_1; ?>
                                    @endif  
                                    <!-- <p class="text-black tss-mr fs-11 tss-lh-1-7 text-justify">Located in the Dubai Maritime City and at the threshold between Old and New Dubai, ANWA is a first-class commercial and residential district minutes away from the city. The light and spacious units soaked with the sun and the sea reflect the glimmering views of the Arabian ocean below.</p>

                                    <p class="text-black tss-mr fs-11 tss-lh-1-7 text-justify">It's strategically locatied adjacent to Mina Rashid, the the largest ports in the region, and is set to be a coastal destination catering to the needs of super yacht owners and operators, watersport and sailing enthusiasts, beach lovers, and tourists from all over the world.</p> -->

                                    <!-- <p class="text-black tss-mr fs-11 tss-lh-1-7 text-justify">This residential district creates a serene zone for owners who want to be able to disconnect and from the hustle and bustle of everyday life, while still have the conveniences at their doorstep.</p> -->
                                    @if(isset($location->description_2))    
                                        <?php echo $location->description_2; ?>
                                    @endif  
                                </div>

                            </div>

                        </div>

                        <a href="" class="location_map_pointer"><img src="{{asset('public/site/img/icons/mappin.png')}}"></a>

                    </section>

                </div>
            @endif

            @if(isset($design) && count($design) > 0)
                <?php
                    $design_type = $design[0]->option_type;
                    $project_id = $design[0]->portfolio_id;
                    $design_gallery = DB::table('portfolios_details_gallery')->where(['tab_id'=>$project_id,'type'=>'design_gallery_images'])->get();
                ?>
                <div id="design" class="tab-pane fade">

                    <section class="w-100 design_sec">

                        @if(isset($design) && $design_type == 'withTabs')
                            <?php $portfolio_details = $design;  ?>

                            <div class="header-container container-vertical-middle">
                                <div class="row">
                                    <div class="col-md-7">
                                        @if(count($portfolio_details) > 0)
                                            <div class="custom-tabs">
                                                <ul class="nav nav-pills">
                                                    @foreach($portfolio_details as $key => $pdvalues)
                                                        <li class="{{($key == 0) ? 'active':''}}"><a data-toggle="pill" data-target="#{{str_replace(' ','_',$pdvalues->option_title)}}">{{$pdvalues->option_title}}</a></li>
                                                    @endforeach
                                                </ul>

                                                <div class="tab-content">
                                                    @foreach($portfolio_details as $key => $pdvalue)
                                                    <div id="{{str_replace(' ','_',$pdvalue->option_title)}}" class="tab-pane fade in {{($key == 0) ? 'active' : ''}}">
                                                        @if(isset($pdvalue->title) && !empty($pdvalue->title))
                                                            <h2 class="text-black text-uppercase tss-mb fs-20 mt-0">{{$pdvalue->title}}</h2>
                                                        @endif

                                                        @if(isset($pdvalue->description_1) && !empty($pdvalue->description_1))
                                                            <?php echo $pdvalue->description_1; ?>
                                                        @endif
                                                        
                                                        <!-- <p class="text-black tss-mr fs-11 tss-lh-1-7 text-justify">One Palm represents Omniyat’s relentless attention to detail. Built in a way that ensures seclusion while still taking in 360* views of the Gulf and the Arabian Sea, One Palm residences are crafted with a trio of cores to maximize privacy and exclusivity for every owner. Each apartment shares its lobby with only one neighbour, and the apartments on higher floors give owners an exclusive, personal lobby and corridor for their apartment. One Palm is due to be completed in Q4 2020.</p> -->
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                            <?php $portfolio_details = $design[0];  ?>
                            <div class="header-container container-vertical-middle">
                                <div class="row">
                                    <div class="col-md-7 pr-45 pl-30">
                                        @if(isset($portfolio_details->title) && !empty($portfolio_details->title))
                                            <h2 class="text-black text-uppercase tss-mb fs-20 mb-30 ls-1 tss-lh-1-3">{{$portfolio_details->title}}</h2>
                                        @endif

                                        @if(isset($portfolio_details->description_1) && !empty($portfolio_details->description_1))
                                            <?php echo $portfolio_details->description_1; ?>
                                        @endif
                                        <!-- <p class="text-black tss-mb fs-13 tss-lh-1-7 text-justify text-uppercase">Towering above Dubai Maritime City</p>
                                        <p class="text-black tss-mb fs-13 tss-lh-1-7 text-justify text-uppercase">PROUD TO BE THE TALLEST</p>
                                        <p class="text-black tss-mr fs-11 tss-lh-1-7 text-justify">Anwa is the tallest tower in the Dubai Maritime City, masterfully designed and positioned to capture the breathtaking views of the sea and light up Dubai apartments with the glorious Dubai sun.</p> -->
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(count($design_gallery) > 0)
                            <div class="design_slider">
                                <div id="myCarousel" class="carousel carousel-fade" data-ride="carousel" data-interval="5000">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        @foreach($design_gallery as $key => $dgValue)
                                            <div class="item {{($key==0) ? 'active' : ''}}">
                                                <img src="{{asset($dgValue->image)}}" alt="{{$dgValue->title}}" style="width:100%;">
                                            </div>
                                        @endforeach    
                                    </div>
                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                        <span class="glyphicon fa fa-angle-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>

                                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                        <span class="glyphicon fa fa-angle-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </section>

                </div>
            @endif

            @if(isset($amenities_facilities))
                <div id="amenities" class="tab-pane fade">
                    <?php 
                        $amenities_facilities_id = $amenities_facilities->portfolio_id;
                        $amenities_facilities_gallery = DB::table('portfolios_details_gallery')->where(['tab_id'=>$project_id,'type'=>'amenities_facilities_gallery_images'])->get();
                    ?>
                    <section class="w-100 amenities_sec">

                        <div class="header-container container-vertical-middle">
                            <div class="row">
                                <div class="col-md-7 pull-right pl-0 pr-45">
                                    @if(isset($amenities_facilities->title))
                                        <h2 class="text-black text-uppercase tss-mb fs-20 mb-30">{{$amenities_facilities->title}}</h2>
                                    @endif

                                    @if(isset($amenities_facilities->description_1))
                                        <?php echo $amenities_facilities->description_1; ?>
                                    @endif
                                    <!-- <p class="text-black tss-mr fs-11 tss-lh-1-5 text-justify">ANWA has been designed for sophisticated individuals with a relaxing take on life. The top-of-the-range amenities call for a leisurely time, and high quality finishes guarantee an easy-going lifestyle.</p> -->

                                    <?php 
                                        $amenities = explode(',',$amenities_facilities->amenities);
                                    ?>
                                    @if(count($amenities) > 0)
                                        <ul class="pulse_list more_gap pt-20" style="margin-left: -30px;">
                                            @foreach($amenities as $key => $avalue)
                                                <li class="text-black tss-mr fs-11 tss-lh-1-4">{{ucfirst($avalue)}}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        @if(count($amenities_facilities_gallery) && isset($amenities_facilities_gallery))
                            <div class="grid_images">
                                @foreach($amenities_facilities_gallery as $afgvalue)
                                    <div class="image w-100 h-55 pb-3"><img src="{{asset($afgvalue->image)}}" alt="{{$afgvalue->title}}" class="w-100 h-100"></div>
                                @endforeach
                                <!-- <div class="image w-100 h-55 pb-3"><img src="img/portfolio/anwa/amenities-01.png" alt="amenities" class="w-100 h-100"></div>
                                <div class="image w-100 h-45 pt-3"><img src="img/portfolio/anwa/amenities-02.png" alt="amenities" class="w-100 h-100"></div> -->
                            </div>
                        @endif

                    </section>

                </div>
            @endif
            
            @if(isset($lifeStyle))
                <div id="lifestyle" class="tab-pane fade">
                    <?php 
                        $lifestyle_id = $lifeStyle->portfolio_id;
                        $lifeStyle_gallery = DB::table('portfolios_details_gallery')->where(['tab_id'=>$lifeStyle->portfolio_id,'type'=>'lifeStyle_slider_images'])->get();
                    ?>
                    <section class="w-100 lifestyle_sec">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 col-centered">
                                    <div class="desc text-center px-15 inner-page">
                                        @if(isset($lifeStyle->title))
                                            <h2 class="text-black text-uppercase tss-mb fs-20 mb-20">{{$lifeStyle->title}}</h2>
                                        @endif

                                        <!-- //TODO:: Place logo -->

                                        @if(isset($lifeStyle->description_1))
                                            <!-- <?php //print_r($lifeStyle->description_1); ?> -->
                                        @endif
                                        <!-- <p class="text-black tss-mr fs-11 tss-lh-1-4">ANWA’s unique position and design guarantees complete tranquility and unobstructed views of the sea from every residence. A prestigious location, with absolute freedom to disconnect or connect, whenever you want. Directly on the shores of the Arabian Gulf, with nothing between you and the sea, yet superbly connected and less than 20 minutes away from everything Dubai has to offer.</p>

                                        <p class="text-black tss-mr fs-11 tss-lh-1-4">Below, a beautifully designed and landscaped waterfront promenade wraps around the Dubai Maritime City all the way to Mina Rashid and the new and upcoming marina.</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(isset($lifeStyle_gallery) && count($lifeStyle_gallery) > 0)
                            <div class="hcarousel right">
                                <div class="wrap">
                                    <ul>
                                        @foreach($lifeStyle_gallery as $key => $lsgvalue)
                                            <li><img src="{{asset($lsgvalue->image)}}" alt="{{$lsgvalue->title}}"></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </section>
                </div>
            @endif

            @if(isset($gallery))

                <?php 
                    $gallery_id = $gallery->portfolio_id;
                    $gallery_images = DB::table('portfolios_details_gallery')->where(['tab_id'=>$gallery->portfolio_id,'type'=>'gallery_slider_images'])->get();
                ?>
                <div id="gallery" class="tab-pane fade">

                    <section class="w-100 lifestyle_sec">

                        <div class="container">

                            <div class="row">

                                <div class="col-md-7 col-centered">

                                    <div class="desc text-center px-45 inner-page">

                                        @if(isset($gallery->title))
                                            <h2 class="text-black text-uppercase tss-mb fs-20 mb-10">{{$gallery->title}}</h2>
                                        @endif

                                        @if(isset($gallery->description_1))
                                            <?php echo $gallery->description_1; ?>
                                        @endif
                                        <!-- <p class="text-black tss-mr fs-11 tss-lh-1-4">An Omniyat development that is well known for it's architecture. It's designed to maximize the sea views for every apartment. The building is designed with three cores to maximize privacy and exclusivity for every owner.</p> -->

                                    </div>

                                </div>

                            </div>

                        </div>

                        @if(count($gallery_images) > 0)
                            <div class="gallery">
                                <section class="section">
                                    @foreach($gallery_images as $key => $giValue)
                                        <img src="{{asset($giValue->image)}}" alt="{{$giValue->title}}">
                                    @endforeach
                                </section>

                                <div class="lightbox">
                                    <div class="title"></div>
                                    <div class="filter"></div>
                                    <div class="arrowr"></div>
                                    <div class="arrowl"></div>
                                    <div class="close"></div>
                                </div>
                            </div>
                        @endif
                    </section>

                </div>
            @endif

            @if(isset($enquire))
                <div id="enquire" class="tab-pane fade">
                    <section class="w-100 bg_img enquire_sec anwa_enquire_sec">
                        @if(isset($enquire->background_image))
                            <img src="{{asset($enquire->background_image)}}" class="anwa_enquire">
                        @endif
                        <div class="header-container container-vertical-{{ $enquire->text_alignment ?? 'top-right' }}">

                            <div class="row">

                                <div class="col-md-4 text-center float-left pl-30">

                                    <h3 class="text-black text-uppercase tss-mb fs-20 m-0 my-15 ">Register your interest</h3>

                                    <form method="POST" id="contactFormSubmit" action="javascript:0;">

                                        <div class="row">

                                            <div class="col-md-6 px-3">

                                                <div class="form-group my-5">

                                                    <input type="text" class="form-control" id="f_name" placeholder="FIRST NAME" required name="first_name">

                                                </div>

                                            </div>

                                            <div class="col-md-6 px-3">

                                                <div class="form-group my-5">

                                                    <input type="text" class="form-control" id="l_name" placeholder="LAST NAME" required name="last_name">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-12 px-3">

                                                <div class="form-group my-5">

                                                    <input type="email" class="form-control" id="email" placeholder="EMAIL" required name="email">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-12 px-3">

                                                <div class="form-group my-5">

                                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="PHONE" required>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-12 px-3">

                                                <div class="form-group my-5">

                                                    <textarea class="form-control" rows="5" id="message" placeholder="MESSAGE" required name="message"></textarea>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-12 px-3">

                                                <button type="submit" id="contactBtnReport" class="btn btn-link btn-red btn-block text-uppercase tss-msb py-10 px-45 my-5 fs-14">enquire more</button>

                                            </div>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </section>
                </div>
            @endif

        </div>

    </div>

    <div class="inner-page mobile_view portfolio_detail_m_view" >

        <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">

            <div class="panel panel-default">

                <div class="panel-heading" role="tab" id="h1">

                    <h4 class="panel-title">

                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#c1" aria-expanded="true" aria-controls="c" class="text-uppercase">

                        About anwa

                        </a>

                    </h4>

                </div>

                <div id="c1" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="h1">

                    <div class="panel-body">

                        <div class="image ratio-lg-height about_main_img">

                            <img src="img/portfolio/residential/02.png" alt="about-omniyat">

                            <div class="logo"><img src="img/portfolio/anwa/about_logo.png"></div>

                            <!--<div class="vr"><a href=""><img src="img/icons/vr_lg.png"></a></div>-->

                        </div>

                        <div class="w-100 text-center text-white py-20 bg_red fs-14 text-uppercase">about anwa</div>

                        <div class="panel-desc p-20 w-100">

                            <h5 class="fs-22 tss-mb text-black mt-0 mb-10 text-uppercase tss-lh-1-3">THE CROWN JEWEL OF THE PAST, PRESENT AND FUTURE</h5>

                            <p class="text-black tss-mr fs-14 tss-lh-1-7">ANWA by Omniyat is the first freehold residential property located near the historic Bur Dubai area. It’s a luxury waterfront development and will act as the prime residential area for people working in the areas of DMC, Jebel Ali, Mina Rashid and Bur Dubai.</p>

                            

                            <details>

                                <summary>

                                    <span id="open" class="tss-msb fs-14 text-black text-uppercase">Read more</span> 

                                    <span id="close" class="tss-msb fs-14 text-black text-uppercase ">Read Less</span> 

                                </summary>

                                <p class="text-black tss-mr fs-14 tss-lh-1-7">The stunning 44-floor tower and 225 spacious units is on a unique location, making it the perfect home. It's a place where you can truly relax and enjoy life to a spectacular soundtrack of waves, with an ever-inspiring interplay of sea and sun in absolute tranquility - yet just a step away from exciting and amazing dining, entertainment and cultural possibilities.</p>

                                <div class="btm-details mt-30">

                                    <p class="text-black tss-mr fs-8 tss-lh-1-4 text-left mb-0">RERA PROJECT REGISTRATION</p>

                                    <p class="text-black tss-mr fs-8 tss-lh-1-4 text-left mb-0">ANWA - 1636</p>

                                </div>

                            </details>

                            

                        </div>

                    </div>

                </div>

            </div>

            

            <div class="panel panel-default">

                <div class="panel-heading" role="tab" id="h2">

                    <h4 class="panel-title">

                        <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#c2" aria-expanded="false" aria-controls="c2">

                        location

                        </a>

                    </h4>

                </div>

                <div id="c2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="h2">

                    <div class="panel-body">

                        <div class="image w-100">

                            <img src="img/portfolio/anwa/location_bg.png" alt="location-omniyat" class="w-100">

                        </div>

                        <div class="w-100 text-center text-white py-20 bg_red fs-14 text-uppercase ">Location</div>

                        <div class="panel-desc p-20 w-100">

                            <h5 class="fs-22 tss-mb text-black mt-0 mb-10 text-uppercase tss-lh-1-3">NOTHING BETWEEN YOU AND THE SEA</h5>

                            <p class="text-black tss-mr fs-14 tss-lh-1-7">Located in the Dubai Maritime City and at the threshold between Old and New Dubai, ANWA is a first-class commercial and residential district minutes away from the city. The light and spacious units soaked with the sun and the sea reflect the glimmering views of the Arabian ocean below.</p>

                            <p class="text-black tss-mr fs-14 tss-lh-1-7">It's strategically locatied adjacent to Mina Rashid, the the largest ports in the region, and is set to be a coastal destination catering to the needs of super yacht owners and operators, watersport and sailing enthusiasts, beach lovers, and tourists from all over the world.</p>

                            <p class="text-black tss-mr fs-14 tss-lh-1-7">This residential district creates a serene zone for owners who want to be able to disconnect and from the hustle and bustle of everyday life, while still have the conveniences at their doorstep.</p>

                        </div>

                    </div>

                </div>

            </div>



            <div class="panel panel-default">

                <div class="panel-heading" role="tab" id="h3">

                    <h4 class="panel-title">

                        <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#c3" aria-expanded="false" aria-controls="c3">

                        design

                        </a>

                    </h4>

                </div>

                <div id="c3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="h3">

                    <div class="panel-body">

                        <section class="lifestyle slider panel_slider">

                            <div class="image">

                                <img src="img/portfolio/anwa/design.png">

                            </div>

                            <div class="image">

                                <img src="img/portfolio/anwa/design.png">

                            </div>

                        </section>

                        <!--

                            <div class="image ratio-lg-height">

                                <img src="img/portfolio/details/one-palm-exterior-sunset.png" alt="about-omniyat">

                            </div>

                        -->

                        <div class="w-100 text-center text-white py-20 bg_red fs-14 text-uppercase ">Design</div>

                        <div class="panel-desc p-20 w-100">

                            <h5 class="fs-22 tss-mb text-black mt-0 mb-15 text-uppercase tss-lh-1-3">PARADISE EMBODIED</h5>

                            <h6 class="fs-16 tss-mb text-black mt-0 mb-10 text-uppercase tss-lh-1-3">Towering above Dubai Maritime City <br> PROUD TO BE THE TALLEST.</h6>

                            <p class="text-black tss-mr fs-14 tss-lh-1-7">Anwa is the tallest tower in the Dubai Maritime City, masterfully designed and positioned to capture the breathtaking views of the sea and light up Dubai apartments with the glorious Dubai sun.</p>

                        </div>

                    </div>

                </div>

            </div>

            

            <div class="panel panel-default">

                <div class="panel-heading" role="tab" id="h4">

                    <h4 class="panel-title">

                        <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#c4" aria-expanded="false" aria-controls="c4">

                        amenities & facilities

                        </a>

                    </h4>

                </div>

                <div id="c4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="h4">

                    <div class="panel-body">

                        <section class="lifestyle slider panel_slider">

                            <div class="image">

                                <img src="img/portfolio/anwa/amenities-01.png">

                            </div>

                            <div class="image">

                                <img src="img/portfolio/anwa/amenities-02.png">

                            </div>

                        </section>

                        <!--

                            <div class="image ratio-lg-height">

                                <img src="img/portfolio/details/amenities-02.png" alt="about-omniyat">

                            </div>

                        -->

                        <div class="w-100 text-center text-white py-20 bg_red fs-14 text-uppercase ">amenities & facilities</div>

                        <div class="panel-desc p-20 w-100">

                            <h5 class="fs-22 tss-mb text-black mt-0 mb-10 text-uppercase tss-lh-1-3">FACILITIES FOR AN EASY-GOING LIFESTYLE</h5>

                            <p class="text-black tss-mr fs-14 tss-lh-1-7">ANWA has been designed for sophisticated individuals with a relaxing take on life. The top-of-the-range amenities call for a leisurely time, and high quality finishes guarantee an easy-going lifestyle.</p>

                            

                            <div class="panel-group accordion sub_accordian mt-30" id="accordion3" role="tablist" aria-multiselectable="true">

                                <div class="panel panel-default">

                                    <div class="panel-heading" role="tab" id="amenitiesh2">

                                        <h4 class="panel-title">

                                            <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion3" href="#amenitiesc2" aria-expanded="false" aria-controls="amenitiesc2">amenities</a>

                                        </h4>

                                    </div>

                                    <div id="amenitiesc2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="amenitiesh2">

                                        <div class="panel-body">

                                        <ul class="pulse_list">

                                            <li class="text-black tss-mr fs-14 tss-lh-1-4">Durable quality finishes such as stone and porcelain</li>

                                            <li class="text-black tss-mr fs-14 tss-lh-1-4">European kitchen and appliances in all apartments</li>

                                            <li class="text-black tss-mr fs-14 tss-lh-1-4">Swimming pool</li>

                                            <li class="text-black tss-mr fs-14 tss-lh-1-4">Gymnasium</li>

                                            <li class="text-black tss-mr fs-14 tss-lh-1-4">Squash court</li>

                                            <li class="text-black tss-mr fs-14 tss-lh-1-4">Landscaped gardens</li>

                                            <li class="text-black tss-mr fs-14 tss-lh-1-4">24-hour security</li>

                                            <li class="text-black tss-mr fs-14 tss-lh-1-4">Secure podium parking</li>

                                        </ul>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            

                        </div>

                    </div>

                </div>

            </div>



            <div class="panel panel-default">

                <div class="panel-heading" role="tab" id="h5">

                    <h4 class="panel-title">

                        <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#c5" aria-expanded="false" aria-controls="c5">

                        lifestyle

                        </a>

                    </h4>

                </div>

                <div id="c5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="h5">

                    <div class="panel-body">

                        <section class="lifestyle slider panel_slider">

                            <div class="image">

                                <img src="img/portfolio/anwa/ls-01.png">

                            </div>

                            <div class="image">

                                <img src="img/portfolio/anwa/ls-02.png">

                            </div>

                            <div class="image">

                                <img src="img/portfolio/anwa/ls-03.png">

                            </div>

                            <div class="image">

                                <img src="img/portfolio/anwa/ls-04.png">

                            </div>

                        </section> 

                        <div class="w-100 text-center text-white py-20 bg_red fs-14 text-uppercase ">lifestyle</div>

                        <div class="panel-desc p-20 w-100">

                            <div class="text-left">

                                <h5 class="fs-22 tss-mb text-black mt-15 mb-10 text-uppercase tss-lh-1-3">A TRANQUIL HAVEN</h5>

                            </div>

                            <p class="text-black tss-mr fs-14 tss-lh-1-7">ANWA’s unique position and design guarantees complete tranquility and unobstructed views of the sea from every residence. A prestigious location, with absolute freedom to disconnect or connect, whenever you want. Directly on the shores of the Arabian Gulf, with nothing between you and the sea, yet superbly connected and less than 20 minutes away from everything Dubai has to offer.</p>

                            

                            <details>

                                <summary>

                                    <span id="open" class="tss-msb fs-14 text-black text-uppercase">Read more</span> 

                                    <span id="close" class="tss-msb fs-14 text-black text-uppercase ">Read Less</span> 

                                </summary>

                                    <p class="text-black tss-mr fs-14 tss-lh-1-7">Below, a beautifully designed and landscaped waterfront promenade wraps around the Dubai Maritime City all the way to Mina Rashid and the new and upcoming marina.</p>

                            </details>

                        </div>

                    </div>

                </div>

            </div>

            

            <div class="panel panel-default">

                <div class="panel-heading" role="tab" id="h6">

                    <h4 class="panel-title">

                        <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#c6" aria-expanded="false" aria-controls="c6">

                        gallery

                        </a>

                    </h4>

                </div>

                <div id="c6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="h6">

                    <div class="panel-body">

                        <div class="w-100 text-center text-white py-20 bg_red fs-14 text-uppercase ">gallery</div>

                        <div class="panel-desc p-20 w-100">

                            <p class="text-black tss-mr fs-14 tss-lh-1-7">An Omniyat development that is well known for it's architecture. It's designed to maximize the sea views for every apartment. The building is designed with three cores to maximize privacy and exclusivity for every owner.</p>

                        </div>

                        <div class="demo-gallery w-100">

                            <ul class="flexbin flexbin-margin demo-gallery" id="lightgallery">

                                

                                <li data-src="img/portfolio/anwa/gallery-02.png" class="w-60 content">

                                    <a href="">

                                        <img class="img-responsive" src="img/portfolio/anwa/gallery-02.png">

                                    </a>

                                </li>

                                <li  data-src="img/portfolio/anwa/gallery-03.png" class="w-40 content">

                                    <a href="">

                                        <img class="img-responsive" src="img/portfolio/anwa/gallery-03.png">

                                    </a>

                                </li>

                                <li  data-src="img/portfolio/anwa/gallery-01.png" class="content">

                                    <a href="">

                                        <img class="img-responsive" src="img/portfolio/anwa/gallery-01.png">

                                    </a>

                                </li>

                                

                                

                                <li data-src="img/portfolio/anwa/gallery-04.png" class="content">

                                    <a href="">

                                        <img class="img-responsive" src="img/portfolio/anwa/gallery-04.png">

                                    </a>

                                </li>

                                <li  data-src="img/portfolio/anwa/gallery-05.png" class="content">

                                    <a href="">

                                        <img class="img-responsive" src="img/portfolio/anwa/gallery-05.png">

                                    </a>

                                </li>

                                <li  data-src="img/portfolio/anwa/gallery-06.png" class="content">

                                    <a href="">

                                        <img class="img-responsive" src="img/portfolio/anwa/gallery-06.png">

                                    </a>

                                </li>

                                <li  data-src="img/portfolio/anwa/gallery-07.png" class="content">

                                    <a href="">

                                        <img class="img-responsive" src="img/portfolio/anwa/gallery-07.png">

                                    </a>

                                </li>

                            </ul>

                            <p class="text-center  p-20 w-100"><a href="" class="fs-14 tss-mb text-black p-20" id="loadMore">LOAD MORE</a></p>

                        </div>

                        

                        

                    </div>

                </div>

            </div>

            

            <div class="panel panel-default">

                <div class="panel-heading" role="tab" id="h7">

                    <h4 class="panel-title">

                        <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#c7" aria-expanded="false" aria-controls="c7">

                        enquire

                        </a>

                    </h4>

                </div>

                <div id="c7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="h7">

                    <div class="panel-body">

                        <div class="image w-100">

                            <img src="img/portfolio/anwa/enquire.jpg" alt="enquire-omniyat" class="w-100">

                        </div> 

                        <div class="w-100 text-center text-white py-20 bg_red fs-14">ENQUIRE</div>

                        <div class="panel-desc p-20 w-100">

                            <div class="red_outline_box p-20">

                                <h5 class="fs-14 tss-mb text-black mt-0 mb-10 text-uppercase tss-lh-1-3">Register your interest</h5>

                                <form method="POST" id="contactFormSubmitMobile" action="javascript:0;">

                                    <div class="row">

                                        <div class="col-xs-6 col-sm-6 pr-5">

                                            <div class="form-group my-5">

                                                <input type="text" class="form-control" id="f_name" placeholder="FIRST NAME" required="" name="first_name">

                                            </div>

                                        </div>

                                        <div class="col-xs-6 col-sm-6 pl-5">

                                            <div class="form-group my-5">

                                                <input type="text" class="form-control" id="l_name" placeholder="LAST NAME" required="" name="last_name">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-sm-12 ">

                                            <div class="form-group my-5">

                                                <input type="text" class="form-control" id="phone" placeholder="Phone Number" required="" name="phone">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-sm-12">

                                            <div class="form-group my-5">

                                                <input type="email" class="form-control" id="email" placeholder="EMAIL" required="" name="email">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-sm-12 ">

                                            <div class="form-group my-5">

                                                <textarea class="form-control" rows="4" id="message" placeholder="MESSAGE" required="" name="message"></textarea>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-sm-12 pull-right">

                                            <button type="submit" name="contactBtnReportMobile" class="btn btn-link btn-red text-uppercase tss-msb py-10 px-45 my-5 fs-11 mt-30">SUBMIT</button>

                                        </div>

                                    </div>

                                </form>

                                

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div> 

@endsection