<div class="col-md-12 mt-4">
    <div class="d-flex card">
        <div class="card-header">
            <h5 class="card-title">Uploaded Gallery</h5>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($galleryImages as $images)
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
    function  deleteGalleryImage(galleryId,divId) {
        if(confirm('Do you want to delete image?')){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('gallery.images.delete')}}",
                data: {galleryId:galleryId},
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