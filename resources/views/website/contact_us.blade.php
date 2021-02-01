@extends('website.layouts.layout')
@section('title','Contact Us')
@section('pageContent')
    <div class="inner-page contact-us-page w-100">
        <section class="page-title text-center w-100">
            <h1 class="tss-text-black text-uppercase fs-55 my-0 tss-optima" data-aos="fade-up" data-aos-duration="800">Contact Us</h1>
            <p class="tss-text-red text-uppercase fs-12 tss-mr desktop_view" data-aos="fade-up" data-aos-duration="900">@foreach($contact_us_data as $cud)
                            @if($cud->type == 5 && $cud->title == 'sub_title')
                            {{$cud->description}}
                            @endif
                            @endforeach</p>
        </section>
    </div>
    <section class="w-100 pb-45 desktop_view">
        <div class="header-container pt-45 about_us">
                <div class="row">
                    <div class="col-md-6 pr-45 px-45" data-aos="fade-up" data-aos-duration="900">
                        <div class="contact-form">
                            <h3 class=" text-uppercase text-center fs-16 tss-optima pb-30">@foreach($contact_us_data as $cud)
                            @if($cud->type == 5 && $cud->title == 'form_title')
                            {{$cud->description}}
                            @endif
                            @endforeach
                    </h3>
                            <form method="POST" id="contactFormSubmit" action="javascript:0;">
                                <div class="col-md-12 text-center">
                                    <span id="Feedbackmessage"></span>
                                </div>
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6 px-3">
                                        <div class="form-group my-5">
                                            <input type="text" class="form-control" id="f_name" placeholder="FIRST NAME" required="" name="first_name" onkeyup="this.value = this.value.toLowerCase();">
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-3">
                                        <div class="form-group my-5">
                                            <input type="text" class="form-control" id="l_name" placeholder="LAST NAME" required="" name="last_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 px-3">
                                        <div class="form-group my-5">
                                            <input type="email" class="form-control" id="email" placeholder="EMAIL" required="" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 px-3">
                                        <div class="form-group my-5">
                                            <input type="text" class="form-control" id="phone" placeholder="PHONE" required="" name="phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 px-3">
                                        <div class="form-group my-5">
                                            <textarea class="form-control" rows="4" id="message" placeholder="MESSAGE" required="" name="message"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 px-3">
                                        <button type="submit" id="contactBtnReport" class="btn btn-link btn-red btn-block text-uppercase tss-msb py-10 px-45 my-5 fs-11">inquire more</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3 pl-15" data-aos="fade-up" data-aos-duration="900">
                        <h3 class=" text-uppercase text-left fs-16 tss-optima pb-30">
                            @foreach($contact_us_data as $cud)
                            @if($cud->type == 5 && $cud->title == 'location_title')
                            {{$cud->description}}
                            @endif
                            @endforeach</h3>
                        @foreach($contact_us_data as $cud)
                        @if($cud->type == 1)
                        <div class="contact_wrapper fs-12 text-black text-uppercase pb-15">
                            <p class="tss-mb fs-12 mb-5">{{$cud->title}}:</p>
                            <p class="tss-mm fs-10">{{$cud->description}}</p>
                        </div>
                        @endif
                        @endforeach
                        <div class="contact_wrapper fs-12 text-black text-uppercase mt-30">
                            <h3 class=" text-uppercase text-left fs-16 tss-optima pb-15 ">@foreach($contact_us_data as $cud)
                            @if($cud->type == 5 && $cud->title == 'social_title')
                            {{$cud->description}}
                            @endif
                            @endforeach
                        </h3>
                            <ul class="w-100 social_icons">
                                @foreach($contact_us_data as $cud)
                                @if($cud->type == 4 && $cud->title == 'facebook')
                                <li><a href="https://www.facebook.com/OmniyatOfficial" target="_blank"><img src="{{asset('public/site/img/icons/facebook.png')}}"></a></li>
                                @endif
                                @if($cud->type == 4 && $cud->title == 'instagram')
                                <li><a href="https://www.instagram.com/omniyatofficial/" target="_blank"><img src="{{asset('public/site/img/icons/instagram.png')}}"></a></li>
                                @endif
                                @if($cud->type == 4 && $cud->title == 'twitter')
                                <li><a href="https://twitter.com/OmniyatOfficial" target="_blank"><img src="{{asset('public/site/img/icons/twitter.png')}}"></a></li>
                                @endif
                                @if($cud->type == 4 && $cud->title == 'linkedIn')
                                <li><a href="https://www.linkedin.com/company/omniyat-group" target="_blank"><img src="{{asset('public/site/img/icons/linkedin.png')}}"></a></li>
                                @endif
                                @if($cud->type == 4 && $cud->title == 'youtube')
                                <li><a href="https://www.youtube.com/channel/UCZvDnJo6wz5WUm1K8PcUfKw/videos" target="_blank"><img src="{{asset('public/site/img/icons/youtube.png')}}"></a></li>
                                @endif
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 pr-15" data-aos="fade-up" data-aos-duration="900">
                        <h3 class=" text-uppercase text-left fs-16 tss-optima pb-30">@foreach($contact_us_data as $cud)
                            @if($cud->type == 5 && $cud->title == 'contact_title')
                            {{$cud->description}}
                            @endif
                            @endforeach
                        </h3>
                        <div class="contact_wrapper fs-12 text-black text-uppercase">
                            <div class="contact_wrapper fs-12 text-black text-uppercase pb-15">
                            @foreach($contact_us_data as $cud)
                            @if($cud->type == 2)   
                                @if($cud->title == 'WHATSAPP')
                                    <p class="mb-5"><span class="tss-mb">Within UAE:&nbsp;</span><span><a href="whatsapp://send?text=Hello World!&phone={{$cud->description}}" class="text-black tss-mm">{{$cud->description}}</a></span></p>
                                @else
                                    <p class="mb-5"><span class="tss-mb">{{$cud->title}}:&nbsp;</span><span><a href="tel:{{$cud->description}}" class="text-black tss-mm">{{$cud->description}}</a></span></p>
                                @endif
                            
                            @endif
                            @endforeach
                            </div>
                        </div>
                        <div class="contact_wrapper fs-12 text-black text-uppercase mt-30 pt-5">
                            
                                <p class="tss-mb mb-t">EMAIL:</p>
                                <p class="pb-15">
                                    @foreach($contact_us_data as $cud)
                                @if($cud->type == 3)
                                <a href="mailto:{{trim($cud->description)}}" class="text-black tss-mm fs-11">{{trim($cud->description)}}</a>
                                 @endif
                                 @endforeach
                                </p>
                            
                        </div>
                        <div class="contact_wrapper fs-12 text-black text-uppercase pt-30">
                            <p class="tss-mb">
                                <a href="@foreach($contact_us_data as $cud)
                                @if($cud->type == 6){{trim($cud->description)}} @endif
                                 @endforeach" class="text-black tss-mb fs-11">@foreach($contact_us_data as $cud)
                                @if($cud->type == 6)
                                {{trim($cud->title)}}
                                @endif
                                 @endforeach</a><br>
                                 <a href="@foreach($contact_us_data as $cud)
                                @if($cud->type == 7){{trim($cud->description)}} @endif
                                 @endforeach" class="text-black tss-mb fs-11">@foreach($contact_us_data as $cud)
                                @if($cud->type == 7)
                                {{trim($cud->title)}}
                                @endif
                                 @endforeach</a>
                                <!-- <a href="privacy-policy.html" class="text-black tss-mb fs-11">Privacy Policy</a> -->
                            </p>
                        </div>

                    </div>
                </div>
            </div>
    </section>

    <div class="inner-page mobile_view w-100 m_contact_content" style="margin-top:30px!important;">
        <div class="panel-group accordion m_contact" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="h1">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#c1" aria-expanded="false" aria-controls="c" class="collapsed text-uppercase">
                        Register your interest
                        </a>
                    </h4>
                </div>
                <div id="c1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="h1">
                    <div class="panel-body">
                        <div class="panel-desc w-100">
                            <div class="red_outline_box p-20 pt-0">
                                <form method="POST" id="contactFormSubmitMobile" action="javascript:0;">
                                    <div class="col-md-12 text-center">
                                        <span id="FeedbackmessageMobile"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 pr-5">
                                            <div class="form-group my-5">
                                                <input type="text" class="form-control" id="f_name" placeholder="First Name" required="" name="first_name">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 pl-5">
                                            <div class="form-group my-5">
                                                <input type="text" class="form-control" id="l_name" placeholder="Last Name" required="" name="last_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <div class="form-group my-5">
                                                <input type="text" class="form-control" id="phone" placeholder="Phone Number" required="" name="phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group my-5">
                                                <input type="email" class="form-control" id="email" placeholder="Email" required="" name="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            <div class="form-group my-5">
                                                <textarea class="form-control" rows="4" id="message" placeholder="Message" required="" name="message"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 pull-right">
                                            <button type="submit" id="contactMobileBtnReport" class="btn btn-link btn-red text-uppercase tss-msb py-10 px-45 my-5 fs-11 mt-30">SUBMIT</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="h2">
                    <h4 class="panel-title">
                        <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#c2" aria-expanded="false" aria-controls="c2">
                        contact details
                        </a>
                    </h4>
                </div>
                <div id="c2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="h2">
                    <div class="panel-body">
                        <div class="panel-desc w-100">
                            <div class="red_outline_box p-20 pt-0">
                                <div class="contact_wrapper fs-14 text-black text-uppercase pb-15">
                                    <p class="tss-mb fs-14 mb-5">Omniyat Headquarters:</p>
                                    <p class="tss-mm fs-14">26th Floor, One by Omniyat, Business Bay.</p>
                                </div>
                                <div class="contact_wrapper fs-14 text-black text-uppercase pb-15">
                                    <p class="tss-mb fs-14 mb-5">Omniyat Sales Gallery:</p>
                                    <p class="tss-mm fs-14">Office C203, The Opus by Omniyat, Business Bay.</p>
                                </div>
                                
                                <div class="contact_wrapper fs-14 text-black text-uppercase">
                                    <p class="mb-5"><span class="tss-mb">Within UAE:&nbsp;</span><span><a href="tel:800666" class="text-black tss-mm">800 666</a></span></p>
                                    <p class="mb-5"><span class="tss-mb">Outside UAE:&nbsp;</span><span><a href="tel:+971 45115004" class="text-black tss-mm">+971 4 511 5004</a></span></p>
                                    <p class="mb-5"><span class="tss-mb">Whatsapp:&nbsp;</span><span><a href="whatsapp://send?text=Hello World!&phone=+971544886666" class="text-black tss-mm">+971 544886666</a></span></p>
                                </div>
                                <div class="contact_wrapper fs-14 text-black text-uppercase mt-10 pt-5">
                                    <p class="tss-mb mb-t">Email:</p>
                                    <p class="pb-0">
                                        <a href="mailto:sales@omniyat.com" class="text-black tss-mm fs-14">sales@omniyat.com</a>
                                        <br>
                                        <a href="mailto:agents@omniyat-liv.com" class="text-black tss-mm fs-14">agents@omniyat-liv.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="h4">
                    <h4 class="panel-title">
                        <a class="collapsed text-uppercase" role="button" data-toggle="collapse" data-parent="#accordion" href="#c4" aria-expanded="false" aria-controls="c4">
                        Social media
                        </a>
                    </h4>
                </div>
                <div id="c4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="h4">
                    <div class="panel-body">
                        <div class="panel-desc w-100">
                            <div class="red_outline_box p-20 pt-0 w-100">
                                <ul class="w-100 social_icons">
									<li><a href="https://www.facebook.com/OmniyatOfficial" target="_blank"><img src="img/icons/facebook.png"></a></li>
                                <li><a href="https://www.instagram.com/omniyatofficial/" target="_blank"><img src="img/icons/instagram.png"></a></li>
                                <li><a href="https://twitter.com/OmniyatOfficial" target="_blank"><img src="img/icons/twitter.png"></a></li>
                                <li><a href="https://www.linkedin.com/company/omniyat-group" target="_blank"><img src="img/icons/linkedin.png"></a></li>
                                <li><a href="https://www.youtube.com/channel/UCZvDnJo6wz5WUm1K8PcUfKw/videos" target="_blank"><img src="img/icons/youtube.png"></a></li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <input type="hidden" name="" id="locations_count" value="{{count($map_locations)}}">
    @if(count($map_locations)>0)
    @foreach($map_locations as $key=>$ml)
    @if($ml->type == 8)
    <input type="hidden" name="" id="loc_name_{{$key}}" value="{{$ml->location_name}}">
    <input type="hidden" name="" id="latitude_{{$key}}" value="{{$ml->latitude}}">
    <input type="hidden" name="" id="longitude_{{$key}}" value="{{$ml->longitude}}">
    @endif
    @endforeach
    @endif
    <section class="w-100 mt-30 contact_us pb-30">
        <div class="map-responsive">
            <div id="map-canvas"></div>
        </div>
    </section>

    
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBZGstqA7yoIXd4L84J-fIqlSzVVL1uoGo'></script>
<script type="text/javascript">
    function initialise() {
    var center = new google.maps.LatLng(25.1883757,55.2605124); // Add the coordinates

    /*var myLatlng = [
      ['OMNIYAT SALES GALLERY', 25.18789, 55.261428, 2],
      ['OMNIYAT HEADQUARTERS', 25.187709, 55.2594579, 1],
    ];*/
    var locations_count = $('#locations_count').val();
    
		var mapOptions = {
            styles:[
                      {
                        "elementType": "geometry",
                        "stylers": [
                          {
                            "color": "#f5f5f5"
                          }
                        ]
                      },
                      {
                        "elementType": "labels.icon",
                        "stylers": [
                          {
                            "visibility": "on"
                          }
                        ]
                      },
                      {
                        "elementType": "labels.text.fill",
                        "stylers": [
                          {
                            "color": "#000000"
                          }
                        ]
                      },
                      {
                        "elementType": "labels.text.stroke",
                        "stylers": [
                          {
                            "color": "#f5f5f5"
                          }
                        ]
                      },
                      {
                        "featureType": "administrative.land_parcel",
                        "elementType": "labels.text.fill",
                        "stylers": [
                          {
                            "color": "#bdbdbd"
                          }
                        ]
                      },
                      {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [
                          {
                            "color": "#eeeeee"
                          }
                        ]
                      },
                      {
                        "featureType": "poi",
                        "elementType": "labels.text.fill",
                        "stylers": [
                          {
                            "color": "#00000"
                          }
                        ]
                      },
                      {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [
                          {
                            "color": "#e5e5e5"
                          }
                        ]
                      },
                      {
                        "featureType": "poi.park",
                        "elementType": "labels.text.fill",
                        "stylers": [
                          {
                            "color": "#a99d81"
                          }
                        ]
                      },
                      {
                        "featureType": "road",
                        "elementType": "geometry",
                        "stylers": [
                          {
                            "color": "#ffffff"
                          }
                        ]
                      },
                      {
                        "featureType": "road.arterial",
                        "elementType": "labels.text.fill",
                        "stylers": [
                          {
                            "color": "#ffffff"
                          }
                        ]
                      },
                      {
                        "featureType": "road.highway",
                        "elementType": "geometry",
                        "stylers": [
                          {
                            "color": "#fde293"
                          }
                        ]
                      },
                      {
                        "featureType": "road.highway",
                        "elementType": "labels.text.fill",
                        "stylers": [
                          {
                            "color": "#d8b052"
                          }
                        ]
                      },
                      {
                        "featureType": "road.local",
                        "elementType": "labels.text.fill",
                        "stylers": [
                          {
                            "color": "#abb379"
                          }
                        ]
                      },
                      {
                        "featureType": "transit.line",
                        "elementType": "geometry",
                        "stylers": [
                          {
                            "color": "#e5e5e5"
                          }
                        ]
                      },
                      {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [
                          {
                            "color": "#9bc0f9"
                          }
                        ]
                      },
                      {
                        "featureType": "water",
                        "elementType": "labels.text.fill",
                        "stylers": [
                          {
                            "color": "#9bc0f9"
                          }
                        ]
                      }
                    ],
			zoom: 17, // The initial zoom level when your map loads (0-20)
			minZoom: 1, // Minimum zoom level allowed (0-20)
			maxZoom: 20, // Maximum soom level allowed (0-20)
			zoomControl:true, // Set to true if using zoomControlOptions below, or false to remove all zoom controls.
			zoomControlOptions: {
  				style:google.maps.ZoomControlStyle.DEFAULT // Change to SMALL to force just the + and - buttons.
			},
			center: center, // Centre the Map to our coordinates variable
			mapTypeId: google.maps.MapTypeId.ROADMAP, // Set the type of Map
			scrollwheel: false, // Disable Mouse Scroll zooming (Essential for responsive sites!)
			// All of the below are set to true by default, so simply remove if set to true:
			panControl:false, // Set to false to disable
			mapTypeControl:false, // Disable Map/Satellite switch
			scaleControl:false, // Set to false to hide scale
			streetViewControl:false, // Set to disable to hide street view
			overviewMapControl:false, // Set to false to remove overview control
			rotateControl:false // Set to false to disable rotate control
	  	}
        
		var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        // Render our map within the empty div
		var image = new google.maps.MarkerImage("data:image/png;base64,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", null, null, null, new google.maps.Size(70,106)); // Create a variable for our marker image.
    var infowindow = new google.maps.InfoWindow();

    var marker, i;
    
    
    for (i = 0; i < locations_count; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng($('#latitude_'+i).val(),$('#longitude_'+i).val()),
        map: map,
        icon: image
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent($('#loc_name_'+i).val());
          infowindow.open(map, marker);
        }
      })(marker, i));
    }		
	}
	google.maps.event.addDomListener(window, 'load', initialise); // Execute our 'initialise' function once the page has loaded.
</script>

<!--    mobile    -->
<script src="vendor/mobile_menu/js/site.min.js"></script>
<script src="vendor/mobile_menu/js/ma5-menu.min.js"></script>
    
<script>

    
    
    sentContactMails('contactFormSubmit', 'contactBtnReport', 'Feedbackmessage');
    sentContactMails('contactFormSubmitMobile', 'contactMobileBtnReport', 'FeedbackmessageMobile');
</script>
@endsection