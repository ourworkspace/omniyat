@extends('website.layouts.inner_layout')
@section('title','Press Release Details')
@section('pageContent')
<div id="header"></div>

<div class="inner-page desktop_view">
    <section class="page-title text-center w-100">
        <h1 class="tss-text-black text-uppercase fs-40 my-0 tss-optima" data-aos="fade-up" data-aos-duration="600">Press release</h1>
        <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">{{$page_sub_title->sub_title}}</p>

    </section>

    <section class="w-100 mt-30 press_detail">
        <div class="header-container">
            <div class="list_items w-100 px-30">
                <div class="row ">
                    <div class="col-md-6" data-aos="fade-right" data-aos-duration="900">
                        <div class="image">
                            <img src="{{asset($prd->large_image)}}" alt="press-details">
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-left" data-aos-duration="900">
                        <p class="text-right"><span class="fs-12 text-black tss-mm text-uppercase">{{date('jS-M-Y', strtotime($prd->date))}}</span></p>
                        <h2 class="fs-28 tss-text-red tss-optima mt-5 mb-15">{{$prd->title}}</h2>
                        {!! $prd->long_description !!}




                        <ul class="custom_btns" id="colorNav">
                            <li><a class="btn" href="{{asset($prd->pdf_file)}}" target="_blank"><span><i class="icon-download"></i></span>Download</a></li>
                            <li class="green"><a class="btn" href=""><span><i class="icon-share"></i></span>Share</a>
                                <ul>
                                    <li>
                                        <a href="http://www.facebook.com/sharer.php?u={{url()->current()}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
                                        <a href="https://twitter.com/share?url={{url()->current()}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a> 
                                        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{url()->current()}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row py-20">
                    <div class="col-md-6">
                        <ol class="breadcrumb omniyat">
                            <li class="breadcrumb-item"><a class="white-text" href="{{route('site.home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a class="white-text" href="{{route('site.press.release')}}">PRESS RELEASE</a></li>
                            <li class="breadcrumb-item active" title="{{$prd->title}}">{{substr($prd->title, 1, 25).'...'}}</li>
                        </ol>
                    </div>
                    <div class="col-md-6">

                        <div class="text-right">
                            @if(isset($previous) && isset($previous->id))
                                <a href="{{asset('press_release_details').'/'.$previous->id}}" class="fs-11 tss-mb text-uppercase text-black"><span class="tss-text-red">&larr;</span> Previous </a> &nbsp;&nbsp; 
                            @endif
                            @if(isset($next) && isset($next->id))
                                <a href="{{asset('press_release_details').'/'.$next->id}}" class="fs-11 tss-mb text-uppercase text-black">NEXT <span class="tss-text-red">→</span></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </section>
        @include('website.layouts.footer')

    </div>
    <div class="inner-page mobile_view  media_list_pages">
        <section class="page-title text-center w-100 my-30">
            <h1 class="tss-text-black text-uppercase fs-30 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">omniyat press release</h1>
            <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">get the latest updates</p>
        </section>
        <section class="page_content w-100 px-5 relative mb-100">
            <ol class="breadcrumb omniyat w-100">
                <li class="breadcrumb-item"><a class="white-text" href="{{route('site.home')}}">Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href="{{route('site.press.release')}}">PRESS RELEASE</a></li>
                <li class="breadcrumb-item active" title="{{$prd->title}}">{{substr($prd->title, 1, 25).'...'}}</li>
            </ol>
            <div class="image w-100 mt-5 relative">
                <img src="img/press-release/One-at-Palm-Jumeirah-Breathtaking-Views.jpg" alt="detail" class="w-100">
            </div>
            <p class="w-100 mb-15 pb-15">
                <span class="fs-11 pull-right text-black-50 tss-msb text-uppercase mt-5">POSTED {{date('jS-M-Y', strtotime($prd->date))}}</span>
            </p>
            <div class="desc py-15 px-15">
                <h2 class="fs-18 text-black tss-msb mt-15 pb-15 tss-lh-1-3">{{$prd->title}}</h2>

                {!! $prd->long_description !!}          
            </div>

            <div class="fixed_bottom">
                <div class="li">
                    <a href="{{asset($prd->pdf_file)}}" download class="text-center">
                        <i class="icon-download"></i>
                        <p class="fs-10 tss-msb">DOWNLOAD</p>
                    </a>
                </div>

                <div class="li share">
                    <a class="text-center m-share">
                        <i class="icon-share"></i>
                        <p class="fs-10 tss-msb">SHARE</p>
                    </a>
                    <ul>
                        <li>
                            <a href="http://www.facebook.com/sharer.php?u={{url()->current()}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
                            <a href="https://twitter.com/share?url={{url()->current()}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a> 
                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{url()->current()}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div><!--fixed_bottom-->
        </section>
        @include('website.layouts.mobile_footer')
    </div>
    @endsection
