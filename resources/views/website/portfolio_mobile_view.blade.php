<div class="inner-page mobile_view portfolio_detail_m_view" >
    <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">
        @if(isset($about))
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="h1">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#c1" aria-expanded="true" aria-controls="c" class="text-uppercase">
                    ABOUT {{$portfolio_details->project_name}}
                    </a>
                </h4>
            </div>
            <div id="c1" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="h1">
                <div class="panel-body">
                    <div class="image ratio-md-height about_main_img">
                        @if(isset($about->background_image) && file_exists($about->background_image))
                            <img src="{{asset($about->background_image)}}" alt="about-omniyat">
                        @endif
                        @if(isset($about->logo) && file_exists($about->logo))
                            <div class="logo"><img src="{{asset($about->logo)}}"></div>
                        @endif
                    </div>
                    <div class="w-100 text-center text-white py-20 bg_red fs-14">ABOUT {{$portfolio_details->project_name}}</div>
                    <div class="panel-desc p-20 w-100">
                        <h5 class="fs-22 tss-mb text-black mt-0 mb-10 text-uppercase tss-lh-1-3">{{$about->title}}</h5>
                        <?php 
                                $adescription_1 = strip_tags($about->description_1);
                            ?>
                            
                            <?php echo $about->description_1; ?>
                        <details>
                            <summary>
                                <span id="open" class="tss-msb fs-14 text-black text-uppercase">Read more</span> 
                                <span id="close" class="tss-msb fs-14 text-black text-uppercase ">Read Less</span> 
                            </summary>

                            <div class="btm-details mt-30">
                                <?php echo $about->description_2; ?>
                            </div>
                        </details>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if($location)
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="h2">
                <h4 class="panel-title">
                    <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#c2" aria-expanded="false" aria-controls="c2">
                    {{strtoupper($about->tab_name)}}
                    </a>
                </h4>
            </div>

            <div id="c2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="h2">
                <div class="panel-body">
                    <div class="image ">
                        @if(isset($location->background_image) && file_exists($location->background_image))
                            <img src="{{asset($location->background_image)}}" alt="location-omniyat" class=w-100>
                        @endif
                        
                    </div>
                    <div class="w-100 text-center text-white py-20 bg_red fs-14 text-uppercase ">{{strtoupper($about->tab_name)}}</div>
                    <div class="panel-desc p-20 w-100">
                        <h5 class="fs-22 tss-mb text-black mt-0 mb-10 text-uppercase tss-lh-1-3">{{$location->title}}</h5>
                        <?php 
                            $ldescription_1 = strip_tags($location->description_1);
                        ?>
                        <?php echo $location->description_1; ?>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(isset($design))
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
                    @if(isset($designWithTabs) && count($designWithTabs) > 0)
                        <section class="lifestyle slider panel_slider">
                            @foreach($designWithTabs as $key => $pdvalue)
                                <div class="image">
                                    <img src="{{asset($pdvalue->background_image)}}">
                                </div>
                            @endforeach
                        </section>
                    @endif
                    @if(isset($designWithOutTabs))
                        <section class="lifestyle slider panel_slider">
                            <div class="image">
                                <img src="{{asset($designWithOutTabs->background_image)}}">
                            </div>
                        </section>
                    @endif

                    <div class="w-100 text-center text-white py-20 bg_red fs-14 text-uppercase ">Design</div>
                    <div class="panel-desc p-20 w-100">
                        @if(isset($designWithTabs) && count($designWithTabs) > 0)
                        <div class="panel-group accordion sub_accordian" id="accordion2" role="tablist" aria-multiselectable="true">
                            @php($ki = 0)
                            @foreach($designWithTabs as $key => $pdvalue)
                            @php($ki++)
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="designh{{$ki}}">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#designc{{$ki}}" aria-expanded="@if($ki = 1) true @else false @endif" aria-controls="designc @if($ki != 1) {{$ki}} @endif" class="text-uppercase @if($ki != 0) collapsed @endif">{{$pdvalue->option_title}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="designc{{$ki}}" class="panel-collapse collapse @if($ki = 1) show @endif" role="tabpanel" aria-labelledby="designh{{$ki}}">
                                    <div class="panel-body">
                                        <h5 class="text-black text-uppercase tss-msb fs-14 my-10">{{$pdvalue->title}}</h5>

                                        @if(isset($pdvalue->description_1) && !empty($pdvalue->description_1))
                                            <?php echo $pdvalue->description_1; ?>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(isset($amenities_facilities))
            <?php 
                $amenities_facilities_id = $amenities_facilities->portfolio_id;
                $amenities_facilities_gallery = DB::table('portfolios_details_gallery')->where(['tab_id'=>$project_id,'type'=>'amenities_facilities_gallery_images'])->get();
            ?>
            <div class="panel panel-default">

                <div class="panel-heading" role="tab" id="h5">
                    <h4 class="panel-title">
                        <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#c5" aria-expanded="false" aria-controls="c5">amenities & facilities</a>
                    </h4>
                </div>
                
                <div id="c5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="h5">

                    <div class="panel-body">
                        @if(count($amenities_facilities_gallery) > 0)
                            <section class="lifestyle slider panel_slider">
                                @foreach($amenities_facilities_gallery as $afgvalue)
                                    @if(file_exists($afgvalue->image))
                                        <div class="image">
                                            <img src="{{asset($afgvalue->image)}}">
                                        </div>
                                    @endif
                                @endforeach
                            </section> 
                        @endif
                        <div class="w-100 text-center text-white py-20 bg_red fs-14 text-uppercase ">amenities & facilities</div>

                        <div class="panel-desc p-20 w-100">

                            <div class="text-left">
                                <h5 class="fs-22 tss-mb text-black mt-15 mb-10 text-uppercase tss-lh-1-3">{{$amenities_facilities->title}}</h5>
                            </div>

                            <?php echo $amenities_facilities->description_1; ?>
                            <?php 
                                $amenities = array_filter(explode(',',$amenities_facilities->amenities));
                            ?>
                            @if(count($amenities) > 0)
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
                                                    @foreach($amenities as $key => $avalue)
                                                        <li class="text-black tss-mr fs-14 tss-lh-1-4">{{ucfirst($avalue)}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>

                </div>
            </div>
        @endif
        @if(isset($lifeStyle))
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="h4">
                    <h4 class="panel-title">
                        <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#c4" aria-expanded="false" aria-controls="c4">lifestyle</a>
                    </h4>
                </div>

                <div id="c4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="h4">

                    <div class="panel-body">
                        <section class="lifestyle slider panel_slider">
                            @if(isset($lifeStyleTabs) && count($lifeStyleTabs) > 0)
                                @foreach($lifeStyleTabs as $lskey => $lifeStyleTab)
                                    <div class="image">
                                        <img src="{{asset($lifeStyleTab->background_image)}}">
                                    </div>
                                @endforeach
                            @else
                                <div class="image">
                                    <img src="{{asset($lifeStyle->background_image)}}">
                                </div>
                            @endif
                        </section>


                        <div class="w-100 text-center text-white py-20 bg_red fs-14 text-uppercase ">lifestyle</div>

                    <div class="panel-desc p-20 w-100">
                        <h5 class="fs-22 tss-mb text-black mt-0 mb-10 text-uppercase tss-lh-1-3">{{$lifeStyle->title}}</h5>
                        <?php echo $lifeStyle->description_1; ?>
                        @if(isset($lifeStyleTabs) && count($lifeStyleTabs) > 0)
                        <div class="panel-group accordion sub_accordian mt-30" id="accordion3" role="tablist" aria-multiselectable="true">
                            @foreach($lifeStyleTabs as $lskey => $lifeStyleTab)
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="amenitiesh{{$lskey+1}}">
                                    <h4 class="panel-title">
                                        <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion3" href="#amenitiesc{{$lskey+1}}" aria-expanded=" @if($lskey = 0) true @else false @endif" aria-controls="amenitiesc{{$lskey+1}}">{{$lifeStyleTab->option_title}}</a>
                                    </h4>
                                </div>
                                <div id="amenitiesc{{$lskey+1}}" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="amenitiesh{{$lskey+1}}">
                                    <div class="panel-body">
                                        <!-- <div class="image w-100 mb-20">
                                            <img src="img/portfolio/details/intro.jpg" class="w-100">
                                        </div> -->
                                        <?php echo $lifeStyleTab->description_1; ?>
                                    </div>

                                </div>
                            </div>
                            @endforeach
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="amenitiesh6">
                                    <h4 class="panel-title">
                                        <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion3" href="#amenitiesc6" aria-expanded="false" aria-controls="amenitiesc6">Exclusive Beach Club</a>
                                    </h4>
                                </div>
                                <div id="amenitiesc6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="amenitiesh6">
                                    <div class="panel-body">
                                        <div class="image w-100 mb-20">
                                            <img src="img/portfolio/details/beachclub.jpg" class="w-100">
                                        </div>
                                        <p class="text-black tss-mr fs-14 tss-lh-1-7">To ensure the ultra-luxury experience continues for its residents, One at Palm Jumeirah Exclusive Beach Club managed by Dorchester Collection, will grant them full access to the club and provide its residents full bespoke lifestyle services and state-of-the-art facilities while enjoying the sun, sea and laid-back vibes at night.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                     @endif    
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(isset($gallery))
            <?php 
                $gallery_id = $gallery->portfolio_id;
                $gallery_images = DB::table('portfolios_details_gallery')->where(['tab_id'=>$gallery->portfolio_id,'type'=>'gallery_slider_images'])->get();
            ?>
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
                    <div class="w-100 text-center text-white py-20 bg_red fs-14 text-uppercase ">{{$gallery->title??'Gallery'}}</div>
                    <div class="demo-gallery w-100">
                        <ul class="flexbin flexbin-margin demo-gallery" id="lightgallery">
                            @foreach($gallery_images as $key => $giValue) 
                            <li data-src="{{asset($giValue->image)}}" class="content">
                                <a href="">
                                    <img class="img-responsive" src="{{asset($giValue->image)}}"> 
                                </a>
                            </li>
                            @endforeach
                            
                        </ul>
                        <p class="text-center  p-20 w-100"><a href="" class="fs-14 tss-mb text-black p-20" id="loadMore">LOAD MORE</a></p>
                        @if(isset($gallery->description_1))
                            <?php echo $gallery->description_1; ?>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if(isset($enquire))
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="h7">
                <h4 class="panel-title">
                    <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#c7" aria-expanded="false" aria-controls="c7">
                    Inquire
                    </a>
                </h4>
            </div>

            <div id="c7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="h7">
                <div class="panel-body">
                    @if(isset($enquire->background_image))
                    <div class="image">
                        <img src="{{asset($enquire->background_image)}}" alt="enquire-omniyat" class="w-100">
                    </div> 
                    @endif
                    <div class="w-100 text-center text-white py-20 bg_red fs-14">INQUIRE</div>
                    <div class="panel-desc p-20 w-100">
                        <div class="red_outline_box p-20">
                                <h5 class="fs-14 tss-mb text-black mt-0 mb-10 text-uppercase tss-lh-1-3">Register your interest</h5>
                                <div id="FeedbackEnqueryMobilemessage"></div>
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
        @endif
    </div>
</div> 
