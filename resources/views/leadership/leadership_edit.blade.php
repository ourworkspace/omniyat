<div class="d-flex card">
    <div class="card-header">
        <h5 class="card-title">Edit Leadership</h5>
    </div>
    <div class="card-body">
        <form class="row" action="{{route('leadership.update')}}" enctype="multipart/form-data" method="post" id="form_leadership">
            {{ csrf_field() }}
            <input type="hidden" name="leadershipId" value="{{$leadership->id}}">
            <div class="form-group col-md-12">
                <label>Name <span class="text-danger">*</span></label>
                <input type="text" required name="leadership_name" class="form-control" value="{{$leadership->leadership_name}}">
                @if($errors->has('leadership_name'))
                    <span class="text-danger">{{ $errors->first('leadership_name') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Designation <span class="text-danger">*</span></label>
                <input type="text" required name="leadership_designation" class="form-control" value="{{$leadership->leadership_designation}}">
                @if($errors->has('leadership_designation'))
                    <span class="text-danger">{{ $errors->first('leadership_designation') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                @if(isset($leadership->image) && file_exists($leadership->image))
                    <div class="row">
                        <div class="col-md-10 mt-4">
                            <label>Image  <span class="text-danger">*</span></label>
                            <input type="file" name="image" style="padding: 6px" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <img src="{{asset($leadership->image)}}" class="img img-thumbnail">
                        </div>
                    </div>
                @else
                    <label>Image <span class="text-danger">*</span></label>
                    <input type="file" required name="image" style="padding: 6px" class="form-control">
                @endif

                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
            </div>
            <!-- <div class="form-group col-md-12">
                <label>Short Description  <span class="text-danger">*</span></label>
                <textarea class="form-control" name="short_description" rows="4" required>{{$leadership->short_description}}</textarea>
                
                @if($errors->has('short_description'))
                    <span class="text-danger">{{ $errors->first('short_description') }}</span>
                @endif
            </div> -->
            <div class="form-group col-md-12">
                <label>Description <span class="text-danger">*</span> </label>
                <textarea class="form-control" name="long_description" rows="4">{{$leadership->long_description}}</textarea>
                <script>
                    CKEditorChange('long_description','myconfigText.js');
                </script>
                @if($errors->has('long_description'))
                    <span class="text-danger">{{ $errors->first('long_description') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <input type="submit" value="Update" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
<script src="{{asset('public/assets/vendors/jquery/validation.min.js')}}"></script>
<script type="text/javascript">
        $(document).ready(function(){
        for (var i in CKEDITOR.instances) {
            CKEDITOR.instances[i].on('change', function() {
                if(CKEDITOR.instances.long_description.getData().length >  0) {
                  $('label[for="long_description"]').hide();
                }
            });
        }
        
        $('#form_leadership').validate({
            ignore: "not:hidden",
            rules: {
                leadership_name: {
                    required: true,
                    maxlength: 100,
                },
                leadership_designation: {
                    required:true,
                },
                long_description: {
                    required: function() 
                    {
                     CKEDITOR.instances.long_description.updateElement();
                    },
                }
            }
        });
    });

</script>