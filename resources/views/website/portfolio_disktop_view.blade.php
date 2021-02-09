<style>
.enquire_sec .form-group .form-control{
    color:#000 !important;
}
.portfolio_detail_innnerpage.desktop_view{
    overflow-x: unset !important;
}
</style>
<div class="inner-page mt-0 portfolio_detail_innnerpage desktop_view">
    @include('website.layouts.portfolio_inner_bottom_tabs')

    <div class="tab-content portfolio_detail">

        @if(isset($about))
            <div id="about" class="tab-pane fade in active">
                <!--<section class="about w-100 bg_img about_sec" style="background-image: url(img/portfolio/details/about_bg.png)">-->
                <section class="about w-100 bg_img about_sec tr_about_sec">
                    
                    @if(isset($about->background_image) && file_exists($about->background_image))
                        <img src="{{asset($about->background_image)}}" class="tr_about">
                    @endif

                    
                    
                    <div class="header-container {{$about->text_alignment??'container-vertical-middle'}}">
                        <!--<div class="logo text-center mb-15 mt-45"><img src="img/portfolio/details/opg_gold.png" alt="logo" style="margin-top: -5em;"></div> style="position: absolute;left: 50%;top: 72px;width: 100%;transform: translate(-50%, 0px);"-->
                        @if(isset($about->logo) && file_exists($about->logo))
                            <div class="logo text-center mb-15 mt-45 tr_about_logo_div">
                                <img src="{{asset($about->logo)}}" alt="logo" class="tr_about_logo" style="margin-top: 0;width: 7vw;">
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6 {{$about->grid_position??'pull-left'}} pt-30 pl-0">
                                @if(isset($about->title) && !empty($about->title))
                                    <h2 class="text-black text-uppercase tss-mb fs-16 mb-15 ls-1 tr_about_title">{{$about->title}}</h2>
                                @endif
                                
                                @if(isset($about->description_1) && !empty($about->description_1))
                                    <!-- <p class="text-black tss-mr fs-11 tss-lh-1-4 text-justify">ANWA by Omniyat is the first freehold residential property located near the historic Bur Dubai area. It’s a luxury waterfront development and will act as the prime residential area for people working in the areas of DMC, Jebel Ali, Mina Rashid and Bur Dubai.</p> -->
                                    <div class="tr_about_description_one">
                                        <?php echo $about->description_1; ?>
                                    </div>
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
                <section class="w-100 bg_img location_sec anwa_location_sec tr_location_sec">
                    @if(isset($location->background_image) && file_exists($location->background_image))
                        <img src="{{asset($location->background_image)}}" class="anwa_location tr_location">
                    @endif
                    <div class="header-container {{$location->text_alignment??'container-vertical-left-bottom'}}">
                        <div class="row">
                            <div class="col-md-6 {{$about->grid_position??'pull-left'}}">
                                @if(isset($location->title))
                                    <h2 class="text-white text-uppercase tss-mb fs-20 mb-15 mt-0 ls-1 tss-lh-1-3 pr-30 tr_location_title">{{$location->title}}</h2>
                                @endif

                                @if(isset($location->description_1))   
                                    <div class="tr_location_description_one"> 
                                        <?php echo $location->description_1; ?>
                                    </div>
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

        @if(isset($design))
            <div id="design" class="tab-pane fade">
                <section class="w-100 design_sec">
                    <!-- designWithTabs -->
                    @if(isset($designWithTabs) && count($designWithTabs) > 0)
                        <div class="header-container container-vertical-middle tr_tab_content_design">
                            <div class="row">
                                
                                <div class="col-md-7">
                                    <div class="custom-tabs">
                                        <ul class="nav nav-pills">
                                            @foreach($designWithTabs as $key => $pdvalues)
                                                <li class="{{($key == 0) ? 'active':''}}"><a data-toggle="pill" data-target=".{{str_replace(' ','_',$pdvalues->option_title)}}">{{$pdvalues->option_title}}</a></li>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content">
                                            @foreach($designWithTabs as $key => $pdvalue)
                                            <div id="{{str_replace(' ','_',$pdvalue->option_title)}}" class="tab-pane fade  {{($key == 0) ? 'in active' : ''}} {{str_replace(' ','_',$pdvalue->option_title)}}">
                                                @if(isset($pdvalue->title) && !empty($pdvalue->title))
                                                    <h2 class="text-black text-uppercase tss-mb fs-20 mt-0">{{$pdvalue->title}}</h2>
                                                @endif

                                                @if(isset($pdvalue->description_1) && !empty($pdvalue->description_1))
                                                    <?php echo $pdvalue->description_1; ?>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="design_slider">
                            <div id="myCarousel" class="carousel carousel-fade" data-ride="carousel" data-interval="false">
                            <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    @foreach($designWithTabs as $key => $pdvalue)
                                        <div class="item {{($key == 0) ? 'active':''}} {{str_replace(' ','_',$pdvalue->option_title)}}">
                                            <img src="{{asset($pdvalue->background_image)}}" alt="{{str_replace(' ','_',$pdvalue->option_title)}} slide" style="width:100%;">
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Left and right controls -->
                                    <!--
                                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                            <span class="glyphicon fa fa-angle-left"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                            <span class="glyphicon fa fa-angle-right"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    -->
                            </div>
                        </div>
                    @endif
                    <!-- designWithOutTabs -->
                    @if(isset($designWithOutTabs))
                        <div class="header-container container-vertical-middle tr_single_content_design">
                            <div class="row">
                                <div class="col-md-7 pr-45 pl-30">
                                    <h2 class="text-black text-uppercase tss-mb fs-20 mb-15 ls-1 tss-lh-1-3">{{$designWithOutTabs->title}}</h2>
                                    @if(isset($designWithOutTabs->description_1) && !empty($designWithOutTabs->description_1))
                                        <?php echo $designWithOutTabs->description_1; ?>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="design_slider">
                            <div id="myCarousel" class="carousel carousel-fade" data-ride="carousel" data-interval="8000">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="{{asset($designWithOutTabs->background_image)}}" alt="{{$designWithOutTabs->title}}" style="width:100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </section>
            </div>
        @endif

        @if(isset($lifeStyle))
            <div id="lifestyle" class="tab-pane fade">
                <section class="w-100 amenities_sec">
                    <div class="header-container container-vertical-middle">
                        <div class="row">
                            <div class="col-md-7 col-md-offset-5 pl-0">
                                <h2 class="text-black text-uppercase tss-mb fs-20 mb-15">{{$lifeStyle->title}}</h2>
                                <?php echo $lifeStyle->description_1; ?>
                                @if(isset($lifeStyleTabs) && count($lifeStyleTabs) > 0)
                                    <div class="custom-tabs">
                                        <ul class="nav nav-pills">
                                            @foreach($lifeStyleTabs as $lskey => $lifeStyleTab)
                                                <li class="{{($lskey == 0) ? 'active':''}}"><a data-toggle="pill" data-target=".{{str_replace(' ','_',$lifeStyleTab->option_title)}}">{{$lifeStyleTab->option_title}}</a></li>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content">
                                            @foreach($lifeStyleTabs as $lskey => $lifeStyleTab)
                                                <div id="one_{{$lifeStyleTab->id}}" class="tab-pane {{($lskey == 0) ? 'active':''}} {{str_replace(' ','_',$lifeStyleTab->option_title)}}">
                                                    <h2 class="text-black text-uppercase tss-mb fs-20 mt-0">{{$lifeStyleTab->title}}</h2>
                                                    <?php echo $lifeStyleTab->description_1; ?>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    @if(isset($lifeStyleTabs) && count($lifeStyleTabs) > 0)
                        <div class="amenities_slider">
                            <div id="amenitiesCarousel" class="carousel carousel-fade" data-ride="carousel" data-interval="false">
                                <div class="carousel-inner">
                                    @foreach($lifeStyleTabs as $lskey => $lifeStyleTab)
                                        <div class="item {{($lskey == 0) ? 'active':''}} {{str_replace(' ','_',$lifeStyleTab->option_title)}}">
                                            <img src="{{asset($lifeStyleTab->background_image)}}" alt="{{str_replace(' ','_',$lifeStyleTab->option_title)}} slide" style="width:100%;">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="amenities_slider">
                            <div id="amenitiesCarousel" class="carousel carousel-fade" data-ride="carousel" data-interval="8000">
                                <div class="carousel-inner">
                                    <div class="item active aone">
                                        <img src="{{asset($lifeStyle->background_image)}}" alt="slide" style="width:100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </section>
            </div>
        @endif

        @if(isset($amenities_facilities))
            <?php 
                $amenities_facilities_id = $amenities_facilities->portfolio_id;
                $amenities_facilities_gallery = DB::table('portfolios_details_gallery')->where(['tab_id'=>$project_id,'type'=>'amenities_facilities_gallery_images'])->get();
            ?>
            <div id="amenities" class="tab-pane fade">
                <section class="w-100 lifestyle_sec more-top-space-1">
                    <div class="lifestyle_sec mCustomScrollbar mt-0" data-mcs-theme="dark">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 col-centered">
                                    <div class="desc text-center px-15 ">
                                        <!--
                                        <h2 class="text-black text-uppercase tss-mb fs-20 mb-10">A PROJECT MANAGED BY</h2>
                                        <img src="img/portfolio/details/dorchester-collection-logo.png" alt="DORCHESTER COLLECTION" class="w-100 mb-30">
                                        -->
                                        <h2 class="text-black text-uppercase tss-mb fs-20 mb-10"> {{$amenities_facilities->title ?? 'Amenities and Facilities'}} </h2>
                                        <?php echo $amenities_facilities->description_1; ?>
                                        <?php 
                                            $amenities = array_filter(explode(',',$amenities_facilities->amenities));
                                        ?>
                                        @if(count($amenities) > 0)
                                            <ul class="pulse_list more_gap text-left" style="margin-left:0px;">
                                                @foreach($amenities as $key => $avalue)
                                                    <li class="text-black tss-mr fs-11 tss-lh-1-4">{{ucfirst($avalue)}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hcarousel right">
                        @if(count($amenities_facilities_gallery) > 0)
                            
                            <div class="wrap">
                                <ul>
                                    @foreach($amenities_facilities_gallery as $afgvalue)
                                        @if(file_exists($afgvalue->image))
                                            <li><img src="{{asset($afgvalue->image)}}"/ alt="image-0{{$afgvalue->id}}"></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            
                        @endif
                    </div>
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
                                <div class="desc text-center px-45 ">
                                    <h2 class="text-black text-uppercase tss-mb fs-20 mb-10">{{$gallery->title ?? 'Gallery'}}</h2>
                                    @if(isset($gallery->description_1))
                                        <?php echo $gallery->description_1; ?>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="gallery mCustomScrollbar" data-mcs-theme="dark">
                        @if(count($gallery_images) > 0)
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
                        @endif
                    </div>
                </section>
            </div>
        @endif
       
        @if(isset($enquire))
            <div id="enquire" class="tab-pane fade">
                <section class="w-100 bg_img enquire_sec anwa_enquire_sec">
                    @if(isset($enquire->background_image))
                        <img src="{{asset($enquire->background_image)}}" class="anwa_enquire">
                    @endif
                    <div class="header-container {{$enquire->text_alignment ?? 'container-vertical-top-right' }}">

                        <div class="row">

                            <div class="col-md-4 text-center {{$enquire->grid_position??'float-left'}} pl-30">

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