@extends('website.layouts.layout')
@section('title','Portfolio List')
@section('pageContent')

<div class="inner-page desktop_view">
    <section class="page-title text-center w-100 m-30" style="padding: 10% 20% 10% 20%;">
        @if($status == true)
            <h3 class="tss-text-black fs-55 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">{{$message}}</h3>

        @else
            <h3 class="tss-text-black fs-55 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">{{$message}}</h3>

        @endif
        <div class="col-sm-12" data-aos="fade-down" data-aos-duration="300">
            <div class="loadmore_btn text-center py-30">
                <a href="{{route('site.home')}}" class="btn btn-link btn-red text-uppercase tss-msb py-10 px-45 my-5 fs-11" id="load_more_button">Home page</a>
            </div>
        </div>
    </section>
    @include('website.layouts.footer')
</div>
    
<div class="inner-page mobile_view" >
    <section class="page-title text-center w-100 my-30" style="padding: 10% 20% 10% 20%;">
        @if($status == true)
            <h3 class="tss-text-black fs-55 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">{{$message}}</h3>

        @else
            <h3 class="tss-text-black fs-55 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">{{$message}}</h3>
        @endif
        <div class="col-sm-12" data-aos="fade-down" data-aos-duration="300">
            <div class="loadmore_btn text-center py-30">
                <a href="{{route('site.home')}}" class="btn btn-link btn-red text-uppercase tss-msb py-10 px-45 my-5 fs-11" id="load_more_button">Home Page</a>
            </div>
        </div>
    </section>
    @include('website.layouts.mobile_footer')
</div> 
@endsection