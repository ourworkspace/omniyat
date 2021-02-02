    <div id="download_modal" class="modal fade download_modal vertical-modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->

            <div class="modal-content">
                <div class="modal-body">
                    <a href="javascript:void(0)" data-dismiss="modal" class="close">
                        <span></span><span></span>
                    </a>  

                    <h4 class="text-center text-black fs-18 tss-lh-1-4 text-uppercase tss-mr">fill in the information to <br>download the file</h4>
                    <div id="floorPlanMessagePopUp"></div>
                    <form method="POST" id="floorPlanPopUp" action="javascript:0;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-6 px-3">
                                <div class="form-group my-5">
                                    <input type="text" class="form-control" name="first_name" id="f_name" placeholder="FIRST NAME" required>
                                </div>
                            </div>

                            <div class="col-md-6 px-3">
                                <div class="form-group my-5">
                                    <input type="text" class="form-control" name="last_name" id="l_name" placeholder="LAST NAME" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 px-3">
                                <div class="form-group my-5">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="EMAIL" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 px-3">
                                <div class="form-group my-5">
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="PHONE" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 px-3">
                                <div class="form-group my-5">
                                    <textarea class="form-control" name="message" rows="6" id="message" placeholder="MESSAGE" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 px-3">
                                <button type="submit" id="floorPlanBtn" class="btn btn-link btn-red btn-block text-uppercase tss-msb py-10 px-45 my-5 fs-14">inquire more</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    

    <div id="download_modal_1" class="modal fade download_modal vertical-modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <a href="javascript:void(0)" data-dismiss="modal" class="close">
                        <span></span><span></span>
                    </a>  
                    <h4 class="text-center text-black fs-18 tss-lh-1-4 text-uppercase tss-mr">fill in the information to <br>download the file</h4>
                    <div id="contactBtnReportMessagePopUp"></div>
                    <form method="POST" id="contactFormSubmitPopUp" action="javascript:0;">
                        <div class="row">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-md-6 px-3">
                                <div class="form-group my-5">
                                    <input type="text" class="form-control" id="f_name" placeholder="FIRST NAME" name="first_name" required>
                                </div>
                            </div>

                            <div class="col-md-6 px-3">
                                <div class="form-group my-5">
                                    <input type="text" class="form-control" id="l_name" placeholder="LAST NAME" name="last_name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 px-3">
                                <div class="form-group my-5">
                                    <input type="email" class="form-control" id="email" placeholder="EMAIL" name="email" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 px-3">
                                <div class="form-group my-5">
                                    <input type="text" class="form-control" id="phone" placeholder="PHONE" name="phone" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 px-3">
                                <div class="form-group my-5">
                                    <textarea class="form-control" rows="6" id="message" name="message" placeholder="MESSAGE" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 px-3">
                                <button type="submit" id="contactBtnReportPopUp" class="btn btn-link btn-red btn-block text-uppercase tss-msb py-10 px-45 my-5 fs-14">inquire more</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
    <?php if(isset($brochure) && file_exists($brochure->links)):
        $link = asset($brochure->links);
    endif; ?>
<script>
    
    sentContactMails('contactFormSubmitPopUp', 'contactBtnReportPopUp', 'contactBtnReportMessagePopUp','download','{{$link}}');
    sentContactMails('floorPlanPopUp', 'floorPlanBtn', 'floorPlanMessagePopUp');
</script> 