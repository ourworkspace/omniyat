@extends('layouts.layout')
@section('page_title','ContactUs : : Omniyat')
@section('page_content')
    <style>
        #cke_1_contents{
            height: 200px !important;
        }
    </style>
    <!-- <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">ContactUs</h4>
            </div>
        </div>
    </div> -->
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Add ContactUs</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('contactus.save')}}" enctype="multipart/form-data" class="row" method="post">
                                {{csrf_field()}}
                                    <div class="col-md-12">
                                        <label for="sub_title">Sub Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="sub_title" value="" placeholder="Sub Title" required>
                                        @if($errors->has('sub_title'))
                                            <span class="text-danger">{{ $errors->first('sub_title') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-12">
                                        <label for="form_title">Form Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="form_title" value="" placeholder="Form Title" required>
                                        @if($errors->has('form_title'))
                                            <span class="text-danger">{{ $errors->first('form_title') }}</span>
                                        @endif
                                    </div>

                                <div class="col-md-12 locationAddressBox">
                                    <br/>
                                    <h5>Section 1</h5>
                                    <br/>
                                    <div class="form-group">
                                        <label for="section1_title">Section Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="section1_title" value="" placeholder="Section Title" required>
                                        @if($errors->has('section1_title'))
                                            <span class="text-danger">{{ $errors->first('section1_title') }}</span>
                                        @endif
                                    </div>
                                    
                                        <div class="row">
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <input type="text" class="form-control" name="locationTitle[]" required placeholder="Title">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <textarea class="form-control" name="locationAddress[]" required rows="2" placeholder="Address"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="javascript:0;" class="btn btn-success location_addBtn add_location"> + </a>
                                            </div>
                                        </div>
                                    
                                </div>

                                <div class="col-md-12 contactNumberBox">
                                    <br/>
                                    <h5>Section 2</h5>
                                    <br/>
                                    <div class="form-group">
                                        <label for="section2_title">Section Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="section2_title" value="" placeholder="Section Title" required>
                                        @if($errors->has('section2_title'))
                                            <span class="text-danger">{{ $errors->first('section2_title') }}</span>
                                        @endif
                                    </div>
                                    
                                        <div class="row">
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <input type="text" class="form-control" name="contactTitle[]" required placeholder="Title">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <input type="text" class="form-control" name="mobileNumber[]" required placeholder="Contact Number">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="javascript:0;" class="btn btn-success contactNumberAdd add_contact"> + </a>
                                            </div>
                                        </div>
                                    
                                </div>

                                <div class="col-md-12 emailBox">
                                    <label for="section2_title">Emails <span class="text-danger">*</span></label>
                                    
                                    
                                        <div class="row">
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <input type="email" class="form-control" name="emails[]" required placeholder="Email address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="javascript:0;" class="btn btn-success email_add"> + </a>
                                            </div>
                                        </div>
                                    
                                </div>

                                <div class="col-md-12 socialMediaBox">
                                    <br/>
                                    <h5>Section 3</h5>
                                    <br/>
                                    <div class="form-group">
                                        <label for="section4_title">Section Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="section4_title" value="" placeholder="Section Title" required>
                                        @if($errors->has('section4_title'))
                                            <span class="text-danger">{{ $errors->first('section4_title') }}</span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="facebook">Facebook</label>
                                            <input type="url" class="form-control" value="" name="facebook" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="Instagram">Instagram</label>
                                            <input type="url" class="form-control" value="" name="instagram" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="Twitter">Twitter</label>
                                            <input type="url" class="form-control" value="" name="twitter" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="LinkedIn">LinkedIn</label>
                                            <input type="url" class="form-control" value="" name="linkedIn" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="Youtube">Youtube</label>
                                            <input type="url" class="form-control" name="youtube" value="" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="form_title">Sub Link Title 1 <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="terms_conditions_title" value="" placeholder="Text" required>
                                            @if($errors->has('terms_conditions_title'))
                                                <span class="text-danger">{{ $errors->first('terms_conditions_title') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="form_title">Sub Link URL 1 <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="terms_conditions_url" value="" placeholder="URL" required>
                                            @if($errors->has('terms_conditions_url'))
                                                <span class="text-danger">{{ $errors->first('terms_conditions_url') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="form_title">Sub Link Title 2<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="privacy_policy_title" value="" placeholder="Text" required>
                                            @if($errors->has('privacy_policy_title'))
                                                <span class="text-danger">{{ $errors->first('privacy_policy_title') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="form_title">Sub Link URL 2 <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="privacy_policy_url" value="" placeholder="URL" required>
                                            @if($errors->has('privacy_policy_url'))
                                                <span class="text-danger">{{ $errors->first('privacy_policy_url') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mapLocation">
                                    <br/>
                                    <h5>Section 4</h5>
                                    <br/>
                                    <div class="form-group">
                                        <label for="section1_title">Map Locations <span class="text-danger">*</span></label>
                                    </div>
                                    
                                        <div class="row">
                                            <div class="col-md-11">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <input type="text" class="form-control" name="location_name[]" required placeholder="Location Name">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <input type="text" class="form-control" name="latitude[]" required placeholder="Latitude">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <input type="text" class="form-control" name="longitude[]" required rows="2" placeholder="Longitude">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <a href="javascript:0;" class="btn btn-success location_addBtn add_map_locations"> + </a>
                                            </div>
                                        </div>
                                    
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <input type="submit" value="Update" class="btn btn-success pull-left">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">

        $(document).ready(function() {
        var i = 1;
        $('.add_location').on('click', function() {
        var field1 = '<div class="row remove_div_'+i+'"><div class="col-md-11"><div class="row"><div class="form-group col-md-12"><input type="text" class="form-control" name="locationTitle[]" required placeholder="Title"></div><div class="form-group col-md-12"><textarea class="form-control" name="locationAddress[]" required rows="2" placeholder="Address"></textarea></div></div></div><div class="col-md-1"><a href="javascript:0;" class="btn btn-success location_removeBtn"  onclick="removeDiv('+i+')"> - </a></div></div>';
        $('.locationAddressBox').append(field1);
        i = i+1;
      });
      var j = 1;
      $('.add_contact').on('click', function() {
        var field2 = '<div class="row cont_remove_div_'+j+'"><div class="col-md-11"><div class="row"><div class="form-group col-md-12"><input type="text" class="form-control" name="contactTitle[]" required placeholder="Title"></div><div class="form-group col-md-12"><input type="text" class="form-control" name="mobileNumber[]" required placeholder="Contact Number"></div></div></div><div class="col-md-1"><a href="javascript:0;" class="btn btn-success contactNumberRemove" onclick="removeConatctDiv('+j+')">  - </a></div></div>';
        $('.contactNumberBox').append(field2);
        j = j+1;
      });
      var k = 1;
      $('.email_add').on('click', function() {
        var field3 = '<div class="row email_remove_div_'+k+'"><div class="col-md-11"><div class="row"><div class="form-group col-md-12"><input type="email" class="form-control" name="emails[]" required placeholder="Email address"></div></div></div><div class="col-md-1"><a href="javascript:0;" class="btn btn-success email_remove" onclick="removeEmailDiv('+k+')"> - </a></div></div>';
        $('.emailBox').append(field3);
        k = k+1;
      });
      var l = 1;
        $('.add_map_locations').on('click', function() {
        var field4 = '<div class="row remove_map_div_'+l+'"><div class="col-md-11"><div class="row"><div class="form-group col-md-12"><input type="text" class="form-control" name="location_name[]" required placeholder="Location Name"></div><div class="form-group col-md-12"><input type="text" class="form-control" name="latitude[]" required placeholder="Latitude"></div><div class="form-group col-md-12"><input type="text" class="form-control" name="longitude[]" required placeholder="Longitude"></div><div class="form-group col-md-12"></div></div></div><div class="col-md-1"><a href="javascript:0;" class="btn btn-success location_removeBtn"  onclick="removeMapDiv('+l+')"> - </a></div></div>';
        $('.mapLocation').append(field4);
        l = l+1;
      });
         
    })

    function removeDiv(div_id){
        $(".remove_div_"+div_id).remove();
    }
    function removeConatctDiv(div_id){
        $(".cont_remove_div_"+div_id).remove();
    }
    function removeEmailDiv(div_id){
        $(".email_remove_div_"+div_id).remove();
    }
    function removeExistDiv(div_id){
        $(".remove_exist_div_"+div_id).remove();
    }
    function removeExistConatctDiv(div_id){
        $(".cont_exist_remove_div_"+div_id).remove();
    }
    function removeExistEmailDiv(div_id){
        $(".remove_exist_email_div_"+div_id).remove();
    }
    function removeMapDiv(div_id){
        $(".remove_map_div_"+div_id).remove();
    }
    function removeMapExistDiv(div_id){
        $(".remove_map_exist_div_"+div_id).remove();
    }
</script>
@endsection