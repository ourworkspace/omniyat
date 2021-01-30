<div class="col-md-12 mt-4">
    <form action="{{route('design.sliders.upload')}}" enctype="multipart/form-data" method="post">
        {{csrf_field()}}

        <div class="d-flex card">
            <div class="card-header">
                <h5 class="card-title">Upload Sliders</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="slidersImages">Upload Images <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" accept=".jpg,.jpeg,.png,.svg" name="slidersImages[]" style="padding: 6px" multiple required>
                        @if($errors->has('slidersImages'))
                            <span class="text-danger">{{ $errors->first('slidersImages') }}</span>
                        @endif
                    </div>

                    <div class="form-group col-md-12">
                        <input type="submit" value="Save" class="btn btn-success pull-left">
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

<div class="col-md-12 mt-4">
    <div class="d-flex card">
        <div class="card-header">
            <h5 class="card-title">Uploaded Sliders</h5>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($slidersImages as $images)
                    @if(file_exists($images->image))
                        <div class="col-md-3" id="galleryImage{{$images->id}}">
                            <a href="{{asset($images->image)}}" target="_blank">
                                <img src="{{asset($images->image)}}" style="width: 100%;height: 180px;" class="img-thumbnail img-responsive">
                            </a>
                            <div class="row">
                                <a href="javascript:0;" class="btn btn-link text-danger" onclick="deleteGalleryImage({{$images->id}},'galleryImage{{$images->id}}');"> <i class="fa fa-trash-o"></i> Delete</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    function  deleteGalleryImage(sliderId,divId) {
        if(confirm('Do you want to delete image?')){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('design.images.delete')}}",
                data: {sliderId:sliderId},
                dataType: "json",
                success: function (response) {
                    //console.log(response);
                    if(response.res == true){
                        $("#"+divId).remove();
                    }
                }
            });
        }
    }
</script>