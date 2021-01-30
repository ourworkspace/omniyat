<div class="col-md-12" data-aos="fade-up" data-aos-duration="900">
    <div class="whatsNew w-100">

        <div class="whatsNewList w-100">
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
                                    <a href="whatsnew-detail-01.html" class="readmore_link">Read More <span>➜</span></a>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @php
                    @$last_id = $wnd->id;
                @endphp
            @endforeach
        </div>
    </div>
</div>

@if($limit == count($whats_new_data))
    <div class="col-sm-12" data-aos="fade-down" data-aos-duration="300" id="loadmoreBtnBox">
        <div class="loadmore_btn text-center py-30">
            <a class="btn btn-link btn-red text-uppercase tss-msb py-10 px-45 my-5 fs-11" data-id="{{$last_id}}" id="load_more_button">Load more</a>
        </div>
    </div>
@else
 
@endif