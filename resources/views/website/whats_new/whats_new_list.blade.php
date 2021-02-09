@extends('website.layouts.inner_layout')
@section('title',"What's New")
@section('pageContent')

<div id="header"></div>  

<div class="inner-page desktop_view">
    <section class="page-title text-center w-100">
        <h1 class="tss-text-black text-uppercase fs-40 my-0 tss-optima" data-aos="fade-up" data-aos-duration="600">What’s New</h1>
        <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">{{$page_sub_title->sub_title}}</p>

    </section>

    <section class="w-100 mt-30 press_detail">
        <div class="header-container">

            <div class="list_items w-100 px-30 pb-30">
                <div class="row ">
                    <div class="col-md-12" data-aos="fade-up" data-aos-duration="900">
                        <div class="whatsNew w-100">

                            <div class="whatsNewList w-100">
                                @if(count($whats_new_data)>0)
                                @foreach($whats_new_data as $wnd)
                                <div class="whatsNewItemMain">
                                    <div class="whatsnewItem">
                                        <a href="{{asset('whats_new_details').'/'.$wnd->id}}">
                                            <span class="latestNews">Latest News</span>
                                            <div class="whatsnewImg">
                                                <img src="{{asset($wnd->thumb_image)}}" alt="">
                                            </div>
                                            <div class="whatsnewItemContent">
                                                <h4>{{$wnd->title}}</h4>
                                                <p class="fs-11 tss-mr text-black py-15" style="text-transform: none;">{{$wnd->short_description}}</p>
                                                <div class="text-right">
                                                    <a href="{{asset('whats_new_details').'/'.$wnd->id}}" class="readmore_link">Read More <span>➜</span></a>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @include('website.layouts.footer')

</div>

<div class="inner-page mobile_view" >
    <section class="page-title text-center w-100 my-30">
        <h1 class="tss-text-black text-uppercase fs-32 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">what’s new</h1>
        <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">{{$page_sub_title->sub_title}}</p>
    </section>
    <section class="page_content w-100 px-5 relative">
        <div class="slide-count"></div>
        <section class="newsfeed slider">
            @if(count($whats_new_data)>0)
            @foreach($whats_new_data as $wnd)
            <div class="item_div">
                <div class="image same-height">
                    <a href="{{asset('whats_new_details').'/'.$wnd->id}}"><img src="{{asset($wnd->thumb_image)}}"></a>
                </div>
                <span class="latestNews">Latest News</span>
                <div class="desc px-15 pb-15">
                    <h2 class="fs-16 text-black tss-msb mt-15 mb-10 pt-15 tss-lh-1-3">{{$wnd->title}}</h2>
                    <p class="text-black tss-mm fs-14 tss-lh-1-5 my-10">{{$wnd->short_description}}</p>
                    <p class="text-right py-15 mb-0"><a href="{{asset('whats_new_details').'/'.$wnd->id}}" class="fs-14 tss-mb text-uppercase tss-text-red" style="text-decoration: none;">read more<span class="tss-text-red">→</span></a></p>
                </div>
            </div>
            @endforeach
            @endif
        </section>

    </section>
    @include('website.layouts.footer')
</div>
@endsection