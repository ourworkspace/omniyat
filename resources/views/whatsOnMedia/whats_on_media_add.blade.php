<div class="d-flex card">
    <div class="card-header">
        <h5 class="card-title">Add What's On Media</h5>
    </div>
    <div class="card-body">
        <form class="row" action="{{route('whatsOnMedia.save')}}" enctype="multipart/form-data" method="post" id="whats_on_media_form">
            {{ csrf_field() }}
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
                <label>Thumb Image <span class="text-danger">*</span></label>
                <input type="file" accept=".png,.jpeg,.jpg" name="thumb_image" id="thumb_image" style="padding: 6px" class="form-control">
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
            <div class="form-group col-md-12">
                <label>Short Description <span class="text-danger">*</span></label>
                <textarea class="form-control" name="short_description" rows="4" maxlength="110"></textarea>
                
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
                <label>Upload pdf Document <span class="text-danger">*</span></label>
                <input type="file" required name="pdf_file" id="pdf_file" accept=".pdf" style="padding: 6px" class="form-control">
                @if($errors->has('pdf_file'))
                    <span class="text-danger">{{ $errors->first('pdf_file') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <input type="submit" value="Save" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
<script src="{{asset('public/assets/vendors/jquery/validation.min.js')}}"></script>
<script type="text/javascript">
    
    $(document).ready(function(){

        $('#thumb_image').bind('change', function (e) { //dynamic property binding
            var fileName = e.target.files[0].name;
            if(fileName != ''){
                $('label[for="thumb_image"]').hide();
            }
        });
        $('#large_image').bind('change', function (e) { //dynamic property binding
            var fileName = e.target.files[0].name;
            if(fileName != ''){
                $('label[for="thumb_image"]').hide();
            }
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
        $('#pdf_file').bind('change', function (e) { //dynamic property binding
            var fileName = e.target.files[0].name;
            if(fileName != ''){
                $('label[for="pdf_file"]').hide();
            }
        });
        $('#whats_on_media_form').validate({
            ignore: "not:hidden",
            rules: {
                date: {
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
                pdf_file: {
                    required:true
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