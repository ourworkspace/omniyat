@if(isset($galleryAbout))
    <div class="col-md-12">
        <form action="{{route('gallery.update.about')}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <input type="hidden" name="galleryAboutId" value="{{$galleryAbout->id}}">
            <div class="d-flex card">
                <div class="card-header">
                    <h5 class="card-title">About Gallery</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="titleName">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="{{$galleryAbout->title}}" name="titleName" required>
                            @if($errors->has('titleName'))
                                <span class="text-danger">{{ $errors->first('titleName') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <label for="Summary">Summary</label>
                            <textarea class="form-control" rows="5" maxlength="250" name="summary">{{$galleryAbout->summary}}</textarea>
                            <script>
                                //CKEditorChange('Description','myconfigText.js');
                            </script>
                            @if($errors->has('summary'))
                                <span class="text-danger">{{ $errors->first('summary') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <input type="submit" value="Update" class="btn btn-success pull-left">
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@else
    <div class="col-md-12">
        <form action="{{route('gallery.save.about')}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}

            <div class="d-flex card">
                <div class="card-header">
                    <h5 class="card-title">About Gallery</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="titleName">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="titleName" required>
                            @if($errors->has('titleName'))
                                <span class="text-danger">{{ $errors->first('titleName') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <label for="Summary">Summary</label>
                            <textarea class="form-control" rows="5" maxlength="250" name="summary"></textarea>
                            <script>
                                //CKEditorChange('Description','myconfigText.js');
                            </script>
                            @if($errors->has('summary'))
                                <span class="text-danger">{{ $errors->first('summary') }}</span>
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
@endif


<div class="col-md-12 mt-4">
    <form action="{{route('gallery.upload')}}" enctype="multipart/form-data" method="post">
        {{csrf_field()}}

        <div class="d-flex card">
            <div class="card-header">
                <h5 class="card-title">Upload Gallery</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="galleryImages">Upload Images <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" accept=".jpg,.jpeg,.png,.svg" name="galleryImages[]" style="padding: 6px" multiple required>
                        @if($errors->has('galleryImages'))
                            <span class="text-danger">{{ $errors->first('galleryImages') }}</span>
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

@include('gallery.gallery_list')