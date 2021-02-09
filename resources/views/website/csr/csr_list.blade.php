@extends('website.layouts.inner_layout')
@section('title','Csr List')
@section('pageContent')
    
<div class="inner-page desktop_view">
    <section class="page-title text-center w-100">
        <h1 class="tss-text-black text-uppercase fs-40 my-0 tss-optima" data-aos="fade-up" data-aos-duration="600">omniyat’s CSR</h1>
        <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">{{$page_sub_title->sub_title}}</p>
    </section>

    <section class="w-100 mt-30 csr_list">
        <div class="header-container">
            <div class="list_items pb-30 w-100 px-45">
                {{ csrf_field() }}
                <div class="row row-flex" id="post_data"></div>
            </div>
            
        </div>
    </section>
    @include('website.layouts.footer')
</div>

<div class="inner-page mobile_view">
    <section class="page-title text-center w-100 my-30">
        <h1 class="tss-text-black text-uppercase fs-30 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">omniyat’s CSR</h1>
        <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">{{$page_sub_title->sub_title}}</p>
    </section>
    <!--<section class="w-100 mt-30 press_detail">
        <div class="header-container">
            
            <h2 class="tss-text-black text-uppercase fs-20 my-0 tss-msb text-center" data-aos="fade-up" data-aos-duration="600" style="margin-top: 50px;margin-bottom: 220px;">COMING SOON</h2>
            
            
        </div>
    </section>-->
    @if(count($csr_data) > 0)
        <section class="page_content w-100 px-5 relative media_list_pages mt-10">
            <div class="slide-count"></div>
            <section class="newsfeed slider">
                @foreach($csr_data as $key => $csrvaule)
                    <div class="item_div">
                        <a href="{{route('site.csr.details',['id'=>$csrvaule->id])}}" style="text-decoration: none;color: inherit;">
                            <div class="image same-height">
                                <img src="{{asset($csrvaule->thumb_image)}}" alt="csr">
                            </div>
                            <div class="desc px-15 pb-15">
                                <p class="fs-10 tss-msb mt-15 text-left text-black-50">{{strtoupper(date('d M Y', strtotime($csrvaule->date)))}}</p>
                                <h2 class="fs-16 text-black tss-msb mt-0 mb-10  tss-lh-1-3">{{$csrvaule->title}}</h2>
                                <p class="text-black tss-ml fs-14 tss-lh-1-5 my-10">{{$csrvaule->short_description}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </section>
            <div class="fixed_bottom">
                <div class="li">
                    <a href="{{  (!empty($csrvaule->pdf_file) && file_exists($csrvaule->pdf_file)) ? asset($csrvaule->pdf_file) : 'javascript:0;' }}" class="text-center">
                        <i class="icon-download"></i>
                        <p class="fs-10 tss-msb">DOWNLOAD</p>
                    </a>
                </div>
                <div class="li">
                    <a href="{{route('site.csr.details',['id'=>$csrvaule->id])}}" class="text-center">
                        <i class="icon-read"></i>
                        <p class="fs-10 tss-msb">READ MORE</p>
                    </a>
                </div>
                <div class="li">
                    <a href="" class="text-center">
                        <i class="icon-share"></i>
                        <p class="fs-10 tss-msb">SHARE</p>
                    </a>
                </div>
            </div>
        </section>
    @else
        <section class="w-100 mt-30 press_detail">
            <div class="header-container">
                
                <h2 class="tss-text-black text-uppercase fs-20 my-0 tss-msb text-center" data-aos="fade-up" data-aos-duration="600" style="margin-top: 50px;margin-bottom: 220px;">No Data Found</h2>
                
            </div>
        </section>
    @endif
    @include('website.layouts.mobile_footer')
</div>

<script>
    $(document).ready(function(){

        var _token = $('input[name="_token"]').val();
        load_data('', _token);
        function load_data(id="", _token)
        {
            $.ajax({
                url:"{{ route('csr.load.more.data') }}",
                method:"POST",
                data:{id:id, _token:_token},
                success:function(data)
                {
                    $('#load_more_button').remove();
                    $('#post_data').append(data);
                }
            })
        }

        $(document).on('click', '#load_more_button', function(){
            var id = $(this).data('id');
            $('#load_more_button').html('<b>Loading...</b>');
            $("#loadmoreBtnBox").remove();
            load_data(id, _token);
        });

    });
</script>
@endsection
