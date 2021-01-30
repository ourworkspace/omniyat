@foreach($csr_data as $key => $csrvaule)
    <div class="col-sm-12 mb-5" data-aos="fade-up">
        <div class="item">
            <div class="image relative">
                <a href="{{route('site.csr.details',['id'=>$csrvaule->id])}}">
                    <img src="{{asset($csrvaule->thumb_image)}}" alt="csr">
                </a>
            </div>
            <div class="desc text-left">
                <a href="{{route('site.csr.details',['id'=>$csrvaule->id])}}">
                    <h2 class="tss-text-red fs-14 tss-mm tss-lh-1-4 mb-5">{{$csrvaule->title}}</h2>
                    <p class="text-black fs-11 tss-mr tss-lh-1-4 mb-0">{{$csrvaule->short_description}}..</p>
                </a>
                <div class="btm-details">
                    <span class="tss-mr fs-11 text-black">{{strtoupper(date('d M Y', strtotime($csrvaule->date)))}}</span>
                    <ul class="pull-right">
                        <li><a href="{{  (!empty($csrvaule->pdf_file) && file_exists($csrvaule->pdf_file)) ? asset($csrvaule->pdf_file) : 'javascript:0;' }}" target="_blank" title="Download"><i class="icon-download"></i></a></li>
                        <li><a href="{{route('site.csr.details',['id'=>$csrvaule->id])}}" title="Read"><i class="icon-read"></i></a></li>
                        <li><a href="" title="Share"><i class="icon-share"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @php
        @$last_id = $csrvaule->id;
    @endphp
@endforeach

@if($limit == count($csr_data))
    <div class="col-sm-12" data-aos="fade-down" data-aos-duration="300" id="loadmoreBtnBox">
        <div class="loadmore_btn text-center py-30">
            <a class="btn btn-link btn-red text-uppercase tss-msb py-10 px-45 my-5 fs-11" data-id="{{$last_id}}" id="load_more_button">Load more</a>
        </div>
    </div>
@else
 
@endif