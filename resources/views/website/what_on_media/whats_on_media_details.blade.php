@extends('website.layouts.inner_layout')
@section('title',"What's On Media")
@section('pageContent')

    <div class="inner-page desktop_view">
        <section class="page-title text-center w-100">
            <h1 class="tss-text-black text-uppercase fs-40 my-0 tss-optima" data-aos="zoom-in" data-aos-duration="900">what’s on media</h1>
            <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="600">{{$page_sub_title->sub_title}}</p>

        </section>

        <section class="w-100 mt-30 press_detail">
            <div class="header-container">
                <div class="list_items w-100 px-30">
                    <div class="row ">
                        <div class="col-md-6" data-aos="fade-right" data-aos-duration="900">
                            <div class="image">
                                <img src="{{asset($womd->thumb_image)}}" alt="press-details">
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-left" data-aos-duration="900">
                            <p class="text-right"><span class="fs-12 text-black tss-mm text-uppercase">{{date('jS-M-Y', strtotime($womd->date))}}</span></p>
                            <h2 class="fs-28 tss-text-red tss-optima mt-5 mb-15">{{$womd->title}}</h2>
                            <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">
                                {!! $womd->long_description !!}
                            </p>

                            <ul class="custom_btns" id="colorNav">
                                <li><a class="btn" href="{{asset($womd->pdf_file)}}" download><span><i class="icon-download"></i></span>Download</a></li>
                                <li class="green"><a class="btn" href=""><span><i class="icon-share"></i></span>Share</a>
                                    <ul>
                                        <li>
                                            <a href="http://www.facebook.com/sharer.php?u=http://caferoute66.com/omniyat/html/articles-2.html" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
                                            <a href="https://twitter.com/share?url=http://caferoute66.com/omniyat/html/articles-2.html" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a> 
                                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://caferoute66.com/omniyat/html/articles-2.html" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row py-20">
                        <div class="col-md-6">
                            <ol class="breadcrumb omniyat">
                                <li class="breadcrumb-item"><a class="white-text">Media</a></li>
                                <li class="breadcrumb-item active"><a class="white-text" href="whats-on-media-list.html">WHATS ON MEDIA</a></li>
                                <li class="breadcrumb-item active">Dubai-based ...</li>
                            </ol>
                        </div>
                        <div class="col-md-6">

                            <div class="text-right"><a href="whats-on-media-details.html" class="fs-11 tss-mb text-uppercase text-black"><span class="tss-text-red">&larr;</span> Previous </a> &nbsp;&nbsp; <a href="articles-3.html" class="fs-11 tss-mb text-uppercase text-black">NEXT <span class="tss-text-red">→</span></a></div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <div id="footer"></div>

    </div>
    <div class="inner-page mobile_view  media_list_pages">
        <section class="page-title text-center w-100 my-30">
            <h1 class="tss-text-black text-uppercase fs-30 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">WHAT’S ON MEDIA</h1>
            <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">NEWS FEED</p>
        </section>
        <section class="page_content w-100 px-5 relative mb-100">
            <ol class="breadcrumb omniyat w-100">
                <li class="breadcrumb-item"><a class="white-text" href="home.html">Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href="whats-on-media-list.html">Media</a></li>
                <li class="breadcrumb-item active">What’s On Media</li>
            </ol>
            <div class="image w-100 mt-5 relative">
                <img src="img/press-release/24-Mahdi-Amjad.jpg" alt="detail" class="w-100">
            </div>
            <p class="w-100 mb-15 pb-15">
                <span class="fs-11 pull-right text-black-50 tss-msb text-uppercase mt-5">POSTED 21-10-2020</span>
            </p>
            <div class="desc py-15 px-15">
                <h2 class="fs-18 text-black tss-msb mt-15 pb-15 tss-lh-1-3">Dubai-based Omniyat looking to expand luxury portfolio</h2>

                <p class="text-black tss-mr fs-14 tss-lh-1-7 mb-10">  
                    Executive chairman and founder Mahdi Amjad hopes to extend the company's footprint in Dubai, the Middle East and internationally
                    <br><br>
                    Dubai-based luxury developer Omniyat Group is looking to add to its iconic portfolio of properties in the emirate, as well as seeking out potential opportunities across the Middle East and the wider world.
                    <br><br>
                    Executive chairman and founder Mahdi Amjad described the three latest additions to the company – One at Palm Jumeirah, The Opus and Dorchester Collection Dubai – as the “crown jewels”, alongside a portfolio which includes around ten properties.
                    <br><br>
                    The Opus, designed by the late Dame Zaha Hadid, completed in 2018 with its ME Dubai by Melia hotel scheduled to open in December this year. One Palm is slated to finish by the end of this year; and the Dorchester Collection Dubai, which was only announced to the market in 2018, is set to complete in the next 18 months, according to Amjad.
                    <br><br>
                    Aside from that we will deliver over 1,000 residential units over the next 18 months,” he added, which includes Sterling, a residential development in Downtown Dubai; and Anwa, the first and tallest tower in Dubai Maritime City.
                    <br><br>
                    <img src="img/press-release/Image-6.png" width="100%" alt="press-details">
                    <br><br>				
                    However, the development plans do not stop there, despite the current economic crisis caused by the global Covid-19 pandemic. Amjad said: “We have a beautiful land bank in Dubai still. We are looking at tailoring the right product, again a bespoke product. I always believe in the demand of Dubai, regardless of current market conditions.
                    <br><br>
                    <img src="img/press-release/Image-12.png" width="100%" alt="press-details">
                    <br><br>				
                    “Yes there is an oversupply environment in different segments of the market, but also an undersupply in other segments of the market. Being able to identify the right opportunities in the right corners, for the right plots, for the right neighbourhoods, has been an art of Omniyat and we hope to do the same here in Dubai and regionally.”
                    <br><br>
                    In pictures: Look inside Zaha Hadid-designed The Opus's ME Dubai
                    ME Dubai is the first ME by Melia hotel in the Middle East and is the only hotel in the world to be designed both inside and out by the late Zaha Hadid.
                    <br><br>
                    That includes looking at potential developments in Saudi Arabia.
                    <br><br>
                    “Of course, we are continuing to eye Saudi,” said Amjad. “We will look forward to the opportunity that that brings us. There is a massive drive in that country and there is the massive Vision 2030 that we are watching very closely. If the opportunity arises then we will not hesitate, but it has to be the right one at the right location at the right time.
                    <br><br>
                    “I have always said we would love to share our experiences with our neighbours, with Arabs of the world. We would love to bring the experience of Omniyat to other GCC countries.”
                    <br><br>
                    While he admitted he harbours further international expansion plans, including another Omniyat development “in another capital city”, in the next five-to-ten years.
                    <br><br>
                    He said: “We are eyeing Europe side and Asia side. We continue to look for the right opportunities.”

                </p>

            </div>

            <div class="fixed_bottom">
                <div class="li">
                    <a href="documents/whats-on-media/Dubai-based-Omniyat-looking.pdf" download class="text-center">
                        <i class="icon-download"></i>
                        <p class="fs-10 tss-msb">DOWNLOAD</p>
                    </a>
                </div>

                <div class="li share">
                    <a class="text-center m-share">
                        <i class="icon-share"></i>
                        <p class="fs-10 tss-msb">SHARE</p>
                    </a>
                    <ul>
                        <li>
                            <a href="http://www.facebook.com/sharer.php?u=http://caferoute66.com/omniyat/html/articles-2.html" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
                            <a href="https://twitter.com/share?url=http://caferoute66.com/omniyat/html/articles-2.html" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a> 
                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://caferoute66.com/omniyat/html/articles-2.html" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div><!--fixed_bottom-->

        </section>

    </div>
@endsection
