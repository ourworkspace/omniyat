@extends('website.layouts.portfolio_inner_layout')
@section('title','Portfolio Details')
@section('pageContent')

    <div class="inner-page mt-0 portfolio_detail_innnerpage desktop_view">
        
        @include('website.layouts.portfolio_inner_bottom_tabs')

        <div class="tab-content portfolio_detail">
            @if(isset($about))
                <div id="about" class="tab-pane fade in active">
                    <section class="about w-100 bg_img about_sec anwa_about tr_about_sec">
                        @if(isset($about->background_image) && file_exists($about->background_image))
                            <img src="{{asset($about->background_image)}}" class="anwa_about tr_about">
                        @endif

                        @if(isset($about->logo) && file_exists($about->logo))
                            <div class="logo text-center mb-15 mt-45" style="position: absolute;left: 50%;top: 72px;width: 100%;transform: translate(-50%, 0px);"><img src="{{asset($about->logo)}}" alt="logo" style="margin-top: 0;width: 7vw;"></div>
                        @endif

                        <div class="header-container container-vertical-middle">

                            <div class="row">

                                <div class="col-md-8 pull-right px-45 ">
                                    @if(isset($about->logo) && file_exists($about->logo))
                                        <!-- <div class="logo text-left mb-30"><img src="{{asset($about->logo)}}" alt="logo"></div> -->
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
                        @if(isset($location->icon_image) && file_exists($location->icon_image))
                            <a href="" class="location_map_pointer"><img src="{{asset($location->icon_image)}}"></a>
                        @else
                            <a href="" class="location_map_pointer"><img src="{{asset('public/site/img/icons/mappin.png')}}"></a>
                        @endif
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
                                                    <div id="{{str_replace(' ','_',$pdvalue->option_title)}}" class="tab-pane fade in {{($key == 0) ? 'active' : ''}} {{str_replace(' ','_',$pdvalue->option_title)}}">
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

                        @if(count($portfolio_details) > 0)
                            <div class="design_slider">
                                <div id="myCarousel" class="carousel carousel-fade" data-ride="carousel" data-interval="false">
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        @foreach($portfolio_details as $key => $dgValue)
                                            <div class="item {{($key==0) ? 'active' : ''}} {{str_replace(' ','_',$pdvalue->option_title)}}">
                                                <img src="{{asset($dgValue->background_image)}}" alt="{{$dgValue->title}}" style="width:100%;">
                                            </div>
                                        @endforeach    
                                    </div>
                                    <!-- Left and right controls -->
                                    <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                        <span class="glyphicon fa fa-angle-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>

                                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                        <span class="glyphicon fa fa-angle-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a> -->
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
                                    <div id="FeedbackEnquerymessage"></div>
                                    <form method="POST" id="contactFormSubmit" action="javascript:0;">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
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

    <script>
        sentContactMails('contactFormSubmit', 'contactBtnReport', 'FeedbackEnquerymessage');
        sentContactMails('contactFormSubmitMobile', 'contactBtnReportMobile', 'FeedbackEnqueryMobilemessage');
    </script>
@endsection