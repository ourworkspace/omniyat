@extends('website.layouts.layout')
@section('title','About Omniyat')
@section('pageContent')
    
    <div class="inner-page desktop_view">
        <section class="w-100 mt-30 about_company">
            <div class="header-container">
                <div class="list_items w-100 px-30">
                    <div class="row">

                        <div class="col-md-6 pr-45 mr-auto pt-45" data-aos="fade-right" data-aos-duration="900">
                            <div>
                                <h1 class="tss-text-black text-uppercase fs-40 my-0 tss-optima mb-0">About Omniyat</h1>
                                <p class="tss-text-red text-uppercase fs-12 tss-mr mb-30">{{ $about_data->sub_title }}</p>
                                <div class="d_description">
                                {!! $about_data->description !!}
                                </div>
                            </div>
                            @if($about_data->button_text!='' && $about_data->button_url !='')
                            <div class="my-30">
                                <a href="{{ $about_data->button_url }}" class="btn btn-red-bg btn-auto text-uppercase tss-msb px-45 py-15 fs-12">{{ $about_data->button_text }}</a>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6 pl-45" data-aos="fade-left" data-aos-duration="900">
                            <div class="image ">
                                <img src="{{asset($about_data->image)}}" alt="about-omniyat">
                            </div>
                            <div class="image_text text-uppercase text-black fs-8 tss-mm">
                                {{ $about_data->image_text }}
                            </div>
                        </div>
                    </div>
                    <div class="row py-20">
                        <div>
                            <ol class="breadcrumb omniyat">
                                <li class="breadcrumb-item"><a class="white-text" href="#">Company</a></li>
                                <li class="breadcrumb-item active">About Omniyat</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('website.layouts.footer')
    </div>
    
    <div class="inner-page mobile_view">
        <section class="page-title text-center w-100 my-30">
            <h1 class="tss-text-black text-uppercase fs-32 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">about omniyat</h1>
            <p class="tss-text-red text-uppercase fs-12 tss-mr ls-2" data-aos="fade-up" data-aos-duration="900">story with the history</p>
        </section>
        <section class="w-100 px-5 m_about_omniyat">
            <section class="newsfeed slider">
                <div class="item_div">
                    <div class="image">
                        <img src="{{asset($about_data->image)}}" alt="about">
                    </div>
                </div>
            </section>
        </section>
        <section class="w-100 p-20">
            <div class="m_description">{!! $about_data->description !!}</div>
            <div class="my-30">
                <a href="{{ $about_data->button_url }}" class="btn btn-red-bg btn-auto text-uppercase tss-msb px-45 py-15 fs-15">{{ $about_data->button_text }}</a>
            </div>
        </section>

    </div>
    
@endsection