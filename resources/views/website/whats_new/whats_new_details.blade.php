@extends('website.layouts.inner_layout')
@section('title',"What's New Details")
@section('pageContent')
    
<div class="inner-page desktop_view">
    <section class="page-title text-center w-100">
        <h1 class="tss-text-black text-uppercase fs-40 my-0 tss-optima" data-aos="fade-up" data-aos-duration="600">What’s New</h1>
        <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">{{$page_sub_title->sub_title}}</p>

    </section>

    <section class="w-100 mt-30 press_detail">
        <div class="header-container">
            <div class="list_items w-100 px-30">
                <div class="row ">
                    <div class="col-md-6" data-aos="fade-right" data-aos-duration="900">
                        <div class="image">
                            <img src="{{asset($wnd->thumb_image)}}" alt="whatsnew">
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-left" data-aos-duration="900">
                        <p class="w-100 mb-15 pb-15">
                            <span class="fs-12 pull-left text-uppercase bg_red text-white py-3 px-15">latest news</span>
                            <span class="fs-12 pull-right text-black tss-mm text-uppercase mt-5">{{date('F j,Y', strtotime($wnd->date))}}</span> </p>
                        <h2 class="fs-28 text-black tss-optima mt-15 mb-15 pb-15">{{$wnd->title}}</h2>
                        {!! $wnd->long_description !!}
                    </div>
                </div>
                <div class="row py-20 pt-45">
                    <div class="col-md-6">
                        <ol class="breadcrumb omniyat">
                            <li class="breadcrumb-item"><a class="white-text" href="{{route('site.whats.new')}}">what’s new</a></li>
                            <li class="breadcrumb-item active">latest news</li>
                        </ol>
                    </div>
                    <div class="col-md-6">
                        <div class="text-right">
                            @if(isset($previous) && isset($previous->id))
                                <a href="{{asset('whats_new_details').'/'.$previous->id}}" class="fs-11 tss-mb text-uppercase text-black"><span class="tss-text-red">&larr;</span> Previous </a> &nbsp;&nbsp; 
                            @endif
                            @if(isset($next) && isset($next->id))
                                <a href="{{asset('whats_new_details').'/'.$next->id}}" class="fs-11 tss-mb text-uppercase text-black">NEXT <span class="tss-text-red">→</span></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    @include('website.layouts.footer')
</div>
<div class="inner-page mobile_view">
    <section class="page-title text-center w-100 my-30">
        <h1 class="tss-text-black text-uppercase fs-32 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">what’s new</h1>
        <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">NEWSFEED</p>
    </section>
    <section class="page_content w-100 px-5 relative">
        <ol class="breadcrumb omniyat w-100">
            <li class="breadcrumb-item"><a class="white-text" href="{{route('site.whats.new')}}">what’s new</a></li>
            <li class="breadcrumb-item active">latest news</li>
        </ol>
        <div class="image w-100 mt-5 relative">
            <img src="{{asset($wnd->thumb_image)}}" alt="news-feed" class="w-100">
            <span class="latestNews_details">Latest News</span>
        </div>
        <div class="desc py-15 px-15">
            <p class="w-100 mb-15 pb-15">
                <span class="fs-10 pull-right text-black tss-msb text-uppercase mt-5">{{date('F j,Y', strtotime($wnd->date))}}</span>
            </p>
            <h2 class="fs-18 text-black tss-msb mt-15 pb-15 tss-lh-1-3">{{$wnd->title}}</h2>
            {!! $wnd->long_description !!}
        </div>
    </section>
    <p class="text-right px-20"><a href="" class="fs-14 tss-mb text-uppercase text-black">NEXT <span class="tss-text-red">→</span></a></p>
    @include('website.layouts.footer')
</div>

@endsection