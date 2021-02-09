@extends('website.layouts.layout')
@section('title','Terms & Conditions')
@section('pageContent')
    
<div class="inner-page">
    <section class="w-100 pb-45 press_detail chairman_newsletter privacy_page">
        <div class="header-container">

            <section class="page-title text-center w-100">
                
                <h1 class="text-black text-uppercase fs-40 my-10 tss-optima" data-aos="fade-right" data-aos-duration="900">TERMS AND CONDITIONS</h1>
                <p class="tss-text-red text-uppercase fs-11 tss-mr" data-aos="fade-left" data-aos-duration="600">{{$tac_data->sub_title}}</p>

            </section>
            <div class="list_items w-100 px-30">
                <div class="row">
                    <div class="col-md-12 mt-15" data-aos="fade-up" data-aos-duration="900">
                        <h2 class="text-uppercase fs-12 tss-mb mb-15">{{$tac_data->title}}</h2>
                        <div>
                            {!! $tac_data->description !!}
                        </div>
                        <!-- <h2 class="text-uppercase fs-12 tss-mb mb-15">PLEASE READ THESE TERMS AND CONDITIONS CAREFULLY BEFORE USING THIS SITE</h2>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">These terms tell you the rules for using our website [DOMAIN ADDRESS] (our site).<a href="{{route('site.home')}}">OMNIYAT</a> website. 
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">Who we are and how to contact us</p> 
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">[DOMAIN ADDRESS] is a site operated by Omniyat Group ("We" / “Omniyat”). </p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">To contact us, please email [EMAIL ADDRESS] or telephone our customer service line on [NUMBER].</p> 
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">By using our site you accept these terms</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">By using our site, you confirm that you accept these terms of use and that you agree to comply with them.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">If you do not agree to these terms, you must not use our site.</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">There are other terms that may apply to you</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">These terms of use refer to the following additional terms, which also apply to your use of our site:</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">·        Our  <a href="privacy-policy.html">Privacy Policy</a>. </p> 
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">·        Our Cookie Policy [INSERT AS LINK TO COOKIE POLICY], which sets out information about the cookies on our site.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">We may make changes to these terms</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">We amend these terms from time to time. Every time you wish to use our site, please check these terms to ensure you understand the terms that apply at that time. [These terms were most recently updated on [DATE].  </p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">We may make changes to our site</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">We may update and change our site from time to time according to our business needs.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">We may suspend or withdraw our site</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">We do not guarantee that our site, or any content on it, will always be available or be uninterrupted. We may suspend or withdraw or restrict the availability of all or any part of our site for business and operational reasons.</p> 
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">You are also responsible for ensuring that all persons who access our site through your internet connection are aware of these terms of use and other applicable terms and conditions and that they comply with them.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">How you may use material on our site</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">We are the owner or the licensee of all intellectual property rights on our site, and in the material published on it.</p> 
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">Those works are protected by copyright laws and treaties around the world. All such rights are reserved.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">You may print off one copy and may download extracts, of any page(s) from our site for your personal use and you may draw the attention of others within your organization to content posted on our site.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">You must not modify the paper or digital copies of any materials you have printed off or downloaded in any way, and you must not use any illustrations, photographs, video or audio sequences, or any graphics separately from any accompanying text.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">Our status (and that of any identified contributors) as the authors of content on our site must always be acknowledged.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">You must not use any part of the content on our site for commercial purposes without obtaining a license to do so from us or our licensors.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">If you print off, copy or download any part of our site in breach of these terms of use, your right to use our site will cease immediately and you must, at our option, return or destroy any copies of the materials you have made.</p>  
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">We will not be liable to you for any loss or damage, even if foreseeable, arising under or in connection with use of, or inability to use, our site, or use of or reliance on any content displayed on our site.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">Do not rely on the information on this site</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">The content on our site is provided for general information only. It is not intended to amount to advice on which you should rely. You must obtain professional or specialist advice before taking, or refraining from, any action based on the content on our site.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">Although we make reasonable efforts to update the information on our site, we make no representations, warranties, or guarantees, whether express or implied, that the content on our site is accurate, complete, or up to date.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">We are not responsible for websites we link to</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">Where our site contains links to other sites and resources provided by third parties, these links are provided for your information only. Such links should not be interpreted as approval by us of those linked websites or information you may obtain from them.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">We have no control over the contents of those sites or resources.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">How we may use your personal information</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">We will only use your personal information as set out in our <a href="privacy-policy.html">PRIVACY POLICY</a>.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">We are not responsible for viruses and you must not introduce them</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">We do not guarantee that our site will be secure or free from bugs or viruses.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">You are responsible for configuring your information technology, computer programs, and platform to access our site. You should use your virus protection software.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">You must not misuse our site by knowingly introducing viruses, trojans, worms, logic bombs, or other material that is malicious or technologically harmful.</p> 
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">Governing Law</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">The use of the website, and these terms and conditions, are governed by the law of the United Arab Emirates.</p>  
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">If you wish to link to or make any use of the content on our site other than that set out above, please contact <a href="mailto:SALES@OMNIYAT.COM">SALES@OMNIYAT.COM</a>.</p> -->
                        
                    </div>
                </div>
                
                
            </div>
            
        </div>
    </section>
    @include('website.layouts.footer')
</div>
    

@endsection
