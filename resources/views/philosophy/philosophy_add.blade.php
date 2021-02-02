<div class="d-flex card">
    <div class="card-header">
        <h5 class="card-title">Add Philosophy</h5>
    </div>
    <div class="card-body">
        <form action="{{route('philosophy.company.save')}}" enctype="multipart/form-data" class="row" method="post" id="form_philosophy">
            {{csrf_field()}}

            <div class="form-group col-md-12">
                <label>Page Sub Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="sub_title" value="">
                @if($errors->has('sub_title'))
                    <span class="text-danger">{{ $errors->first('sub_title') }}</span>
                @endif
            </div>
            <br/>
            &nbsp;&nbsp;&nbsp;<h4 style="padding-top: 30px;padding-bottom: 15px;">Section 1</h4>
            <div class="form-group col-md-12">
                <label>Image  <span class="text-danger">*</span></label>
                <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="image_1" style="padding: 6px">
                @if($errors->has('image_1'))
                    <span class="text-danger">{{ $errors->first('image_1') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Description <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="6" name="description_1" id="description_1"></textarea>
                <script>
                    CKEditorChange('description_1','myconfigText.js');
                </script>
                @if($errors->has('description_1'))
                    <span class="text-danger">{{ $errors->first('description_1') }}</span>
                @endif
            </div>
            <br/>
            &nbsp;&nbsp;&nbsp;<h4 style="padding-top: 30px;padding-bottom: 15px;">Section 2</h4>
            <div class="form-group col-md-12">
                <label for="image_2_1">Image 1</label>
                <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="image_2_1" style="padding: 6px">
                @if($errors->has('image_2_1'))
                    <span class="text-danger">{{ $errors->first('image_2_1') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Description <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="6" name="description_2" id="description_2"></textarea>
                <script>
                    CKEditorChange('description_2','myconfigText.js');
                </script>
                @if($errors->has('description_2'))
                    <span class="text-danger">{{ $errors->first('description_2') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Image 2</label>
                <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="image_2_2" style="padding: 6px">
                @if($errors->has('image_2_2'))
                    <span class="text-danger">{{ $errors->first('image_2_2') }}</span>
                @endif
            </div>
            <br/>
            &nbsp;&nbsp;&nbsp;<h4 style="padding-top: 30px;padding-bottom: 15px;">Section 3</h4>
            <div class="form-group col-md-12">
                <label>Title <span class="text-danger">*</span></label>
                <input type="text" name="title_3" class="form-control">
                @if($errors->has('title_3'))
                    <span class="text-danger">{{ $errors->first('title_3') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Description <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="6" name="description_3" id="description_3"></textarea>
                <script>
                    CKEditorChange('description_3','myconfigText.js');
                </script>
                @if($errors->has('description_3'))
                    <span class="text-danger">{{ $errors->first('description_3') }}</span>
                @endif
            </div>
            <br/>
            &nbsp;&nbsp;&nbsp;<h4 style="padding-top: 30px;padding-bottom: 15px;">Section 4</h4>
            <div class="form-group col-md-12">
                <label>Text Line 1<span class="text-danger">*</span></label>
                <input type="text" name="title_4_1" class="form-control">
                @if($errors->has('title_4_1'))
                    <span class="text-danger">{{ $errors->first('title_4_1') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Text Line 2<span class="text-danger">*</span></label>
                <input type="text" name="title_4_2" class="form-control">
                @if($errors->has('title_4_2'))
                    <span class="text-danger">{{ $errors->first('title_4_2') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Button Text</label>
                <input type="text" name="button_text" class="form-control">
                @if($errors->has('button_text'))
                    <span class="text-danger">{{ $errors->first('button_text') }}</span>
                @endif
            </div>

            <div class="form-group col-md-12">
                <label>Button URL</label>
                <input type="url" name="button_url" class="form-control">
                @if($errors->has('button_url'))
                    <span class="text-danger">{{ $errors->first('button_url') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <input type="submit" value="Save" class="btn btn-success pull-left">
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
                image_1: {
                    required:true,
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
                     CKEDITOR.instances.description_2.updateElement();
                    },
                    maxlength: 602,
                },
                description_3: {
                    required:function() 
                    {
                     CKEDITOR.instances.description_3.updateElement();
                    },
                },
                image_2_1: {
                    required: true
                },
                image_2_2: {
                    required: true
                },
                image_3: {
                    required: true
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