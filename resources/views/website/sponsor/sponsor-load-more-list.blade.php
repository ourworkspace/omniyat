
<div class="grid_div">
    @foreach($sponsorships_data as $sponsorshipdata)
        <?php //print_r($sponsorshipdata); ?>
        <div class="col-sm-4 px-5 all category_{{strtolower(urlencode(str_replace(' ','_',$sponsorshipdata->category_id)))}}">
            <div class="item w-100">
                <div class="image w-100 relative">
                    <a href="{{route('site.sponsorships.details',['id'=>$sponsorshipdata->id])}}"><img src="{{asset($sponsorshipdata->thumb_image)}}" alt="Work 1" class="w-100"></a>
                    <div class="labal text-uppercase text-black fs-10 tss-mm">{{$sponsorshipdata->category_name}}</div>
                    <div class="icon"><a href="{{route('site.sponsorships.details',['id'=>$sponsorshipdata->id])}}#{{strtolower(urlencode(str_replace(' ','_',$sponsorshipdata->category_name)))}}"><img src="{{asset('public/site/img/icons/gallery-icon.png')}}"></a></div>
                </div>

                <div class="desc">
                    <span class="tss-mm fs-10 tss-text-red text-right w-100 mb-10 text-uppercase">{!! htmlspecialchars_decode(date('j<\s\up>S</\s\up> M Y', strtotime($sponsorshipdata->date))) !!}</span>
                    <h5 class="tss-optima fs-16 tss-lh-1-2 text-black">{{$sponsorshipdata->title}}</h5>
                    <p class="tss-mr fs-12 text-black">{{$sponsorshipdata->short_description}}</p>
                    <p class="text-right mb-0"><a href="{{route('site.sponsorships.details',['id'=>$sponsorshipdata->id])}}" class="tss-mb fs-11 text-black text-uppercase">explore more <span class="tss-text-red">➔</span></a></p>
                </div>
            </div>
        </div>
        @php
            @$last_id = $sponsorshipdata->id;
        @endphp
    @endforeach
</div>

    @if(count($sponsorships_data) == $limit)
        <!-- <div class="row"> -->
            <div class="col-sm-12" data-aos="fade-down" data-aos-duration="300" id="loadmoreBtnBox">
                <div class="loadmore_btn text-center py-30">
                    <a class="btn btn-link btn-red text-uppercase tss-msb py-10 px-45 my-5 fs-11" data-id="{{$last_id}}" id="load_more_button">Load more</a>
                </div>
            </div>
        <!-- </div> -->
    @endif
<script src='https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js'></script> 
<script>
    $('.filters ul li').click(function(){
      $('.filters ul li.active').removeClass('active');
      $(this).addClass('active');
      var data = $(this).attr('data-filter');
      $grid.isotope({
        filter: data
      })
    });

    var $grid = $(".grid_div").isotope({
      itemSelector: ".all",
      percentPosition: true,
      masonry: {
        columnWidth: ".all"
      }
    })    

    $(function(){
        $('filters ul li').click(function(){
            $('filters ul li.active').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>