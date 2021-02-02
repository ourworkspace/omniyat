@extends('layouts.layout')
@section('page_title','About Company : : Omniyat')
@section('page_content')
<style>
    /*#cke_1_contents{
        height: 250px !important;
    }*/
    .error{
        color: red !important;
    }
</style>
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-3">
                <div class="d-flex card">
                    <div class="card-header">
                        <h5 class="card-title">{{isset($about->id)?'Edit':'Add'}} About Company</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{isset($about->id)?(route('about.company.update')):(route('about.company.save'))}}" enctype="multipart/form-data" class="row" method="post" id="aboutCompany">
                            {{csrf_field()}}
                            <input type="hidden" name="about_id" value="{{isset($about->id)?$about->id:''}}">
                            <div class="form-group col-md-12">
                                <label for="sub_title">Page Sub Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="sub_title" value="{{isset($about->sub_title)?$about->sub_title:''}}" >
                                @if($errors->has('sub_title'))
                                <span class="text-danger">{{ $errors->first('sub_title') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-12">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label for="LogoImage">Image <span class="text-danger">*</span> </label>
                                        <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="LogoImage" id="logo_image" style="padding: 6px" value="{{isset($about->image)?$about->image:''}}">
                                        @if($errors->has('LogoImage'))
                                        <span class="text-danger">{{ $errors->first('LogoImage') }}</span>
                                        @endif
                                    </div>
                                    @if(isset($about->image) && file_exists($about->image))
                                    <div class="col-md-2">
                                        <img src="{{isset($about->image)?asset($about->image):''}}" class="img-thumbnail img-responsive">
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Image Text <span class="text-danger">*</span></label>
                                <input type="text" name="image_text" class="form-control" value="{{isset($about->image_text)?$about->image_text:''}}">
                                @if($errors->has('image_text'))
                                <span class="text-danger">{{ $errors->first('image_text') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-12">
                                <label for="Description">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" rows="6" name="description">{{isset($about->description)?$about->description:''}}</textarea>
                                <script>
                                    CKEditorChange('description','myconfigText.js');
                                </script>
                                @if($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label>Button Text</label>
                                <input type="text" name="button_text" class="form-control" value="{{isset($about->button_text)?$about->button_text:''}}">
                                @if($errors->has('button_text'))
                                <span class="text-danger">{{ $errors->first('button_text') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label>Button URL</label>
                                <input type="url" name="button_url" class="form-control" value="{{isset($about->button_url)?$about->button_url:''}}">
                                @if($errors->has('button_url'))
                                <span class="text-danger">{{ $errors->first('button_url') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" value="{{isset($about->id)?'Update':'Add'}}" class="btn btn-success pull-left">
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
        $('#logo_image').attr('src', 'hello');
        for (var i in CKEDITOR.instances) {
            CKEDITOR.instances[i].on('change', function() {
                if(CKEDITOR.instances.description.getData().length >  0) {
                  $('label[for="description"]').hide();
                }
            });
        }
        
        $('#aboutCompany').validate({
            ignore: "not:hidden",
            rules: {
                sub_title: {
                    required: true,
                    maxlength: 50,
                },
                LogoImage: {
                    required:true,
                },
                image_text: {
                    required:true,
                },
                description: {
                    required: function() 
                    {
                     CKEDITOR.instances.description.updateElement();
                    },
                }
            }
        });
    });

</script>
@endsection