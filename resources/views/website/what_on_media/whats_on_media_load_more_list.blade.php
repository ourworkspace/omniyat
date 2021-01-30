@foreach($whats_on_media_data as $key => $womd)
    <div class="col-sm-6 col-md-4" data-aos="fade-up" data-aos-duration="900">
        <div class="item">
            <a href="{{asset('whats_on_media_details').'/'.$womd->id}}">
                <div class="image relative">
                    <img src="{{asset($womd->thumb_image)}}" alt="press-release">
                </div>
                <div class="desc text-center">
                    <div class="fs-10 tss-mr tss-text-black text-right m-0 mt-5">{{date('jS-M-Y', strtotime($womd->date))}}</div>
                    <h2 class="tss-text-red fs-12 tss-mm tss-lh-1-4 mt-5">
                        {{$womd->title}}
                    </h2>
                    <p class="text-black fs-10 tss-mr tss-lh-1-4">{{ strip_tags(substr($womd->short_description, 0, 110)) }}  ...</p>
                </div>
            </a>
            <ul id="colorNav">
                <li><a href="{{asset($womd->pdf_file)}}" download><i class="icon-download"></i></a></li>
                <li><a href="{{asset('whats_on_media_details').'/'.$womd->id}}"><i class="icon-read"></i></a></li>
                <li class="green"><a href=""><i class="icon-share"></i></a>
                    <ul>
                        <li><a href="http://www.facebook.com/sharer.php?u=http://caferoute66.com/omniyat/html/articles-2.html" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="https://twitter.com/share?url=http://caferoute66.com/omniyat/html/articles-2.html" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a> <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://caferoute66.com/omniyat/html/articles-2.html" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    @php
        @$last_id = $womd->id;
    @endphp
@endforeach

@if($limit == count($whats_on_media_data))
    <div class="col-sm-12" data-aos="fade-down" data-aos-duration="300" id="loadmoreBtnBox">
        <div class="loadmore_btn text-center py-30">
            <a class="btn btn-link btn-red text-uppercase tss-msb py-10 px-45 my-5 fs-11" data-id="{{$last_id}}" id="load_more_button">Load more</a>
        </div>
    </div>
@else
 
@endif