<section class="portfolio section">
    @if(count($sponsorships_categories) > 0 && count($sponsorships_data) > 0)
        <div class="filters">
            <ul>
                <li class="active text-uppercase fs-13 tss-mb" data-filter=".all">ALL</li>
                @foreach($sponsorships_categories as $category)
                    <li data-filter=".category_{{strtolower(urlencode(str_replace(' ','_',$category->id)))}}" class="text-uppercase fs-13 tss-mb">{{$category->name}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="filters-content">
        <div class="row grid_div">
            @foreach($sponsorships_data as $sponsorshipdata)
                <?php //print_r($sponsorshipdata); ?>
                <div class="col-sm-4 px-5 all category_{{strtolower(urlencode(str_replace(' ','_',$sponsorshipdata->category_id)))}}">
                    <div class="item w-100">
                        <div class="image w-100 relative">
                            <a href="sponsor-details.html"><img src="{{asset($sponsorshipdata->thumb_image)}}" alt="Work 1" class="w-100"></a>
                            <div class="labal text-uppercase text-black fs-10 tss-mm">{{$sponsorshipdata->category_name}}</div>
                            <div class="icon"><a href="sponsor-details.html#{{strtolower(urlencode(str_replace(' ','_',$category->name)))}}"><img src="{{asset('public/site/img/icons/gallery-icon.png')}}"></a></div>
                        </div>

                        <div class="desc">
                            <span class="tss-mm fs-10 tss-text-red text-right w-100 mb-10 text-uppercase">30<sup>th</sup> dec 2020</span>
                            <h5 class="tss-optima fs-16 tss-lh-1-2 text-black">{{$sponsorshipdata->title}}</h5>
                            <p class="tss-mr fs-12 text-black">{{$sponsorshipdata->short_description}}</p>
                            <p class="text-right mb-0"><a href="sponsor-details.html" class="tss-mb fs-11 text-black text-uppercase">explore more <span class="tss-text-red">➔</span></a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        
    </div>
</section>

<div class="row">
    <div class="col-sm-12" data-aos="fade-down" data-aos-duration="300">
        <div class="loadmore_btn text-center py-30">
            <button type="submit" class="btn btn-link btn-red text-uppercase tss-msb py-10 px-45 my-5 fs-11">Load more</button>
        </div>
    </div>
</div>

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
</script>    
<script>
        $(function(){
            $('filters ul li').click(function(){
                $('filters ul li.active').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>