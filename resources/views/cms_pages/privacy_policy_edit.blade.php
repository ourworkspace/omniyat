@extends('layouts.layout')
@section('page_title','Privacy Policy : : Omniyat')
@section('page_content')
    <style>
        label.error{
            color: red !important;
        }
    </style>
    <!-- <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Privacy Policy</h4>
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
                            <h5 class="card-title">Edit Privacy Policy</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('privacy.policy.save')}}" enctype="multipart/form-data" class="row" method="post" id="privacy_policy_form">
                                {{csrf_field()}}
                                <div class="form-group col-md-12">
                                    <label for="sub_title">Page Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="sub_title" value="{{$privacyPolicy->sub_title}}" required>
                                    @if($errors->has('sub_title'))
                                        <span class="text-danger">{{ $errors->first('sub_title') }}</span>
                                    @endif
                                </div>
                                <!-- <div class="form-group col-md-12">
                                    <label for="TitleName">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{$privacyPolicy->title}}" name="TitleName" required>
                                    @if($errors->has('TitleName'))
                                        <span class="text-danger">{{ $errors->first('TitleName') }}</span>
                                    @endif
                                </div> -->
                                <div class="form-group col-md-12">
                                    <label for="Description">Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="6" name="Description">{{$privacyPolicy->description}}</textarea>
                                    <script>
                                        CKEditorChange('Description','myconfig_tcps.js');
                                    </script>
                                    @if($errors->has('Description'))
                                        <span class="text-danger">{{ $errors->first('Description') }}</span>
                                    @endif
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
<script src="{{asset('public/assets/vendors/jquery/validation.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        for (var i in CKEDITOR.instances) {
            CKEDITOR.instances[i].on('change', function() {
                if(CKEDITOR.instances.Description.getData().length >  0) {
                    $('label[for="Description"]').hide();
                }else{
                    $('label[for="Description"]').show();
                }
            });
        }
        $('#privacy_policy_form').validate({
            ignore: "not:hidden",
            rules: {
                sub_title: {
                    required: true,
                    maxlength: 50,
                },
                Description: {
                    required: function() 
                    {
                     CKEDITOR.instances.Description.updateElement();
                    },
                }
            }
        });
        
    });

</script>    
@endsection