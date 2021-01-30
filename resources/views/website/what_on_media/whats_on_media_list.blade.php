@extends('website.layouts.inner_layout')
@section('title',"What's On Media")
@section('pageContent')


    <div class="inner-page desktop_view">
        <section class="page-title text-center w-100">
            <h1 class="tss-text-black text-uppercase fs-40 my-0 tss-optima" data-aos="zoom-in" data-aos-duration="900">what’s on media</h1>
            <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="600">{{$page_sub_title->sub_title}}</p>
        </section>

        <section class="w-100 mt-30 press_list">
            <div class="header-container">

                <div class="list_items pb-30 w-100 px-45">
                    {{ csrf_field() }}
                    <div class="row row-flex" id="post_data"></div>
                </div>

            </div>
        </section>

        <div id="footer"></div>
    </div>

    <div class="inner-page mobile_view">
        <section class="page-title text-center w-100 my-30">
            <h1 class="tss-text-black text-uppercase fs-30 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">WHAT’S ON MEDIA</h1>
            <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">{{$page_sub_title->sub_title}}</p>
        </section>

        <section class="page_content w-100 px-5 relative media_list_pages mt-10">
            <div class="slide-count"></div>
            <section class="newsfeed slider">
                @if(count($whats_on_media_data)>0)
                @foreach($whats_on_media_data as $womd)
                <div class="item_div">
                    <a href="{{asset('whats_on_media_details').'/'.$womd->id}}" style="text-decoration: none;color: inherit;">
                        <div class="image same-height">
                            <img src="{{asset($womd->thumb_image)}}" alt="press-release">
                        </div>
                        <div class="desc px-15 pb-15">
                            <p class="fs-10 tss-msb mt-15 text-left text-black-50">{{date('jS-M-Y', strtotime($womd->date))}}</p>
                            <h2 class="fs-16 text-black tss-msb mt-0 mb-10  tss-lh-1-3">{{$womd->title}}</h2>
                            <p class="text-black tss-ml fs-14 tss-lh-1-5 my-10">{{ strip_tags(substr($womd->short_description, 0, 110)) }} ...</p>
                        </div>
                    </a>
                    <div class="fixed_bottom" style="position: static;">
                        <div class="li">
                            <a href="{{asset($womd->pdf_file)}}" download class="text-center">
                                <i class="icon-download"></i>
                                <p class="fs-10 tss-msb">DOWNLOAD</p>
                            </a>
                        </div>
                        <div class="li">
                            <a href="{{asset('whats_on_media_details').'/'.$womd->id}}" class="text-center">
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
    </div>

<script>
    $(document).ready(function(){

        var _token = $('input[name="_token"]').val();
        load_data('', _token);
        function load_data(id="", _token)
        {
            $.ajax({
                url:"{{ route('whats_on_media.load.more.data') }}",
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