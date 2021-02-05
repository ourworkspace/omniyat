<div class="inner-page mobile_view portfolio_detail_m_view" >
    <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">
       
        @if(isset($about))
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="aboutTab">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#aboutTabPanel" aria-expanded="true" aria-controls="aboutTabPanel" class="text-uppercase">
                        ABOUT {{$portfolio_details->project_name}}
                        </a>
                    </h4>
                </div>
                <div id="aboutTabPanel" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="aboutTab">
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
                                <?php $adescription_1 = strip_tags($about->description_1); ?>
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
                <div class="panel-heading" role="tab" id="locationTab">
                    <h4 class="panel-title">
                        <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#locationTabPanel" aria-expanded="false" aria-controls="locationTabPanel"> Location </a>
                    </h4>
                </div>

                <div id="locationTabPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="locationTab">
                    <div class="panel-body">
                        <div class="image ">
                            @if(isset($location->background_image) && file_exists($location->background_image))
                                <img src="{{asset($location->background_image)}}" alt="location-omniyat" class=w-100>
                            @endif
                            
                        </div>
                        <div class="w-100 text-center text-white py-20 bg_red fs-14 text-uppercase ">Location</div>
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
                <div class="panel-heading" role="tab" id="designTab">
                    <h4 class="panel-title">
                        <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#designTabPanel" aria-expanded="false" aria-controls="designTabPanel">
                        design
                        </a>
                    </h4>
                </div>
                <div id="designTabPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="designTab">
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
                        
                        @if(isset($designWithTabs) && count($designWithTabs) > 0)
                            <div class="panel-desc p-20 w-100">
                                <div class="panel-group accordion sub_accordian" id="accordion2" role="tablist" aria-multiselectable="true">
                                    @foreach($designWithTabs as $dwtKey => $pdvalue)
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="designWithTabA{{$dwtKey}}">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#designcTab{{$dwtKey}}" aria-expanded="{{($dwtKey == 0) ? true : false }}" aria-controls="designc{{$dwtKey}}" class="text-uppercase {{ ($dwtKey != 0) ? 'collapsed':'' }}">{{$pdvalue->option_title}}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="designcTab{{$dwtKey}}" class="panel-collapse collapse {{($dwtKey == 0) ? 'show' : ''}}" role="tabpanel" aria-labelledby="designWithTabA{{$dwtKey}}">
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
                            </div>
                        @endif

                        @if(isset($designWithOutTabs))
                            <div class="panel-desc p-20 w-100">
                                <h5 class="fs-22 tss-mb text-black mt-0 mb-15 text-uppercase tss-lh-1-3">{{$designWithOutTabs->title}}</h5>
                                @if(isset($designWithOutTabs->description_1) && !empty($designWithOutTabs->description_1))
                                    <?php echo $designWithOutTabs->description_1; ?>
                                @endif
                            </div>
                        @endif
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

                <div class="panel-heading" role="tab" id="amenitiesFacilitiesTab">
                    <h4 class="panel-title">
                        <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#amenitiesFacilitiesTabPanel" aria-expanded="false" aria-controls="amenitiesFacilitiesTabPanel">amenities & facilities</a>
                    </h4>
                </div>
                
                <div id="amenitiesFacilitiesTabPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="amenitiesFacilitiesTab">

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
                <div class="panel-heading" role="tab" id="lifeStyleTab">
                    <h4 class="panel-title">
                        <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#lifeStyleTabPanel" aria-expanded="false" aria-controls="lifeStyleTabPanel">lifestyle</a>
                    </h4>
                </div>

                <div id="lifeStyleTabPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="lifeStyleTab">
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
                                    @foreach($lifeStyleTabs as $lsKey => $lifeStyleTab)
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="lifestyleTabs{{$lsKey}}">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion3" href="#lifestyleTabPanel{{$lsKey}}" aria-expanded="{{($lsKey == 0) ? true : false }}" aria-controls="lifestyleTabPanel{{$lsKey}}" class="text-uppercase {{ ($lsKey != 0) ? 'collapsed':'' }}">{{$lifeStyleTab->option_title}}
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="lifestyleTabPanel{{$lsKey}}" class="panel-collapse collapse {{($lsKey == 0) ? 'show' : ''}}" role="tabpanel" aria-labelledby="lifestyleTabs{{$lsKey}}">
                                                <div class="panel-body">
                                                    <h5 class="text-black text-uppercase tss-msb fs-14 my-10">{{$lifeStyleTab->title}}</h5>
                                                    @if(isset($lifeStyleTab->description_1) && !empty($lifeStyleTab->description_1))
                                                        <?php echo $lifeStyleTab->description_1; ?>
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

        @if(isset($gallery))
            <?php 
                $gallery_id = $gallery->portfolio_id;
                $gallery_images = DB::table('portfolios_details_gallery')->where(['tab_id'=>$gallery->portfolio_id,'type'=>'gallery_slider_images'])->get();
            ?>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="galleryTab">
                    <h4 class="panel-title">
                        <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#galleryTabPanel" aria-expanded="false" aria-controls="galleryTabPanel">gallery </a>
                    </h4>
                </div>

                <div id="galleryTabPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="galleryTab">
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
                <div class="panel-heading" role="tab" id="inquireTab">
                    <h4 class="panel-title">
                        <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#inquireTabPanel" aria-expanded="false" aria-controls="inquireTabPanel">Inquire</a>
                    </h4>
                </div>

                <div id="inquireTabPanel" class="panel-collapse collapse" role="tabpanel" aria-labelledby="inquireTab">
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
