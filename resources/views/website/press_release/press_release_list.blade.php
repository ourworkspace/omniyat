@extends('website.layouts.inner_layout')
@section('title','Press Release')
@section('pageContent')

    <div id="header"></div>

    <div class="inner-page desktop_view">
        <section class="page-title text-center w-100">
            <h1 class="tss-text-black text-uppercase fs-40 my-0 tss-optima" data-aos="zoom-in" data-aos-duration="900">omniyat press release</h1>
            <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="600">{{$page_sub_title->sub_title}}</p>
        </section>

        <section class="w-100 mt-30 press_list">
            <div class="header-container">

                <div class="list_items pb-30 w-100 px-45">
                    <div class="row row-flex">
                        @if(count($press_release_data)>0)
                        @foreach($press_release_data as $prd)
                        <div class="col-sm-6 col-md-4" data-aos="fade-up" data-aos-duration="900">
                            <div class="item">
                                <a href="{{asset('press_release_details').'/'.$prd->id}}">
                                    <div class="image relative">
                                        <img src="{{asset($prd->thumb_image)}}" alt="press-release">
                                    </div>
                                    <div class="desc text-center">
                                        <div class="fs-10 tss-mr tss-text-black text-right m-0 mt-5">{{date('jS-M-Y', strtotime($prd->date))}}</div>
                                        <h2 class="tss-text-red fs-12 tss-mm tss-lh-1-4 mt-5">
                                            {{$prd->title}}
                                        </h2>
                                        <p class="text-black fs-10 tss-mr tss-lh-1-4">{{ strip_tags(substr($prd->short_description, 0, 110)) }}...</p>
                                    </div>
                                </a>
                                <ul id="colorNav">
                                    <li><a href="{{asset($prd->pdf_file)}}" target="_blank"><i class="icon-download"></i></a></li>
                                    <li><a href="{{asset('press_release_details').'/'.$prd->id}}"><i class="icon-read"></i></a></li>
                                    <li class="green"><a href=""><i class="icon-share"></i></a>
                                        <ul>
                                            <li><a href="http://www.facebook.com/sharer.php?u=http://caferoute66.com/omniyat/html/press-release-details-01.html" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="https://twitter.com/share?url=http://caferoute66.com/omniyat/html/press-release-details-01.html" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a> <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://caferoute66.com/omniyat/html/press-release-details-01.html" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i>
                                            </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </section>
        @include('website.layouts.footer')

    </div>
    <div class="inner-page mobile_view">
        <section class="page-title text-center w-100 my-30">
            <h1 class="tss-text-black text-uppercase fs-30 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">omniyat press release</h1>
            <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">{{$page_sub_title->sub_title}}</p>
        </section>

        <section class="page_content w-100 px-5 relative media_list_pages mt-10">
            <div class="slide-count"></div>
            <section class="newsfeed slider">
                @if(count($press_release_data)>0)
                @foreach($press_release_data as $prd)
                <div class="item_div">
                    <a href="{{asset('press_release_details').'/'.$prd->id}}" style="text-decoration: none;color: inherit;">
                        <div class="image same-height">
                            <img src="{{asset($prd->thumb_image)}}" alt="press-release">
                        </div>
                        <div class="desc px-15 pb-15">
                            <p class="fs-10 tss-msb mt-15 text-left text-black-50">POSTED {{date('jS-M-Y', strtotime($prd->date))}}</p>
                            <h2 class="fs-16 text-black tss-msb mt-0 mb-10  tss-lh-1-3">{{$prd->title}}</h2>
                            <p class="text-black tss-ml fs-14 tss-lh-1-5 my-10">{{ strip_tags(substr($prd->short_description, 0, 110)) }}...</p>
                        </div>
                    </a>
                    <div class="fixed_bottom" style="position: static;">
                        <div class="li">
                            <a href="{{asset($prd->pdf_file)}}" download class="text-center">
                                <i class="icon-download"></i>
                                <p class="fs-10 tss-msb">DOWNLOAD</p>
                            </a>
                        </div>
                        <div class="li">
                            <a href="{{asset('press_release_details').'/'.$prd->id}}" class="text-center">
                                <i class="icon-read"></i>
                                <p class="fs-10 tss-msb">READ MORE</p>
                            </a>
                        </div>
                        <div class="li share">
                            <a class="text-center m-share"><i class="icon-share"></i><p class="fs-10 tss-msb">SHARE</p></a>
                            <ul>
                                <li><a href="http://www.facebook.com/sharer.php?u=http://caferoute66.com/omniyat/html/articles-3.html" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="https://twitter.com/share?url=http://caferoute66.com/omniyat/html/articles-3.html" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a> <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://caferoute66.com/omniyat/html/articles-3.html" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a></li>
                            </ul>
                        </div>
                    </div> 
                </div>
                @endforeach
                @endif
            </section>

        </section>
        @include('website.layouts.mobile_footer')
    </div> 
    @endsection