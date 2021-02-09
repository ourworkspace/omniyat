@extends('website.layouts.inner_layout')
@section('title','Csr details')
@section('pageContent') 
    
<div class="inner-page desktop_view">
    <section class="page-title text-center w-100 pb-30">
        <h1 class="tss-text-black text-uppercase fs-40 my-0 tss-optima" data-aos="fade-up" data-aos-duration="600">omniyat’s CSR</h1>
        <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">{{$page_sub_title->sub_title}}</p>
        
    </section>
    
    <section class="w-100 mt-30 press_detail csr_details">
        <div class="header-container">
            <div class="list_items w-100 px-30">
                <div class="row pb-30">
                    <div class="col-md-12">
                        <ol class="breadcrumb omniyat" data-aos="fade-up">
                            <li class="breadcrumb-item"><a class="white-text" href="javascript:void(0)">Media</a></li>
                            <li class="breadcrumb-item"><a class="white-text" href="{{route('site.csr')}}">CSR</a></li>
                            <li class="breadcrumb-item active">Description</li>
                        </ol>
                    </div>
                </div>
                <div class="row pb-15">
                    <div class="col-md-4" data-aos="fade-right">
                        <p class="text-left"><span class="fs-12 text-black tss-mm text-uppercase">{{strtoupper(date('d', strtotime($csrd->date)))}}<sup>
                                @if(date('d', strtotime($csrd->date)) == 1) rd @elseif(date('d', strtotime($csrd->date)) == 2) nd @elseif(date('d', strtotime($csrd->date)) == 2) rd @else th @endif
                                </sup> {{strtoupper(date('M Y', strtotime($csrd->date)))}}</span></p>
                    </div>
                    <div class="col-md-8" data-aos="fade-left">
                        <ul class="custom_btns mt-0 text-right">
                            <li><a class="btn" href="{{  (!empty($csrd->pdf_file) && file_exists($csrd->pdf_file)) ? asset($csrd->pdf_file) : 'javascript:0;' }}" target="_blank"><span><i class="icon-download"></i></span>Download</a></li>
                            <li><a class="btn" href="javascript:0;"><span><i class="icon-share"></i></span>Share</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row row-display-flex-center pb-30">
                    <div class="col-md-6 pr-30" data-aos="fade-right" data-aos-duration="900">
                        <h2 class="fs-28 tss-text-red tss-optima mt-5 mb-15">{{$csrd->title}}</h2>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">{{$csrd->short_description}}</p>
                    </div>
                    <div class="col-md-6" data-aos="fade-left" data-aos-duration="900">
                        <div class="image">
                            <img src="{{asset($csrd->large_image)}}" alt="press-details">
                        </div>
                    </div>
                </div>
                <div class="row row-display-flex-center pb-30">
{{--                    <div class="col-md-6" data-aos="fade-right" data-aos-duration="900">--}}
{{--                        <div class="image">--}}
{{--                            <img src="{{asset($csrd->large_image)}}" alt="press-details">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-md-12 pl-30" data-aos="fade-left" data-aos-duration="900">
                        {{--<p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis</p>--}}
                        {{--<p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">Lipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>--}}
                        <?php echo $csrd->long_description; ?>

                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    @if(count($csr_data) > 0)
        <section class="w-100 mt-30 press_list">
            <hr style="max-width: 46%;margin: 20px auto 0;">
            <section class="page-title text-center w-100 pb-15 pt-45">
                <h1 class="tss-text-black text-uppercase fs-40 my-0 tss-optima">similar events</h1>
            </section>
            <div class="header-container">
                <div class="list_items pb-45 w-100 px-45">
                    <div class="row row-flex pb-45">
                        @foreach($csr_data as $csrvaule)
                            <div class="col-sm-6 col-md-4" data-aos="fade-up" data-aos-duration="900">
                                <div class="item">
                                    <a href="{{route('site.csr.details',['id'=>$csrvaule->id])}}">
                                        <div class="image relative">
                                            <img src="{{asset($csrvaule->thumb_image)}}" alt="csr_smilar_list">
                                        </div>
                                        <div class="desc text-center">
                                            <h2 class="tss-text-red fs-12 tss-mm tss-lh-1-4">
                                                {{$csrvaule->title}}
                                            </h2>
                                            <p class="text-black fs-10 tss-mr tss-lh-1-4">{{$csrvaule->short_description}}...</p>
                                        </div>
                                    </a>
                                    <ul>
                                        <li><a href="{{  (!empty($csrvaule->pdf_file) && file_exists($csrvaule->pdf_file)) ? asset($csrvaule->pdf_file) : 'javascript:0;' }}" target="_blank"><i class="icon-download"></i></a></li>
                                        <li><a href="{{route('site.csr.details',['id'=>$csrvaule->id])}}"><i class="icon-read"></i></a></li>
                                        <li><a href=""><i class="icon-share"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>
    @endif
    @include('website.layouts.footer')
</div>
<div class="inner-page mobile_view  media_list_pages">
    <section class="page-title text-center w-100 my-30">
        <h1 class="tss-text-black text-uppercase fs-30 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">omniyat’s CSR</h1>
        <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">Our Corporate Social Responsibility</p>
    </section>
    <section class="page_content w-100 px-5 relative">
        <ol class="breadcrumb omniyat w-100">
            <li class="breadcrumb-item"><a class="white-text" href="{{route('site.home')}}">Home</a></li>
            <li class="breadcrumb-item"><a class="white-text" href="{{route('site.csr')}}">Media</a></li>
            <li class="breadcrumb-item active">CSR</li>
        </ol>
        <div class="image w-100 mt-5 relative">
            <img src="{{asset($csrd->large_image)}}" alt="detail" class="w-100">
        </div>
        <p class="w-100 mb-15 pb-15">
            <span class="fs-11 pull-right text-black-50 tss-msb mt-5">{{strtoupper(date('d M Y', strtotime($csrd->date)))}}</span>
        </p>
        <div class="desc py-15 px-15">
            <h2 class="fs-18 text-black tss-msb mt-15 pb-15 tss-lh-1-3">{{$csrd->title}}</h2>
            <p class="text-black tss-mr fs-14 tss-lh-1-7 mb-10">{{$csrd->short_description}}</p>
            <!--<div class="image w-100 my-10 relative">
                <img src="img/csr/detail-02.jpg" alt="detail" class="w-100">
            </div> -->
            <?php echo $csrd->long_description; ?>
            <hr>
        </div>
    </section>
    @if(count($csr_data) > 0)
        <section class="m_similar_events press_list mb-100 w-100">
            <section class="page-title text-center w-100 my-30 ">
                <h1 class="tss-text-black text-uppercase fs-30 my-0 tss-optima">similar events</h1>
            </section>
            <section class="similar_evnts slider list_items px-5 w-100">
                @foreach($csr_data as $csrvaule)
                    <div class="item">
                        <a href="{{route('site.csr.details',['id'=>$csrvaule->id])}}">
                            <div class="image relative">
                                <img src="{{asset($csrvaule->thumb_image)}}" alt="csr_smilar_list">
                            </div>
                            <div class="desc text-center">
                                <h2 class="tss-text-red fs-12 tss-mm tss-lh-1-4">
                                    {{$csrvaule->title}}
                                </h2>
                                <p class="text-black fs-10 tss-mr tss-lh-1-4">{{substr($csrd->short_description,0, 100)}}...</p>
                            </div>
                        </a>
                        <ul>
                            <li><a href="{{  (!empty($csrvaule->pdf_file) && file_exists($csrvaule->pdf_file)) ? asset($csrvaule->pdf_file) : 'javascript:0;' }}" target="_blank"><i class="icon-download"></i></a></li>
                            <li><a href="{{route('site.csr.details',['id'=>$csrvaule->id])}}"><i class="icon-read"></i></a></li>
                            <li><a href=""><i class="icon-share"></i></a></li>
                        </ul>
                    </div>
                @endforeach
            </section>
        </section>
    @endif
    <div class="fixed_bottom fixed_bottom-2col">
        <div class="li">
            <a href="{{route('site.csr')}}" class="text-center">
                <i class="icon-back"></i>
                <p class="fs-10 tss-msb">ALL EVENTS</p>
            </a>
        </div>
        <div class="li">
            <a href="" class="text-center">
                <i class="icon-share_new"></i>
                <p class="fs-10 tss-msb">SHARE</p>
            </a>
        </div>
    </div>
    @include('website.layouts.footer')
</div>
    
@endsection