@extends('website.layouts.inner_layout')
@section('title','Press Release Details')
@section('pageContent')
<div id="header"></div>

<div class="inner-page desktop_view">
    <section class="page-title text-center w-100">
        <h1 class="tss-text-black text-uppercase fs-40 my-0 tss-optima" data-aos="fade-up" data-aos-duration="600">Press release</h1>
        <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">{{$page_sub_title->sub_title}}</p>

    </section>

    <section class="w-100 mt-30 press_detail">
        <div class="header-container">
            <div class="list_items w-100 px-30">
                <div class="row ">
                    <div class="col-md-6" data-aos="fade-right" data-aos-duration="900">
                        <div class="image">
                            <img src="{{asset($prd->large_image)}}" alt="press-details">
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-left" data-aos-duration="900">
                        <p class="text-right"><span class="fs-12 text-black tss-mm text-uppercase">{{date('jS-M-Y', strtotime($prd->date))}}</span></p>
                        <h2 class="fs-28 tss-text-red tss-optima mt-5 mb-15">{{$prd->title}}</h2>
                        {!! $prd->long_description !!}




                        <ul class="custom_btns" id="colorNav">
                            <li><a class="btn" href="{{asset($prd->pdf_file)}}" target="_blank"><span><i class="icon-download"></i></span>Download</a></li>
                            <li class="green"><a class="btn" href=""><span><i class="icon-share"></i></span>Share</a>
                                <ul>
                                    <li>
                                        <a href="http://www.facebook.com/sharer.php?u=http://caferoute66.com/omniyat/html/press-release-details-01.html" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
                                        <a href="https://twitter.com/share?url=http://caferoute66.com/omniyat/html/press-release-details-01.html" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a> 
                                        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://caferoute66.com/omniyat/html/press-release-details-01.html" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row py-20">
                    <div class="col-md-6">
                        <ol class="breadcrumb omniyat">
                            <li class="breadcrumb-item"><a class="white-text" href="home.html">Home</a></li>
                            <li class="breadcrumb-item"><a class="white-text" href="press-release-list.html">Media</a></li>
                            <li class="breadcrumb-item active">PRESS RELEASE</li>
                        </ol>
                    </div>
                    <div class="col-md-6">

                        <div class="text-right">
                            @if(isset($previous) && isset($previous->id))
                                <a href="{{asset('press_release_details').'/'.$previous->id}}" class="fs-11 tss-mb text-uppercase text-black"><span class="tss-text-red">&larr;</span> Previous </a> &nbsp;&nbsp; 
                            @endif
                            @if(isset($next) && isset($next->id))
                                <a href="{{asset('press_release_details').'/'.$next->id}}" class="fs-11 tss-mb text-uppercase text-black">NEXT <span class="tss-text-red">→</span></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </section>


    </div>
    <div class="inner-page mobile_view  media_list_pages">
        <section class="page-title text-center w-100 my-30">
            <h1 class="tss-text-black text-uppercase fs-30 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">omniyat press release</h1>
            <p class="tss-text-red text-uppercase fs-12 tss-mr" data-aos="fade-up" data-aos-duration="900">get the latest updates</p>
        </section>
        <section class="page_content w-100 px-5 relative mb-100">
            <ol class="breadcrumb omniyat w-100">
                <li class="breadcrumb-item"><a class="white-text" href="home.html">Home</a></li>
                <li class="breadcrumb-item"><a class="white-text" href="press-release-list.html">Media</a></li>
                <li class="breadcrumb-item active">PRESS RELEASE</li>
            </ol>
            <div class="image w-100 mt-5 relative">
                <img src="img/press-release/One-at-Palm-Jumeirah-Breathtaking-Views.jpg" alt="detail" class="w-100">
            </div>
            <p class="w-100 mb-15 pb-15">
                <span class="fs-11 pull-right text-black-50 tss-msb text-uppercase mt-5">POSTED 08th sept 2020</span>
            </p>
            <div class="desc py-15 px-15">
                <h2 class="fs-18 text-black tss-msb mt-15 pb-15 tss-lh-1-3">ONE AT PALM JUMEIRAH - THE MOST EXCLUSIVE ADDRESS SET TO COMPLETE IN DECEMBER 2020</h2>

                <p class="text-black tss-mr fs-14 tss-lh-1-7 mb-10"><i>An iconic landmark at the centre of the very best of Dubai, One at Palm Jumeirah, Dorchester Collection, Dubai is on schedule to open its doors to a haven of luxury in December 2020.</i></p>

                <p class="text-black tss-mr fs-14 tss-lh-1-7 mb-10">08 September, 2020: OMNIYAThas created the most sought-after residences in the epicentre of luxury, offering unparalleledviews of the coast of Dubai. This incredible project will be managed by Dorchester Collection, renowned for their iconic properties from around the globe. Thanks to continuous progress in construction, OMNIYAT are set to deliver One at Palm Jumeirah with over 91% of the work completed already; ready for audiences to immerse themselves in unrivalled living as of December 2020.</p>

                <p class="text-black tss-mr fs-14 tss-lh-1-7 mb-10">With twoof three state-of-the-artpenthouses having already been sold for record-breaking prices, this architectural masterpiece is in reaching distance ofthe finish linewith construction focussed on interiors, finishing touches, landscaping and commissioning. With a chance of a sneak peak, OMNIYAT have fourbeautiful show residencesready for exclusive viewings for potential buyers.</p>

                <p class="text-black tss-mr fs-14 tss-lh-1-7 mb-10">Mahdi Amjad, Founder and Executive Chairman of OMNIYAT, comments,“As the world was hit by a global pandemic, we worked tirelessly to maintain safety measures, allowing us to continue with construction and stay true to our promise of delivering unrivalled beachfront living. We are focused on completing this magnificent project by the end of 2020.” </p>

                <p class="text-black tss-mr fs-14 tss-lh-1-7 mb-10">Leader andexemplarof luxury living in Dubai, it is of no surprise that OMNIYATis the first developerto collaborate with thelegendaryhospitality brandDorchester Collection, to launch its first ever offering in the Middle East region. This is a harmonious partnership, with luxury, quality and attention to detail being at the forefront of their core values. Similar to Dorchester Collection, OMNIYATappeals todiscerning individuals who are well versed when it comes to luxury living and are looking for a particular lifestyle. Both companies share one common value;delivering an ultra-luxury lifestyle with privacy and exclusivity. </p>

                <p class="text-black tss-mr fs-14 tss-lh-1-7 mb-10">Christopher Cowdray, CEO of Dorchester Collection comments, “As One at Palm Jumeirah is the first project in the region that Dorchester Collection is managing, my team and I are delighted to see it so close to completion. This is a landmark not only for Dubai but for the region and reinforces our close partnership with Omniyat, a company renowned for its architectural vision.”</p>

                <p class="text-black tss-mr fs-14 tss-lh-1-7 mb-10">With One at Palm Jumeirah almost complete, the demand for these exclusive residence units has increased markedly. One at Palm Jumeirah hit news headlines in 2017 and 2019 by securing the title for the first and second most expensive penthouses sold in Dubai for a record-breaking AED102million in 2017 and AED74millionin 2019 (these titles are still held). </p>

                <p class="text-black tss-mr fs-14 tss-lh-1-7 mb-10">The interior design of this 910,000sq. ft architectural masterpiece has been brought to life by two of the world’s most prestigious designers; London’s acclaimed interior design studio,Elicyon and Japanese born design firm Super Potato. </p>

                <p class="text-black tss-mr fs-14 tss-lh-1-7 mb-10">The units carefully designed byElicyon are sophisticated, layered and opulent, givingthese residencesa timeless, elegant look, highlighted by classic detailing and rich materials. Super Potato’s work exudes authentic Japanese inspired raw and a natural material pallet. Renowned for fashioning spaces that blend an Asian sensibility while celebrating the unique character of each project’s location, at One at Palm Jumeirah Super Potato uses natural stone and woods with glass and steel to craft a minimalist environment that is warm and inviting. These highly recognizable finishings can be found in some of the 94 residencesand public areas around the building but are mainly showcased in the stunning lobby of One at Palm Jumeirah. </p>

                <p class="text-black tss-mr fs-14 tss-lh-1-7 mb-10">This 105m residential landmark houses only 94 immaculate and prestigious residenceswith extensive views and the utmost privacy without compromising décor and style. The interiors and finishings are not the only reason why One at PalmJumeirah is becoming the epitome of luxury living, the exteriors are an artwork in themselves. To enhance the experience even further, One at Palm Jumeirah offers personalised treatmentwith services includingreserved loungers and beach butler service to ensure ultimate relaxation for its guests.Additionally, they offer 24hr concierge and in-residence service packages that include housekeeping, private chef dining andflorist services.</p>

                <p class="text-black tss-mr fs-14 tss-lh-1-7 mb-10">Residents can enjoy over 55,000sq. ft of dedicated gardens and amenities of the highest calibre, including an unspoilt beachfront promenade accompanied by a private jetty and two restaurants, alongside One at Palm Jumeirah Beach Club managed by Dorchester Collection. To ensure the experience is continued, OMNIYATappointed celebrity landscape architect Vladimir Djurovic to cultivate pristine, lavish gardens that take centre stage to promote relaxation, comfort and well-being. A connection to nature and its infinite advantages for the living experience. Additionally, One at Palm Jumeirah offers the ultimate serene experience with an expansivemain pool, vitality pools and a 25m lap pool that provides plenty of space, privacy and security to relax in. Residents can also enjoy the top of the range gym and spa facilities, lounge areas, business meeting rooms, as well asindoor cinema facilities. </p>

                <p class="text-black tss-mr fs-14 tss-lh-1-7 mb-10">WithOMNIYATcurating a unique landmark of luxury and Dorchester Collection managing the property, audiences will soon step into an unrivalled and bespoke new address, a haven of precision, detail and design. Dubai’s population exude luxury and opulent lifestyles with fine dining and famous restaurants around every corner, this city really is the ideal location for such a prestigious address, the One at Palm Jumeirah. </p>

                <p class="text-black tss-mr fs-14 tss-lh-1-7 mb-10">Mahdi Amjad, Founder and Executive Chairman of OMNIYAT, comments, “Collectively, we havemaintained momentum to reach this point to near completion, with increasing demand and attention of Dubai’s affluent individuals. We look forward to the handover of this amazing project to the Dubai Skyline, and of course to the lucky few who will call this exclusive community home.”</p>             
            </div>

            <div class="fixed_bottom">
                <div class="li">
                    <a href="documents/press-release/One-at-Palm-Jumeirah-Construction-Update-Press-Release-ENG.pdf" download class="text-center">
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
                            <a href="http://www.facebook.com/sharer.php?u=http://caferoute66.com/omniyat/html/press-release-details-01.html" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
                            <a href="https://twitter.com/share?url=http://caferoute66.com/omniyat/html/press-release-details-01.html" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a> 
                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://caferoute66.com/omniyat/html/press-release-details-01.html" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div><!--fixed_bottom-->
        </section>
    </div>
    @endsection
