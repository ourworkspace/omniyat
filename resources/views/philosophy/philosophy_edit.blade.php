<div class="d-flex card">
    <div class="card-header">
        <h5 class="card-title">Edit philosophy Company</h5>
    </div>
    <div class="card-body">
        <form action="{{route('philosophy.company.update')}}" enctype="multipart/form-data" class="row" method="post" id="form_philosophy">
            {{csrf_field()}}
            <input type="hidden" name="philosophy_id" value="{{$philosophy->id}}">
            <!-- <div class="form-group col-md-12">
                <label for="titleName">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="titleName" value="{{$philosophy->title}}" required>
                @if($errors->has('titleName'))
                    <span class="text-danger">{{ $errors->first('titleName') }}</span>
                @endif
            </div> -->
            <div class="form-group col-md-12">
                <label for="sub_title">Page Sub Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="sub_title" value="{{$philosophy->sub_title}}" required>
                @if($errors->has('sub_title'))
                    <span class="text-danger">{{ $errors->first('sub_title') }}</span>
                @endif
            </div>
            &nbsp;&nbsp;&nbsp;<h4 style="padding-top: 30px;padding-bottom: 15px;">Section 1</h4>
            <div class="form-group col-md-12">
                <div class="row">
                    <div class="col-md-10">
                        <label for="image_1">Image  <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="image_1" style="padding: 6px">
                        @if($errors->has('image_1'))
                            <span class="text-danger">{{ $errors->first('image_1') }}</span>
                        @endif
                    </div>
                    @if(isset($philosophy->image_1) && file_exists($philosophy->image_1))
                        <div class="col-md-2">
                            <img src="{{asset($philosophy->image_1)}}" class="img-thumbnail img-responsive">
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="Description">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="6" name="description_1" id="description_1">{{$philosophy->description_1}}</textarea>
                <script>
                    CKEditorChange('description_1','myconfigText.js');
                </script>
                @if($errors->has('description_1'))
                    <span class="text-danger">{{ $errors->first('description_1') }}</span>
                @endif
            </div>
            &nbsp;&nbsp;&nbsp;<h4 style="padding-top: 30px;padding-bottom: 15px;">Section 2</h4>
            <div class="form-group col-md-12">
                <div class="row">
                    <div class="col-md-10">
                        <label for="image_2_1">Image  <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="image_2_1" style="padding: 6px">
                        @if($errors->has('image_2_1'))
                            <span class="text-danger">{{ $errors->first('image_2_1') }}</span>
                        @endif
                    </div>
                    @if(isset($philosophy->image_2_1) && file_exists($philosophy->image_2_1))
                        <div class="col-md-2">
                            <img src="{{asset($philosophy->image_2_1)}}" class="img-thumbnail img-responsive">
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="Description">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="6" name="description_2" id="description_2">{{$philosophy->description_2}}</textarea>
                <script>
                    CKEditorChange('description_2','myconfigText.js');
                </script>
                @if($errors->has('description_2'))
                    <span class="text-danger">{{ $errors->first('description_2') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <div class="row">
                    <div class="col-md-10">
                        <label for="image_2_2">Image  <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="image_2_2" style="padding: 6px">
                        @if($errors->has('image_2_2'))
                            <span class="text-danger">{{ $errors->first('image_2_2') }}</span>
                        @endif
                    </div>
                    @if(isset($philosophy->image_2_2) && file_exists($philosophy->image_2_2))
                        <div class="col-md-2">
                            <img src="{{asset($philosophy->image_2_2)}}" class="img-thumbnail img-responsive">
                        </div>
                    @endif
                </div>
            </div>
            &nbsp;&nbsp;&nbsp;<h4 style="padding-top: 30px;padding-bottom: 15px;">Section 3</h4>
            <div class="form-group col-md-12">
                <label>Title <span class="text-danger">*</span></label>
                <input type="text" name="title_3" class="form-control" value="{{$philosophy->title_3}}">
                @if($errors->has('title_3'))
                    <span class="text-danger">{{ $errors->first('title_3') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label for="Description">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="6" name="description_3" id="description_3">{{$philosophy->description_3}}</textarea>
                <script>
                    CKEditorChange('description_3','myconfigText.js');
                </script>
                @if($errors->has('description_3'))
                    <span class="text-danger">{{ $errors->first('description_3') }}</span>
                @endif
            </div>
            &nbsp;&nbsp;&nbsp;<h4 style="padding-top: 30px;padding-bottom: 15px;">Section 4</h4>
            <div class="form-group col-md-12">
                <label>Text Line 1<span class="text-danger">*</span></label>
                <input type="text" name="title_4_1" class="form-control" value="{{$philosophy->title_4_1}}">
                @if($errors->has('title_4_1'))
                    <span class="text-danger">{{ $errors->first('title_4_1') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Text Line 2<span class="text-danger">*</span></label>
                <input type="text" name="title_4_2" class="form-control" value="{{$philosophy->title_4_2}}">
                @if($errors->has('title_4_2'))
                    <span class="text-danger">{{ $errors->first('title_4_2') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Button Text <span class="text-danger">*</span></label>
                <input type="text"  name="button_text" class="form-control" value="{{$philosophy->button_text}}">
                @if($errors->has('button_text'))
                    <span class="text-danger">{{ $errors->first('button_text') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Button URL <span class="text-danger">*</span></label>
                <input type="url" name="button_url" class="form-control" value="{{$philosophy->button_url}}">
                @if($errors->has('button_url'))
                    <span class="text-danger">{{ $errors->first('button_url') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <input type="submit" value="Update" class="btn btn-success pull-left">
            </div>
        </form>
    </div>
</div>
<script src="{{asset('public/assets/vendors/jquery/validation.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        for (var i in CKEDITOR.instances) {
            CKEDITOR.instances[i].on('change', function() {
                if(CKEDITOR.instances.description_1.getData().length >  0) {
                  $('label[for="description_1"]').hide();
                }
                if(CKEDITOR.instances.description_2.getData().length >  0) {
                  $('label[for="description_2"]').hide();
                }
                if(CKEDITOR.instances.description_3.getData().length >  0) {
                  $('label[for="description_3"]').hide();
                }
            });
        }
        
        $('#form_philosophy').validate({
            ignore: "not:hidden",
            rules: {
                sub_title: {
                    required: true,
                    maxlength: 50,
                },
                description_1: {
                    required:function() 
                    {
                     CKEDITOR.instances.description_1.updateElement();
                    },
                },
                description_2: {
                    required:function() 
                    {
                     CKEDITOR.instances.description_1.updateElement();
                    },
                    maxlength: 602
                },
                description_3: {
                    required:function() 
                    {
                     CKEDITOR.instances.description_1.updateElement();
                    },
                },
                title_3: {
                    required: true
                },
                title_4_1: {
                    required: true
                },
                title_4_2: {
                    required: true
                }
            }
        });
    });

</script>