@extends('layouts.layout')
@section('page_title','Sponsorships : : Omniyat')
@section('page_content')
    <style>
        /*#cke_1_contents{
            height: 200px !important;
        }*/
        label.error{
            color: red !important;
        }
    </style>
    <!-- <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Sponsorships</h4>
            </div>
        </div>
    </div> -->
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin mb-3">
            <div class="d-flex card">
                <div class="card-header">
                    <h5 class="card-title">Add Sponsorships</h5>
                </div>
                <div class="card-body">
                    <form class="row" action="{{route('sponsorships.save')}}" enctype="multipart/form-data" method="post" id="sponsorship_form">
                        {{ csrf_field() }}
                        <div class="form-group col-md-12">
                            <label for="categoryId">Select Category <span class="text-danger">*</span></label>
                            <select class="form-control" name="categoryId" required>
                                <option value="">Select Category Name</option>
                                @foreach($SponsorshipsCategories as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Publish Date <span class="text-danger">*</span></label>
                            <input type="text" name="date" value="" class="form-control datepicker" autocomplete="off">
                            @if($errors->has('date'))
                                <span class="text-danger">{{ $errors->first('date') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label>Title <span class="text-danger">*</span></label>
                            <input type="text" required name="title" class="form-control">
                            @if($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label>Short Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="short_description" maxlength="110" rows="4"></textarea>
                            
                            @if($errors->has('short_description'))
                                <span class="text-danger">{{ $errors->first('short_description') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label>Long Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="long_description" rows="4"></textarea>
                            <script>
                                CKEditorChange('long_description','myconfig_images.js');
                            </script>
                            @if($errors->has('long_description'))
                                <span class="text-danger">{{ $errors->first('long_description') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label>Thumb Image <span class="text-danger">*</span></label>
                            <input type="file" required accept=".png,.jpeg,.jpg" name="thumb_image" id="thumb_image" style="padding: 6px" class="form-control">
                            @if($errors->has('thumb_image'))
                                <span class="text-danger">{{ $errors->first('thumb_image') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label>large Image <span class="text-danger">*</span></label>
                            <input type="file" required name="large_image" id="large_image" accept=".png,.jpeg,.jpg" style="padding: 6px" class="form-control">
                            @if($errors->has('large_image'))
                                <span class="text-danger">{{ $errors->first('large_image') }}</span>
                            @endif
                        </div>
                        <!-- <div class="form-group col-md-12">
                            <label>Upload pdf Document <span class="text-danger">*</span></label>
                            <input type="file" required name="document_pdf" accept=".pdf" style="padding: 6px" class="form-control">
                            @if($errors->has('document_pdf'))
                                <span class="text-danger">{{ $errors->first('document_pdf') }}</span>
                            @endif
                        </div> -->
                        
                        <div class="form-group col-md-12">
                            <label for="sponsorship_gallery_images">Gallery Images</label>
                            <input type="file" class="form-control fileInput4" accept=".jpg,.png,.jpeg" name="sponsorship_gallery_images[]" style="padding: 6px" multiple>
                            @if($errors->has('sponsorship_gallery_images'))
                                <span class="text-danger">{{ $errors->first('sponsorship_gallery_images') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" value="Save" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>      
        </div>
    </div>
<script src="{{asset('public/assets/vendors/jquery/validation.min.js')}}"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $('#date').datepicker({
                autoclose: true
            });
        for (var i in CKEDITOR.instances) {
            CKEDITOR.instances[i].on('change', function() {
                
                if(CKEDITOR.instances.long_description.getData().length >  0) {
                  $('label[for="long_description"]').hide();
                }
            });
        }
        $('#thumb_image').bind('change', function (e) { //dynamic property binding
            var fileName = e.target.files[0].name;
            if(fileName != ''){
                $('label[for="thumb_image"]').hide();
            }
        });
        $('#large_image').bind('change', function (e) { //dynamic property binding
            var fileName = e.target.files[0].name;
            if(fileName != ''){
                $('label[for="large_image"]').hide();
            }
        });
        $('#sponsorship_form').validate({
            ignore: "not:hidden",
            rules: {
                categoryId: {
                    required: true,
                },
                title: {
                    required:true,
                },
                thumb_image: {
                    required:true,
                },
                large_image: {
                    required:true,
                },
                short_description: {
                    required:true,
                    maxlength:110
                },
                long_description: {
                    required:function() 
                    {
                     CKEDITOR.instances.long_description.updateElement();
                    },
                }
            }
        });
    });
</script>     
@endsection