@extends('website.layouts.layout')
@section('title','Privacy Policy')
@section('pageContent')
    
<div class="inner-page">
    <section class="w-100 pb-45 press_detail chairman_newsletter privacy_page">
        <div class="header-container">

            <section class="page-title text-center w-100">
                
                <h1 class="text-black text-uppercase fs-40 my-10 tss-optima" data-aos="fade-right" data-aos-duration="900">Privacy Policy</h1>
                <p class="tss-text-red text-uppercase fs-11 tss-mr" data-aos="fade-left" data-aos-duration="600">{{$privacy_policy_data->sub_title}}</p>

            </section>
            <div class="list_items w-100 px-30">
                <div class="row">
                    <div class="col-md-12 mt-15" data-aos="fade-up" data-aos-duration="900">
                        <div>
                            {!! $privacy_policy_data->description !!}
                        </div>
                        <!-- <h2 class="text-uppercase fs-12 tss-mb mb-15">1. INTRODUCTION</h2>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">The purpose of this privacy policy (“Privacy Policy”) is to inform you how OMNIYAT (“we” / “us”) may use any data collected during your visit to the <a href="home.html">OMNIYAT</a> website. 
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">The use of any online chat or contact forms on the website is governed by this Privacy Policy. </p> 
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">OMNIYAT will follow this privacy policy in the handling of your data, however, we cannot offer any warranty as to the security of any information you transmit on or through the OMNIYAT website and use of the website is at your own risk.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">In the context of this Privacy Policy:</p> 
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">“you” means the individual accessing or using the OMNIYAT website, or other legal entity on behalf of which such individual is accessing or using the website, as applicable; and “Personal Data” is any information that relates to an identified or identifiable individual.</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 text-justify">By accessing the OMNIYAT website you agree to this Privacy Policy and the website <a href="#">terms and conditions</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-15" data-aos="fade-up" data-aos-duration="900">
                        <h2 class="text-uppercase fs-12 tss-mb mb-15">2. DATA COLLECTION</h2>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">While using the OMNIYAT website, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you. Personally, identifiable information may include, but is not limited to:</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">email address; </p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">first name and last name; or</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">telephone number.</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">We may also collect Usage Data automatically when you and other website users access the website.</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">Usage Data may include information such as:</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">the time and date of your visit;</p> 
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">the pages of the OMNIYAT website that you visit;</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">the time spent on those pages and the website; and</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">[unique device identifiers, your device's Internet Protocol address (e.g. IP address), browser type, browser version, and other diagnostic data any other items? – Marketing to confirm if applicable]</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">We may also collect information that your browser sends whenever you visit our website.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-15" data-aos="fade-up" data-aos-duration="900">
                        <h2 class="fs-12 tss-mb mb-15"><span class="text-uppercase">3. TRACKING </span>– [Marketing to provide cookies policy]</h2>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">We use cookies and similar tracking technologies to track the activity on the OMNIYAT website and store certain information. Tracking technologies used are beacons, tags, and scripts to collect and track information and to improve and analyze the use of the website. The technologies we use may include:</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">Cookies or Browser Cookies. A cookie is a small file placed on Your Device. You can instruct Your browser to refuse all Cookies or to indicate when a Cookie is being sent. However, if You do not accept Cookies, You may not be able to use some parts of our Service. Unless you have adjusted Your browser setting so that it will refuse Cookies, our Service may use Cookies. Flash Cookies. Certain features of our Service may use local stored objects (or Flash Cookies) to collect and store information about Your preferences or Your activity on our Service. Flash Cookies are not managed by the same browser settings as those used for Browser Cookies. For more information on how You can delete Flash Cookies, please read "Where can I change the settings for disabling, or deleting local shared objects?" available at</p> 
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify"><a href="https://helpx.adobe.com/flash-player/kb/disable-local-shared-objects-flash.html">https://helpx.adobe.com/flash-player/kb/disable-local-shared-objects-flash.html#main_Where_can_I_change_the_settings_for_disabling__or_deleting_local_shared_objects_Web</a> Beacons. Certain sections of our Service and our emails may contain small electronic files known as web beacons (also referred to as clear gifs, pixel tags, and single-pixel gifs) that permit the OMNIYAT, for example, to count users who have visited those pages or opened an email and for other related website statistics (for example, recording the popularity of a certain section and verifying system and server integrity). Cookies can be "Persistent" or "Session" Cookies. Persistent Cookies remain on Your personal computer or mobile device when You go offline, while Session Cookies are deleted as soon as You close Your web browser. Learn more about cookies: All About Cookies.</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">We use both Session and Persistent Cookies for the purposes set out below:</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">Necessary / Essential Cookies</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">Type: Session Cookies</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">Administered by: Us</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">Purpose: These Cookies are essential to provide You with services available through the Website and to enable You to use some of its features. They help to authenticate users and prevent fraudulent use of user accounts. Without these Cookies, the services that You have asked for cannot be provided, and We only use these Cookies to provide You with those services.</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">Cookies Policy / Notice Acceptance Cookies</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">Type: Persistent Cookies</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">Administered by: Us</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">Purpose: These Cookies identify if users have accepted the use of cookies on the Website.</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">Functionality Cookies</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">Type: Persistent Cookies</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">Administered by: Us</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-0 text-justify">Purpose: These Cookies allow us to remember choices You make when You use the Website, such as remembering your login details or language preference. The purpose of these Cookies is to provide You with a more personal experience and to avoid You having to re-enter your preferences every time You use the Website.</p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 mt-15" data-aos="fade-up" data-aos-duration="900">
                        <h2 class="text-uppercase fs-12 tss-mb mb-15">4. DATA USAGE </h2>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">OMNIYAT may use Personal Data for the following purposes:</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">To maintain and monitor the usage of our website.</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">To contact you by email, telephone calls, SMS, or other equivalent forms of electronic communication, such as a mobile application's push notifications regarding updates or informative communications related to the functionalities, products, or contracted services, including the security updates, when necessary or reasonable for their implementation.</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">To provide you with news, special offers, and general information about our projects, and events which we offer unless you have opted not to receive such information.</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">Other purposes: We may use your information for other purposes, such as data analysis, identifying usage trends, determining the effectiveness of our promotional campaigns, and to evaluate and improve our website, our products and services, marketing, and your experience.</p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 mt-15" data-aos="fade-up" data-aos-duration="900">
                        <h2 class="text-uppercase fs-12 tss-mb mb-15">5. DATA SHARING</h2>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">We may share your personal information in the following situations:</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">A.  With Service Providers: We may share your personal information with third-party service providers to monitor and analyze the use of the OMNIYAT website. [ Marketing to confirm if applicable]</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">B.  For business transfers: We may share or transfer your personal information in connection with, or during negotiations of, any merger, sale of OMNIYAT assets, financing, or acquisition of all or a portion of our business to another company.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">C. With Affiliates: We may share your information with Our affiliates, in which case we will require those affiliates to honor this Privacy Policy. Affiliates include our parent company and any other subsidiaries, joint venture partners, or other companies that we control or that are under common control with OMNIYAT.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">D. Social media - if you interact with other users or register through any third-party social media service, other users may see your name, profile, pictures, and description of your activity. Similarly, other users will be able to view descriptions of your activity, communicate with you, and view your profile.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">E. With Your Consent: We may disclose your personal information for any other purpose with your consent.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">F. Competent Authority – we may disclose your personal information if required to do so by a competent authority (including but not limited to any court, tribunal, or other competent forum). </p>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-md-12 mt-15" data-aos="fade-up" data-aos-duration="900">
                        <h2 class="text-uppercase fs-12 tss-mb mb-15">6. DATA RETENTION</h2>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">OMNIYAT will retain your Personal Data only for as long as is necessary for the purposes set out in this Privacy Policy. We will retain and use your Personal Data to the extent necessary to comply with our legal obligations (for example, if we are required to retain your data to comply with applicable laws), resolve disputes, and enforce our legal agreements and policies.</p>
                        
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">OMNIYAT will also retain Usage Data for internal analysis purposes. Usage Data is generally retained for a shorter period of time, except when this data is used to strengthen the security or to improve the functionality of the website, or if we are legally obligated to retain this data for longer time periods.</p>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-md-12 mt-15" data-aos="fade-up" data-aos-duration="900">
                        <h2 class="text-uppercase fs-12 tss-mb mb-15">7. LOCATION</h2>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">Your information, including Personal Data, is processed at OMNIYAT's operating offices and in any other places where the parties involved in the processing are located. It means that this information may be transferred to — and maintained on — computers located outside of Your country or other governmental jurisdiction where the data protection laws may differ from those from Your jurisdiction.</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">Your consent to this Privacy Policy represents your agreement to any such maintenance, processing, and transfer.</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">OMNIYAT will take all steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy.</p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 mt-15" data-aos="fade-up" data-aos-duration="900">
                        <h2 class="text-uppercase fs-12 tss-mb mb-15">8. OTHER WEBSITES </h2>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">OMNIYAT website may contain links to other websites that are not operated by us. If you click on a third party link, You will be directed to that third party's site and the privacy policy of that site shall apply.</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">We have no control over and assume no responsibility for the content, privacy policies, or practices of any third party sites or services.</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">Privacy Policy Updates</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">OMNIYAT may amend, update, vary, or modify the Privacy Policy from time to time without notice or restriction. The current Privacy Policy at the date you access the website will apply and it is your responsibility to check for any update which may affect your use of the website.   </p>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 mt-15" data-aos="fade-up" data-aos-duration="900">
                        <h2 class="text-uppercase fs-12 tss-mb mb-15">Contact:</h2>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">If you have any questions or concerns about this Privacy Policy or other use of your data you can <a href="contact-us.html">contact</a>.</p>
                        <p class="text-black tss-mr fs-12 tss-lh-1-7 mb-10 text-justify">If you wish to update your newsletter and communication settings you can contact <a href="mailto:SALES@OMNIYAT.COM">SALES@OMNIYAT.COM</a></p>
                    </div>
                </div> -->
                
            </div>
            
        </div>
    </section>
    
    @include('website.layouts.footer')
    
</div>
    

@endsection
