@extends('website.layouts.layout')
@section('title','Portfolio List')
@section('pageContent')

<div class="inner-page desktop_view">
    <section class="page-title text-center w-100">
        <h1 class="tss-text-black text-uppercase fs-55 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">The Portfolio</h1>
        <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">Bring Art into Architecture</p>
    </section>
    
    <section class="w-100 mt-30 portfolio_list pb-30">
        <div class="container-fluid">
            @if(count($categories) > 0)    
            <ul class="nav-tabs-center nav-tabs-noborder" id="topNav">
                @foreach($categories as $key => $category)
                    <li data-aos="zoom-in" data-aos-delay="600" id="">
                        <a href="#{{strtolower(str_replace(' ','_',$category->name))}}" class="d_link">
                            <img src="{{asset($category->image)}}" alt="{{$category->name}}">
                            <p class="fs-14 tss-msb tss-lh-1-3 text-uppercase mt-15">{{$category->name}}</p>   
                        </a>
                    </li>
                @endforeach
                <!-- <li data-aos="zoom-in" data-aos-delay="600" id="">
                    <a href="#commercial" class="d_link">
                        <img src="img/portfolio/icons/commercial.png" alt="commercial">
                        <p class="fs-14 tss-msb tss-lh-1-3 text-uppercase mt-15">Commercial <br>Solutions</p>
                    </a>
                </li>  
                <li data-aos="fade-left" data-aos-delay="600" id="">
                    <a href="#mixed-use" class="d_link">
                        <img src="img/portfolio/icons/mixed-use.png" alt="mixed-use">
                        <p class="fs-14 tss-msb tss-lh-1-3 text-uppercase mt-15">mixed use <br>developments</p>
                    </a>
                </li> -->
            </ul>
            
                
                <div class="content container">
                    
                    @foreach($categories as $key => $cvalue)
                        <?php
                            $project = DB::table('portfolios')->where('category_id', $cvalue->id)->first();
                            $bprojects = DB::table('portfolios')->where(['category_id'=>$cvalue->id])->get();
                        ?>
                        @if(count($bprojects) > 0)
                            <div class="pane residential" id="{{strtolower(str_replace(' ','_',$cvalue->name))}}">
                                    @if(isset($project))
                                        <div class="main_image mb-30 w-100" data-aos="fade-up">
                                            <div class="image w-100 relative">
                                                <a href="{{route('site.portfolio.details',['project_id'=>$project->id,'project_name'=>strtolower(urlencode(str_replace(',','',str_replace(' ','-',$project->project_name))))])}}">
                                                    <img src="{{asset($project->image)}}" alt="residential" class="w-100 category_img">
                                                    <p class="fs-10 tss-text-white tss-mh text-uppercase tab_title absolute"  data-aos="fade-left" data-aos-delay="600">{{$cvalue->name}}</p>
                                                    <div class="residential_logo_desc absolute text-center" data-aos="zoom-in" data-aos-delay="600">
                                                        @if(isset($project->logo) && file_exists($project->logo))
                                                            <img src="{{asset($project->logo)}}" alt="logo">
                                                        @endif
                                                        @if(isset($project->project_name) && !empty($project->project_name))
                                                            <h2 class="tss-text-white text-uppercase fs-40 tss-optima">{{$project->project_name}}</h2>
                                                        @endif
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif

                                    @if(count($bprojects) > 0)
                                        <div class="row pb-30">
                                            @foreach($bprojects as $key => $bproject)
                                                @if($project->id != $bproject->id)
                                                    <div class='col-md-4' data-aos="fade-up">
                                                        <div class="item">
                                                            <a href="{{route('site.portfolio.details',['project_id'=>$bproject->id,'project_name'=>strtolower(urlencode(str_replace(',','',str_replace(' ','-',$bproject->project_name))))])}}">
                                                                <img src="{{asset($bproject->image)}}" alt="property" class="image">
                                                                <div class="overlay">
                                                                    <div class="text text-uppercase text-center tss-text-white"> {{$bproject->project_name}}</div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                
                                <!--
                                    <div class="row pb-30 mb-30">
                                        <div class='col-md-4 col-md-offset-4 text-center'>
                                            <button type="button" class="btn btn-link btn-red btn-auto text-uppercase tss-msb py-10 px-45">Load more</button>
                                        </div>
                                    </div>
                                -->
                            </div>  
                        @endif
                    @endforeach
                
                </div>
            @endif 
        </div>
    </section>
    
    @include('website.layouts.footer')
</div>
    
<div class="inner-page mobile_view" >
    <section class="page-title text-center w-100 my-30">
        <h1 class="tss-text-black text-uppercase fs-32 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">portfolio</h1>
        <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">BRING ART INTO ARCHITECTURE</p>
    </section>
    <section class="w-100 portfolio_list_mobile">
        @if(count($categories) > 0)
            <ul class="nav-tabs-center nav-tabs-noborder" id="myDIV">
                @foreach($categories as $key => $category)
                    <li>
                        <a href="#m_{{strtolower(str_replace(' ','_',$category->name))}}" class="btn">
                            <img src="{{asset($category->image)}}" alt="{{$category->name}}">
                            <p>{{$category->name}}</p>   
                        </a>
                    </li>
                @endforeach
                <!--<li>
                    <a href="#m_commercial" class="btn">
                        <img src="img/portfolio/icons/commercial.png" alt="commercial">
                        <p>Commercial<br>Solutions</p>
                    </a>
                </li>  
                <li>
                    <a href="#m_mixed-use" class="btn">
                        <img src="img/portfolio/icons/mixed-use.png" alt="mixed-use">
                        <p>Mixed Use<br>Developments</p>
                    </a>
                </li>-->
            </ul>

            <div class="m_content w-100">
                @foreach($categories as $key => $cvalue)
                    <?php $bprojects = DB::table('portfolios')->where(['category_id'=>$cvalue->id])->get(); ?>
                    @if(count($bprojects) > 0)
                        <div class="pane m_residential" id="m_{{strtolower(str_replace(' ','_',$category->name))}}">
                            @foreach($bprojects as $key => $pvalue)
                                <div class="item">
                                    <a href="{{route('site.portfolio.details',['project_id'=>$pvalue->id,'project_name'=>strtolower(urlencode(str_replace(',','',str_replace(' ','-',$pvalue->project_name))))])}}">
                                        <div class="image ratio-xlg-height">
                                            <img src="{{asset($pvalue->image)}}" alt="residential" class="w-100">
                                        </div>    
                                        <div class="overlay">
                                            <div class="text text-uppercase text-center tss-text-white">{{$pvalue->project_name}}</div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach     
                        </div>
                    @endif
                @endforeach
            </div>
        @endif 
    </section>
    
</div> 
@endsection