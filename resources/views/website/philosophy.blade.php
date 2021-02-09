@extends('website.layouts.layout')
@section('title','Philosophy')
@section('pageContent')
    
    <div class="inner-page desktop_view" >
        <div class="company_philosophy">
            <section class="page-title text-center w-100">
                <h1 class="tss-text-black text-uppercase fs-55 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">Philosophy</h1>
                <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">{{$philosophy_data->sub_title}}</p>
                
            </section>
            <section class="w-100 px-30 pb-45">
                <div class="container ">
                    <div class="row py-45 row-display-flex-center p_one">
                        <div class="col-md-6 px-45 philosophy_omn d_description" data-aos="fade-right" data-aos-duration="900">
                            {!!$philosophy_data->description_1 !!}
                        </div>
                        <div class="col-md-6 pl-30" data-aos="fade-left" data-aos-duration="900">
                            <div class="image">
                                <img src="{{asset($philosophy_data->image_1)}}" class="w-100">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="w-100 px-30 pt-10">
                <div class="container relative">
                    <div class="col-md-4 philosophy_omniyat" data-aos="fade-right" data-aos-duration="900">
                        <div class="image">
                            <img src="{{asset($philosophy_data->image_2_1)}}"  alt="philosophy" class="image_omniyat">
                        </div>
                    </div>
                    <div class="col-md-5 px-30 philosophy_omniyat_desc py-30 d_description" data-aos="fade-up" data-aos-duration="900">
                        {!! $philosophy_data->description_2 !!}
                    </div>
                    <div class="col-md-4 philosophy_omniyat_sm_img" data-aos="fade-left" data-aos-duration="900">
                        <div class="image">
                            <img src="{{asset($philosophy_data->image_2_2)}}"  alt="philosophy" class="image_omniyat">
                        </div>
                    </div>
                    <div class="vertical_line"></div>
                </div>
            </section>
            <section class="w-100 px-30 p_one_desc">
                <div class="header-container">
                    <div class="row pt-45 row-display-flex-center">
                        <div class="col-md-6 pr-45 left" data-aos="fade-right" data-aos-duration="900">
                            <h1 class="tss-text-black text-uppercase fs-65 my-30 tss-optima pl-45" data-aos="fade-right"
                            data-aos-duration="900">
                                <!-- <span>Invest</span><br>
                                <span>Manage</span><br>
                                <span>Develop</span> -->
                                {!! str_replace(',', ' ', $philosophy_data->title_3) !!}
                            </h1>
                        </div>
                        <div class="col-md-6 pl-30 right d_description" data-aos="fade-left" data-aos-duration="900">
                            {!! $philosophy_data->description_3 !!}
                        </div>
                    </div>
                </div>
            </section>
            <div class="vertical_line_bottom"></div>

            <section class="philosophy_learn_section text-center w-100 py-30">
                <div>
                    <p class="philosophy_learn fs-13 tss-mb tss-lh-1-3 text-uppercase mt-15">{{$philosophy_data->title_4_1}}</p>
                    <p class="philosophy_learn fs-13 tss-mb tss-lh-1-3 text-uppercase mt-0">{{$philosophy_data->title_4_2}}</p>
                </div>
                @if($philosophy_data->button_text != '' && $philosophy_data->button_url != '')
                <div class="my-30">
                    <a href="{{trim($philosophy_data->button_url)}}" class="btn btn-red-bg btn-auto text-uppercase tss-mb">{{$philosophy_data->button_text}}</a>
                </div>
                @endif
            </section>
        </div>
        @include('website.layouts.footer')
    </div>
    
    <div class="inner-page mobile_view" >
        <section class="page-title text-center w-100 my-30">
            <h1 class="tss-text-black text-uppercase fs-32 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">Philosophy</h1>
            <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">{{$philosophy_data->sub_title}}</p>
        </section>
        <div class="w-100 full-image mb-20" data-aos="fade-up">
            <img src="{{asset($philosophy_data->image_1)}}" class="w-100">
        </div>
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-12 px-20 m_description">
                    {!!$philosophy_data->description_1 !!}
                </div>
            </div>
        </div>
        <div class="w-100 full-image mb-20" data-aos="fade-up">
            <img src="{{asset($philosophy_data->image_2_1)}}" class="w-100">
        </div>
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-12 px-20 m_description">
                    {!!$philosophy_data->description_2 !!}
                </div>
            </div>
        </div>
        <div class="w-100 full-image my-20" data-aos="fade-up">
            <img src="{{asset($philosophy_data->image_2_2)}}" class="w-100">
        </div>
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-12 px-20">
                    <h2 class="tss-text-black text-uppercase fs-34 my-10 tss-optima text-center tss-lh-1-4">
                        test {!! str_replace(',', '<br>', $philosophy_data->title_3) !!}</h2>
                    <div class="m_description">{!!$philosophy_data->description_3 !!}</div>
                </div>
            </div>
        </div>
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="tss-text-black fs-16 my-10 tss-mb text-center tss-lh-1-4 my-30">{{$philosophy_data->title_4_1}} {{$philosophy_data->title_4_2}}</h2>
                    @if($philosophy_data->button_text != '' && $philosophy_data->button_url != '')
                    <div class="row">
                        <div class="col-xs-10 col-xs-10 col-centered">
                            <a href="{{trim($philosophy_data->button_url)}}}" class="btn btn-link btn-red btn-block text-uppercase tss-msb py-15 my-5 fs-15 mb-30">{{$philosophy_data->button_text}}</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @include('website.layouts.footer')
    </div>
    @endsection