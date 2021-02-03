@extends('website.layouts.inner_layout')
@section('title','Press Kit')
@section('pageContent')
    
<div class="inner-page desktop_view">
    <section class="page-title text-center w-100">
        <h1 class="tss-text-black text-uppercase fs-40 my-0 tss-optima" data-aos="fade-up" data-aos-duration="600">omniyat sponsorships</h1>
        <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">{{$page_sub_title->sub_title}}</p>
        
    </section>

    
    @if(count($sponsorships_categories) > 0)
      <section class="w-100 mt-30 sponsor_list">
          <div class="header-container">
              <div class="list_items pb-30 w-100 px-45">
                  <div class="row row-flex">
                    {{ csrf_field() }}
                    <div class="col-sm-12" data-aos="fade-up">
                        <section class="portfolio section">
                            @if(count($sponsorships_categories) > 0 && count($sponsorships_data) > 0)
                                <div class="filters">
                                    <ul>
                                        <li class="active text-uppercase fs-13 tss-mb" data-filter=".all">ALL</li>
                                        @foreach($sponsorships_categories as $category)
                                            @if(count($category->SponsorshipsDetails) > 0)
                                                <li data-filter=".category_{{strtolower(urlencode(str_replace(' ','_',$category->id)))}}" class="text-uppercase fs-13 tss-mb">{{$category->name}}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row filters-content" id="sponsorshipDataList">
                                
                            </div>
                        </section>

                    </div>
                  </div>
                  
              </div>
              
          </div>
      </section>
    @endif


</div>
<div class="inner-page mobile_view">
    <section class="page-title text-center w-100 my-30">
        <h1 class="tss-text-black text-uppercase fs-28 my-0 tss-optima mb-5" data-aos="fade-up" data-aos-duration="800">omniyat sponsorships</h1>
        <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">{{$page_sub_title->sub_title}}</p>
    </section>
    <section class="w-100 mt-30 press_detail">
        <div class="header-container">
            
            <h2 class="tss-text-black text-uppercase fs-20 my-0 tss-msb text-center" data-aos="fade-up" data-aos-duration="600" style="margin-top: 50px;margin-bottom: 220px;">COMING SOON</h2>
            
            
        </div>
    </section>

</div>  
<script>
    $(document).ready(function(){

        var _token = $('input[name="_token"]').val();
        load_data('', _token);
        function load_data(id="", _token){
            $.ajax({
                url:"{{ route('sponsorship.load.more.data') }}",
                method:"POST",
                data:{id:id, _token:_token},
                success:function(data)
                {
                    $('#loadmoreBtnBox').remove();
                    //$('#load_more_button').remove();
                    $('#sponsorshipDataList').append(data);
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
@endsection