<section class="bg_black pt-30 w-100 page_footer">
<!--
    <div class="footer-container portfoliolist_footer">
        <div class="row">
            <div class="col-md-6">
                <h3 class="tss-text-white text-left text-uppercase m-0 fs-10 tss-msb"><a href="terms-and-conditions.php" class="tss-text-white">terms & Conditions</a> | <a href="privacy-policy.php" class="tss-text-white">privacy policy</a></h3>
            </div>
            <div class="col-md-6">
                <p class="tss-text-white text-right text-uppercase m-0 fs-10 tss-msb">Copyrights reserved 2021</p>
            </div>
        </div>
    </div>
-->
    <div class="container">
        <div class="newsletter-subscribe mb-3">
            <div class="row">
                <div class="col-md-5 col-lg-7 mb-4">
                    <h5>Sign up to receive exclusive news and offers about the latest launches</h5>
                </div>
                <div class="col-md-7 col-lg-5">
                    <form id="SubscribeNewsLettersMobile">
                        {{csrf_field()}}
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" required placeholder="Enter email">
                            <span class="input-group-btn">
                                <button class="btn btn-red" id="SubscribeNewsLetterBtnMobile" type="submit">Subscribe</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <hr class="mt-3 mt-sm-5" style="border-color:#505050;">
        </div>
        <div class="footer-widget m-0 w-100">
            <div class="row">
                <div class="col-md-5 col-lg-7 mb-4"> 
                    <a href="{{route('site.home')}}" class="footer-logo"> <img src="{{asset('public/site/img/logo-omniyat-white.svg')}}" alt="Omniyat"> </a>
                </div>
                <div class="col-md-3 col-lg-2 mb-4">
                    <section class="widget_nav_menu">
                        <h3 class="widget-title">COMPANY</h3>
                        <div class="menu-footer-menu">
                            <ul class="menu flex-column">
                                <li><a href="{{route('site.about.company')}}" class="nav-link">About Omniyat</a></li>
                                <li><a href="{{route('site.philosophy')}}" class="nav-link">Philosophy</a></li>
                                <li><a href="{{route('site.leadership')}}" class="nav-link">Leadership</a></li>
                            </ul>
                            <ul class="menu flex-column mt-20">
                                <li><a href="{{route('site.portfolio')}}" class="nav-link">Portfolio</a></li>
                            </ul>
                        </div>
                    </section>
                </div>
                <div class="col-md-3 col-lg-2 col-md-offset-1 col-lg-offset-1 mb-4">
                    <section class="widget_nav_menu">
                        <h3 class="widget-title">Media</h3>
                        <div class="menu-footer-menu">
                            <ul class="menu flex-column">
                                <li><a href="{{route('site.whats.new')}}" class="nav-link">What's new</a></li>
                                <li><a href="{{route('site.whats.on.media')}}" class="nav-link">What's on media</a></li>
                                <li><a href="{{route('site.press.release')}}" class="nav-link">Press Releases</a></li>
                                <li><a href="{{route('site.press.kit')}}" class="nav-link">Press Kit</a></li>
                                <li><a href="{{route('site.csr')}}" class="nav-link">CSR</a></li>
                                <li><a href="{{route('site.sponsorships')}}" class="nav-link">Sponsorships</a></li>
                                <li><a href="{{route('site.portfolio')}}" class="nav-link">Contact Us</a></li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="footer-widget m-0  w-100">
            <div class="pt-15 pb-30">
                <div class="row">
                    <div class="col-md-3 col-lg-2 col-md-offset-9 col-lg-offset-10 mb-4">
                        <ul class="w-100 footer-social_icons text-left">
                            <li>
                                <a href="https://www.facebook.com/OmniyatOfficial" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/omniyatofficial/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/OmniyatOfficial" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/company/omniyat-group" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCZvDnJo6wz5WUm1K8PcUfKw/videos" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div class="footer-bottom w-100">
        <div class="container text-center">
            <div class="menu-legal-menu-container">
                <ul class="menu">
                    <li class="menu-item"><a href="{{route('site.terms.and.conditions')}}">TERMS & CONDITIONS</a></li>
                    <li class="menu-item"><a href="{{route('site.privacy.policy')}}">PRIVACY POLICY</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>



<div class="btm-fixed-btn">
    <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal"><i class="fa fa-commenting-o" aria-hidden="true"></i></a>
</div>


<div id="myModal" class="modal fade info" role="dialog">
    <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" id="popover-close">&times;</button>
          </div>
        <div class="modal-body">
            <h4 class="text-center tss-optima">REGISTER YOUR INTEREST</h4>
            <form method="POST" id="contactFormSubmit" action="javascript:0;">
                <div class="row">
                    <div class="col-md-6 px-3">
                        <div class="form-group my-5">
                            <input type="text" class="form-control" id="f_name" placeholder="FIRST NAME" required="" name="first_name">
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
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="PHONE" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 px-3">
                        <div class="form-group my-5">
                            <textarea class="form-control" rows="5" id="message" placeholder="MESSAGE" required="" name="message"></textarea>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 px-3">
                        <button type="submit" id="contactBtnReport" class="btn btn-link btn-red btn-block text-uppercase tss-msb py-10 px-45 my-5 fs-14">Inquire more</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--
<script>
    $(document).ready(function(){       
        $('#myModal').modal('show');
    }); 
</script>
-->
<script>
    $("#SubscribeNewsLettersMobile").submit(function(event){
        event.preventDefault();
        //alert('Save subscribe news letters');
        $("#SubscribeNewsLetterBtnMobile").text('Subscribing...');
        $.ajax({
            type: "POST",
            url: "{{route('save.subscribe.news.letters')}}",
            data: $("#SubscribeNewsLetters").serialize(),
            dataType: "JSON",
            success: function (res) {
                console.log(res);
                $("#SubscribeNewsLetterBtnMobile").text('Subscribe');
                /*if(res.response == true){
                    swal({
                        text: res.message,
                        icon: "success",
                        button: "Close"
                    });
                }else{
                    swal({
                        text: res.message,
                        icon: "error",
                        button: "Close"
                    });
                }*/
                $("#SubscribeNewsLettersMobile").trigger('reset');
            }
        });
    });
</script>