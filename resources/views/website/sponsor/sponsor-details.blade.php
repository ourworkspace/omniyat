@extends('website.layouts.inner_layout')
@section('title','Press Kit')
@section('pageContent') 
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/vendors/masonry-gallery/css/style.css')}}">
<div class="inner-page desktop_view">
    <section class="page-title text-center w-100 pb-30">
        <h1 class="tss-text-black text-uppercase fs-40 my-0 tss-optima" data-aos="fade-up" data-aos-duration="600">omniyat sponsorships</h1>
        <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">{{$page_sub_title->sub_title}}</p>
        
    </section>
    
    <section class="w-100 mt-30 press_detail csr_details">
        <div class="header-container">
            <div class="list_items w-100 px-30">
                <div class="row pb-30">
                    <div class="col-md-12">
                        <ol class="breadcrumb omniyat" data-aos="fade-up">
                            <li class="breadcrumb-item"><a class="white-text" href="javascript:void(0)">Media</a></li>
                            <li class="breadcrumb-item"><a class="white-text" href="{{route('site.sponsorships')}}">SPONSORSHIPS </a></li>
                            <li class="breadcrumb-item active">{{$ssd->category_name}}</li>
                        </ol>
                    </div>
                </div>
                <div class="row row-display-flex-center pb-30">
                    <div class="col-md-6 pr-30" data-aos="fade-right" data-aos-duration="900">
                        <p class="text-left"><span class="fs-12 text-black tss-mm text-uppercase">
                            {!! htmlspecialchars_decode(date('j<\s\up>S</\s\up> M Y', strtotime($ssd->date))) !!}
                        </p>
                        <h2 class="fs-28 tss-text-red tss-optima mt-5 mb-15">{{$ssd->title}}</h2>
                        <div class="ssd_large_content"><?php echo $ssd->long_description; ?></div>
                        
                        
                    </div>
                    <div class="col-md-6" data-aos="fade-left" data-aos-duration="900">
                        <div class="image">
                            <img src="{{asset($ssd->large_image)}}" alt="sponsor-details">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    @if(count($ss_gallery_images)>0)
    <section class="w-100 my-30 press_list" id="gallery_sec" data-aos="fade-up" data-aos-duration="900">
        <section class="page-title text-center w-100 pb-15 pt-45">
            <h1 class="tss-text-black text-uppercase fs-40 my-0 tss-optima">Event gallery</h1>   
        </section>
        <div class="w-100">
            <div class="grid effect-2" id="grid">
                @foreach($ss_gallery_images as $ssgi)
                <div class="gallery item" data-flashy-title="" href="{{asset($ssgi->image)}}">
                    <img src="{{asset($ssgi->image)}}">
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @if(count($sslist) > 0)
        <section class="w-100 mt-30 press_list">
            <hr style="max-width: 46%;margin: 20px auto 0;">
            <section class="page-title text-center w-100 pb-15 pt-45">
                <h1 class="tss-text-black text-uppercase fs-40 my-0 tss-optima">more {{$ssd->category_name}}</h1>   
            </section>
            <div class="header-container">
                <div class="list_items pb-45 w-100 px-45">
                    <div class="row row-flex pb-45">
                        @foreach($sslist as $ss)
                            <div class="col-sm-6 col-md-4">
                                <div class="item">
                                    <a href="{{route('site.sponsorships.details',['id'=>$ss->id])}}">
                                        <div class="image relative">
                                            <img src="{{asset($ss->thumb_image)}}" alt="sponsor_smilar_list">
                                        </div>
                                        <div class="desc text-center">
                                            <h2 class="tss-text-red fs-12 tss-mm tss-lh-1-4">
                                                {{$ss->title}}
                                            </h2>
                                            <p class="text-black fs-10 tss-mr tss-lh-1-4">{{$ss->short_description}}...</p>
                                            <div class="text-center mb-10"><span class="tss-mb fs-11 text-black text-uppercase">explore more <span class="tss-text-red">➔</span></span></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>


<div class="inner-page mobile_view  media_list_pages">
    <section class="page-title text-center w-100 my-30">
        <h1 class="tss-text-black text-uppercase fs-24 my-0 tss-optima mb-10" data-aos="fade-up" data-aos-duration="800">omniyat sponsorships</h1>
        <p class="tss-text-red text-uppercase fs-12 tss-mr ls-2" data-aos="fade-up" data-aos-duration="900">sponsorship programme</p>
    </section>
    <section class="page_content w-100 px-5 relative">
        <ol class="breadcrumb omniyat w-100">
            <li class="breadcrumb-item"><a class="white-text" href="javascript:void(0)">Media</a></li>
            <li class="breadcrumb-item"><a class="white-text" href="{{route('site.sponsorships')}}">SPONSORSHIPS </a></li>
            <li class="breadcrumb-item active">{{$ssd->category_name}}</li>
        </ol>
        <div class="image w-100 mt-5 relative">
            <img src="{{asset($ssd->large_image)}}" alt="detail" class="w-100">
        </div>
        <p class="w-100 mb-15 pb-15">
            <span class="fs-11 pull-right text-black-50 tss-msb mt-5">{{strtoupper(date('d', strtotime($ssd->date)))}}<sup>@if(date('d', strtotime($ssd->date)) == 1) rd @elseif(date('d', strtotime($ssd->date)) == 2) nd @elseif(date('d', strtotime($ssd->date)) == 2) rd @else th @endif </sup> {{strtoupper(date('M Y', strtotime($ssd->date)))}}</span>
        </p>
        <div class="desc py-15 px-15">
            <h2 class="fs-18 text-black tss-msb mt-15 pb-15 tss-lh-1-3">{{$ssd->title}}</h2>
            <div class="ssd_mobile_large_content"><?php echo $ssd->long_description; ?></div>
        </div>
    </section>
    @if(count($ss_gallery_images)>0)
    <section class="press_list w-100 m_gallery_sec">
        <section class="page-title text-center w-100 mt-30 ">
            <h1 class="tss-text-black text-uppercase fs-24 my-0 tss-optima">Event gallery</h1>
            <div class="slide-count"></div>
            <section class="sponsor_gallery slider list_items px-5 w-100">
                @foreach($ss_gallery_images as $ssgi)
                <div class="image relative">
                    <img src="{{asset($ssgi->image)}}" alt="galery">
                </div>
                @endforeach
                
            </section>
        </section>
    </section>
    @endif

   
    <hr style="width: calc(100% - 10px); margin:45px 5px 0 5px;padding: 0;float: left;border-color: rgb(0 0 0 / 0.6);">
    @if(count($sslist) > 0)
        <section class="m_similar_events press_list mb-100 w-100 more_events">
            <section class="page-title text-center w-100 mt-30 ">
                <h1 class="tss-text-black text-uppercase fs-24 my-0 tss-optima">more {{$ssd->category_name}}</h1>
            </section>
            <section class="similar_evnts slider list_items px-5 w-100">
                @foreach($sslist as $ss)
                    <div class="item">
                        <a href="{{route('site.sponsorships.details',['id'=>$ss->id])}}">
                            <div class="image relative">
                                <img src="{{asset($ss->thumb_image)}}" alt="sponsor_smilar_list">
                            </div>
                            <div class="desc text-center">
                                <h2 class="tss-text-red fs-15 tss-mm tss-lh-1-3"> {{$ss->title}} </h2>
                                <p class="text-black fs-14 tss-mr tss-lh-1-4">{{$ss->short_description}}...</p>
                                <div class="text-center my-10"><span class="tss-mb fs-14 text-black text-uppercase">explore more <span class="tss-text-red">➔</span></span></div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </section>
        </section>
    @endif

    <div class="fixed_bottom fixed_bottom-2col">
        <div class="li">
            <a href="{{route('site.sponsorships')}}" class="text-center">
                <i class="icon-back"></i>
                <p class="fs-10 tss-msb">ALL SPONSORSHIPS</p>
            </a>
        </div>
        <div class="li">
            <a href="" class="text-center">
                <i class="icon-share_new"></i>
                <p class="fs-10 tss-msb">SHARE</p>
            </a>
        </div>
    </div>
    
</div>
<script src="{{asset('public/assets/vendors/masonry-gallery/js/masonry.pkgd.js')}}"></script>
<script src="{{asset('public/assets/vendors/masonry-gallery/js/index.js')}}"></script>
@endsection
