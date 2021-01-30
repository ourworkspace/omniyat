@extends('website.layouts.inner_layout')
@section('title','Leadership')
@section('pageContent')
    
<div class="inner-page desktop_view">
    <section class="w-100 mt-30 press_detail company-leadership">
        <div class="header-container">
            @if(isset($leadership_data->image))
            <div class="list_items w-100 px-30">
                <div class="row row-display-flex-center">
                    <div class="col-md-5" data-aos="fade-right" data-aos-duration="900">
                        <div class="image">
                            <img src="{{asset($leadership_data->image)}}" alt="company-leadership">
                        </div>
                    </div>
                    <div class="col-md-7" data-aos="fade-left" data-aos-duration="900">
                        <h2 class="fs-40 tss-text-red tss-optima mt-5 mb-5">{{$leadership_data->leadership_name}}</h2>
						<h3 class="fs-16 text-black tss-msb mt-5 mb-15 text-uppercase">{{$leadership_data->leadership_designation}}</h3>
                        @if(strlen($leadership_data->long_description) > 900)
                            <div id="less_data" class="d_description">{!! substr($leadership_data->long_description, 0, 900) !!}...
                                <details>
                            <summary>
                                <span id="more_data_btn" class="tss-msb fs-14 text-black text-uppercase">Read more</span></summary></details>
                            </div>
                            <div id="more_data" class="d_description" style="display: none">{!! $leadership_data->long_description !!}
                                <details>
                            <summary>
                                <span id="less_data_btn" class="tss-msb fs-14 text-black text-uppercase ">Read Less</span></summary></details>
                            </div>
                        @else
                            <div class="d_description">{!! $leadership_data->long_description !!}</div>
                        @endif

                    </div>
                </div>
                <div class="row py-20 pt-45">
                    <div class="col-md-6">
                        <ol class="breadcrumb omniyat">
                            <li class="breadcrumb-item"><a class="white-text" href="#">Teams</a></li>
                            <li class="breadcrumb-item active">{{$leadership_data->leadership_name}}</li>
                        </ol>
                    </div>
                    <div class="col-md-6">
                        <p class="text-right">
                            @if(isset($previous_leadership->id))
                            <a href="{{asset('leadership')}}?id={{$previous_leadership->id}}" class="fs-11 tss-mb text-uppercase text-black"><span class="tss-text-red">←</span> Previous </a>  &nbsp;&nbsp;  
                            @endif
                            @if(isset($next_leadership->id))
                            <a href="{{asset('leadership')}}?id={{$next_leadership->id}}" class="fs-11 tss-mb text-uppercase text-black" style="text-decoration: none; border-bottom: 1px solid #c92136;">{{$next_leadership->leadership_name}} <span class="tss-text-red">→</span></a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
    
    
</div>

<div class="inner-page mobile_view">
    @if(isset($leadership_data->image))
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="image team_img">
                    <img src="{{asset($leadership_data->image)}}" alt="company-leadership" class="w-100">
                </div> 
                <div class="w-100 text-center">
                    <h2 class="tss-text-red fs-30 tss-mr mt-0">{{$leadership_data->leadership_name}}</h2>
					<h3 class="fs-12 text-black tss-msb mt-5 mb-15 text-uppercase">{{$leadership_data->leadership_designation}}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-15">
        <div class="row">
            <div class="col-md-12 pb-30 px-20">
                {{$leadership_data->leadership_designation}}</h3>
                        @if(strlen($leadership_data->long_description) > 300)
                            <div id="less_data" class="m_description">{!! substr($leadership_data->long_description, 0, 300) !!}...
                                <details>
                            <summary>
                                <span id="more_data_btn" class="tss-msb fs-14 text-black text-uppercase">Read more</span></summary></details>
                            </div>
                            <div id="more_data" class="m_description" style="display: none">{!! $leadership_data->long_description !!}
                                <details>
                            <summary>
                                <span id="less_data_btn" class="tss-msb fs-14 text-black text-uppercase ">Read Less</span></summary></details>
                            </div>
                        @else
                            <div class="m_description">{!! $leadership_data->long_description !!}</div>
                        @endif
                
                <p class="text-right">
                    @if(isset($previous_leadership->id))
                        <a href="{{asset('leadership')}}?id={{$previous_leadership->id}}" class="fs-11 tss-mb text-uppercase text-black"><span class="tss-text-red">←</span> Previous </a>  &nbsp;&nbsp; 
                    @endif
                    @if(isset($next_leadership->id))
                    <a href="{{asset('leadership')}}?id={{$next_leadership->id}}" class="fs-11 tss-mb text-uppercase text-black" style="text-decoration: none; border-bottom: 1px solid #c92136;">{{$next_leadership->leadership_name}}<span class="tss-text-red">→</span></a>
                    @endif
                    
                    

                </p>
            </div>
        </div>
    </div>
    <div class="vertical_links">
        <ol class="breadcrumb omniyat">
            <li class="breadcrumb-item "><a class="white-text" href="#">Teams</a></li>
            <li class="breadcrumb-item active">{{$leadership_data->leadership_name}}</li>
        </ol>
    </div>
    @endif
</div>
  <script type="text/javascript">
      $("#more_data_btn").click(function(){
          $("#more_data").show();
          $("#less_data").hide();
        });

        $("#less_data_btn").click(function(){
          $("#more_data").hide();
          $("#less_data").show();
        });
  </script>  
@endsection
