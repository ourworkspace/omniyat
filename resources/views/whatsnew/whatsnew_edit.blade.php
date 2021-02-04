<div class="d-flex card">
    <div class="card-header">
        <h5 class="card-title">Edit What's New</h5>
    </div>
    <div class="card-body">
        <form class="row" action="{{route('whatsNew.update')}}" enctype="multipart/form-data" method="post" id="whats_new_form">
            {{ csrf_field() }}
            <input type="hidden" name="whatsNewId" value="{{$whatsNew->id}}">
            <!-- <div class="form-group col-md-4">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach($categories as $value)
                        <option value="{{$value->id}}" {{ (isset($whatsNew->category_id) && $whatsNew->category_id == $value->id) ? 'selected' : '' }}>{{$value->name}}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                @endif
            </div> -->
            <div class="form-group col-md-12">
                <label>Publish Date <span class="text-danger">*</span></label>
                <input type="text" required name="date" value="{{date('m/d/Y',strtotime($whatsNew->date))}}" class="form-control datepicker">
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Title <span class="text-danger">*</span></label>
                <input type="text" required name="title" class="form-control" value="{{$whatsNew->title}}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                @if(isset($whatsNew->thumb_image) && file_exists($whatsNew->thumb_image))
                    <div class="row">
                        <div class="col-md-10 mt-4">
                            <label>Thumb Image </label>
                            <input type="file" name="thumb_image" style="padding: 6px" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <img src="{{asset($whatsNew->thumb_image)}}" class="img img-thumbnail">
                        </div>
                    </div>
                @else
                    <label>Thumb Image <span class="text-danger">*</span></label>
                    <input type="file" required name="thumb_image" style="padding: 6px" class="form-control">
                @endif

                @if($errors->has('thumb_image'))
                    <span class="text-danger">{{ $errors->first('thumb_image') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                @if(isset($whatsNew->large_image) && file_exists($whatsNew->large_image))
                    <div class="row">
                        <div class="col-md-10 mt-4">
                            <label>Large Image </label>
                            <input type="file" name="large_image" style="padding: 6px" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <img src="{{asset($whatsNew->large_image)}}" class="img img-thumbnail">
                        </div>
                    </div>
                @else
                    <label>Large Image <span class="text-danger">*</span></label>
                    <input type="file" required name="large_image" style="padding: 6px" class="form-control">
                @endif

                @if($errors->has('large_image'))
                    <span class="text-danger">{{ $errors->first('large_image') }}</span>
                @endif
            </div>

            <!-- <div class="form-group col-md-12">
                <label>Short Description </label>
                <textarea class="form-control" name="short_description" rows="4">{{$whatsNew->short_description}}</textarea>
                <script>
                    CKEditorChange('short_description','myconfig_images.js');
                </script>
                @if($errors->has('short_description'))
                    <span class="text-danger">{{ $errors->first('short_description') }}</span>
                @endif
            </div> -->

            <div class="form-group col-md-12">
                <label>Short Description  <span class="text-danger">*</span></label>
                <textarea class="form-control" name="short_description" rows="4" maxlength="85">{{$whatsNew->short_description}}</textarea>
                @if($errors->has('short_description'))
                    <span class="text-danger">{{ $errors->first('short_description') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Long Description </label>
                <textarea class="form-control" name="long_description" rows="4">{{$whatsNew->long_description}}</textarea>
                <script>
                    CKEditorChange('long_description','myconfig_images.js');
                </script>
                @if($errors->has('long_description'))
                    <span class="text-danger">{{ $errors->first('long_description') }}</span>
                @endif
            </div>
            <!-- <div class="form-group col-md-12">
                <label>Select Date <span class="text-danger">*</span></label>
                <input type="text" required name="date" value="{{date('m/d/Y',strtotime($whatsNew->date))}}" class="form-control datepicker">
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
            </div> -->
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
        
        $('#whats_new_form').validate({
            ignore: "not:hidden",
            rules: {
                date: {
                    required: true,
                },
                title: {
                    required:true,
                },
                /*thumb_image: {
                    required:true,
                },
                large_image: {
                    required:true,
                },*/
                short_description: {
                    required:true,
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