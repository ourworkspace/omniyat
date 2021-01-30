@extends('website.layouts.inner_layout')
@section('title','Press Kit')
@section('pageContent')
<div id="header"></div>
<div class="inner-page desktop_view">
    <section class="page-title text-center w-100">
        <h1 class="tss-text-black text-uppercase fs-40 my-0 tss-optima" data-aos="zoom-in" data-aos-duration="900">omniyat press Kit</h1>
        <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="600">{{$page_sub_title->sub_title}}</p>

    </section>

    <section class="w-100 mt-30 press_list press_kit_list">
        <div class="header-container">
            <div class="list_items pb-30 w-100 px-45">
                @if(count($press_kit_category_data)>0)
                @foreach($press_kit_category_data as $pkcd)
                <div class="kit mb-30 w-100">
                    <h2 class="fs-28 tss-text-red tss-optima mt-5 mb-0 text-uppercase" data-aos="fade-up" data-aos-duration="900">{{$pkcd->name}}</h2>
                    <div class="row row-flex">
                        @foreach($press_kit_data as $pkd)
                        @if($pkcd->id == $pkd->category_id)

                        <div class="col-sm-4 col-md-3" data-aos="fade-up" data-aos-duration="900">
                            <div class="item">
                                <a href="">
                                    <div class="image relative">
                                        <img src="{{asset($pkd->thumb_image)}}" alt="press-kit">
                                    </div>
                                    <div class="desc text-center">
                                        <p class="text-black fs-11 tss-mr tss-lh-1-4">{{$pkd->title}}</p>
                                    </div>
                                </a>
                                <ul id="colorNav">
                                    <li><a href="{{asset($pkd->pdf_file)}}" download><i class="icon-download"></i></a></li>
                                    <li class="green relative"><a href=""><i class="icon-share"></i></a>
                                        <ul style="top: 45px;left: auto;right: -90%;">
                                            <li><a href="http://www.facebook.com/sharer.php?u=http://caferoute66.com/omniyat/html/press-kit.html" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="https://twitter.com/share?url=http://caferoute66.com/omniyat/html/press-kit.html" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a> <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://caferoute66.com/omniyat/html/press-kit.html" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i>
                                            </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endforeach
                @endif
            </div>

        </div>
    </section>



</div>
<div class="inner-page mobile_view">
    <section class="page-title text-center w-100 my-30">
        <h1 class="tss-text-black text-uppercase fs-24 my-0 tss-optima mb-10" data-aos="fade-up" data-aos-duration="800">omniyat press kit</h1>
        <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">{{$page_sub_title->sub_title}}</p>
    </section>
    @if(count($press_kit_category_data)>0)
    @foreach($press_kit_category_data as $pkcd)
    <div class="list_items m_presskit_list w-100">
        <h2 class="fs-18 tss-text-red tss-optima mt-0 mb-10 text-uppercase text-center w-100">{{$pkcd->name}}</h2>
        @foreach($press_kit_data as $pkd)
        @if($pkcd->id == $pkd->category_id)
        <div class="item">
            <a href="{{asset('press_kit_details').'/'.$pkd->id}}">
                <div class="image relative">
                    <img src="{{asset($pkd->thumb_image)}}" alt="press-kit">
                </div>
                <div class="desc text-center">
                    <p class="text-black fs-14 tss-mr tss-lh-1-2 break-word">{{$pkd->title}}</p>
                </div>
            </a>
        </div>
        @endif
        @endforeach
    </div>
    @endforeach
    @endif
</div>
@endsection