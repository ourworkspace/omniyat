<div class="d-flex card">
    <div class="card-header">
        <h5 class="card-title">Add About Company</h5>
    </div>
    <div class="card-body">
        <form action="{{route('about.company.save')}}" enctype="multipart/form-data" class="row" method="post" id="aboutCompany">
            <!-- <form id="add_rating" action="javascript:void(0);"> -->
            {{csrf_field()}}

            <div class="form-group col-md-12">
                <label>Page Sub Title <span class="text-danger">*</span></label>
                <input type="text" name="sub_title" class="form-control">
                @if($errors->has('sub_title'))
                    <span class="text-danger">{{ $errors->first('sub_title') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label for="LogoImage">Image  <span class="text-danger">*</span></label>
                <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="LogoImage" style="padding: 6px">
                @if($errors->has('LogoImage'))
                    <span class="text-danger">{{ $errors->first('LogoImage') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Image Text <span class="text-danger">*</span></label>
                <input type="text" name="image_text" class="form-control">
                @if($errors->has('image_text'))
                    <span class="text-danger">{{ $errors->first('image_text') }}</span>
                @endif
            </div>

            <div class="form-group col-md-12">
                <label for="Description">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="6" name="description"></textarea>
                <script>
                    CKEditorChange('description','myconfigText.js');
                </script>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
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
                <!-- <button id="button2id" name="button2id" class="btn btn-black form-control">Save</button> -->
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
                if(CKEDITOR.instances.description.getData().length >  0) {
                    $('label[for="description"]').hide();
                }else{
                    $('label[for="description"]').show();
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
                    maxlength: 100,
                },
                /*description: {
                    required: true
                }*/
            }
        });
        /*for (var i in CKEDITOR.instances) {
            CKEDITOR.instances[i].on('change', function() {
                if(CKEDITOR.instances.description.getData().length >  0) {
                    $('label[for="description"]').hide();
                }else{
                    $('label[for="description"]').show();
                }
            });
        }
        
        $('#aboutCompany').validate({
            onsubmit: function(){
                    CKEditorUpdate();
                    return true;
                },
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
                    maxlength: 100,
                },
                description: {
                    required: true
                }
            }
        });
        function CKEditorUpdate() {
            for (instance in CKEDITOR.instances)
                if(CKEDITOR.instances.description.getData().length >  0) {
                    $('label[for="description"]').hide();
                }
                CKEDITOR.instances[instance].updateElement();
        }*/
        /*$('#aboutCompany').submit(function() {
            
            for (var i in CKEDITOR.instances) {
                CKEDITOR.instances[i].on('change', function() {
                    if(CKEDITOR.instances.description.getData().length >  0) {
                        $('label[for="description"]').hide();
                    }else{
                        $('label[for="description"]').show();
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
                        maxlength: 100,
                    },
                    description: {
                        required: true
                    }
                }
            });
            alert("sdfsd");return;
        });*/
    });

</script>