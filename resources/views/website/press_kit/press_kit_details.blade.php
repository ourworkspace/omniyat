@extends('website.layouts.inner_layout')
@section('title','Press Kit')
@section('pageContent')


<div class="inner-page mobile_view media_list_pages">
    <section class="page-title text-center w-100 mt-30">
        <h1 class="tss-text-black text-uppercase fs-24 my-0 tss-optima mb-10">{{$pkd->name}}</h1>
    </section>

    <div class="list_items m_presskit_list w-100 mb-100 m_presskit_details">
        <div class="item">
            <div class="image relative">
                <img src="{{asset($pkd->thumb_image)}}" alt="press-kit">
            </div>
            <div class="desc text-center">
                <p class="text-black fs-14 tss-mr tss-lh-1-4">{{$pkd->title}}</p>
            </div>
        </div>
    </div>
    <div class="fixed_bottom">
        <div class="li">
            <a href="press-kit.html" class="text-center">
                <i class="icon-assets"></i>
                <p class="fs-10 tss-msb">ALL ASSETS</p>
            </a>
        </div>
        <div class="li">
            <a href="{{asset($pkd->pdf_file)}}" download class="text-center">
                <i class="icon-download"></i>
                <p class="fs-10 tss-msb">Download</p>
            </a>
        </div>
        <div class="li share">
            <a class="text-center m-share">
                <i class="icon-share"></i>
                <p class="fs-10 tss-msb">SHARE</p>
            </a>
            <ul>
                <li>
                    <a href="http://www.facebook.com/sharer.php?u=http://caferoute66.com/omniyat/html/press-kit-detail-omniyat-pk-01.html" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
                    <a href="https://twitter.com/share?url=http://caferoute66.com/omniyat/html/press-kit-detail-omniyat-pk-01.html" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a> 
                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://caferoute66.com/omniyat/html/press-kit-detail-omniyat-pk-01.html" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
    </div>
    @include('website.layouts.footer')
</div>
    
@endsection