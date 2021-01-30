<div class="d-flex card">
    <div class="card-header">
        <h5 class="card-title">Edit Whats On Media</h5>
    </div>
    <div class="card-body">
        <form class="row" action="{{route('whatsOnMedia.update')}}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <input type="hidden" value="{{$WhatsOnMedia->id}}" name="Id">
            <div class="form-group col-md-12">
                <label>Title <span class="text-danger">*</span></label>
                <input type="text" required name="title" class="form-control" value="{{$WhatsOnMedia->title}}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                @if(isset($WhatsOnMedia->thumb_image) && file_exists($WhatsOnMedia->thumb_image))
                    <div class="row">
                        <div class="col-md-10 mt-2">
                            <label>Thumb Image </label>
                            <input type="file" name="thumb_image" style="padding: 6px" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <img src="{{asset($WhatsOnMedia->thumb_image)}}" class="img img-thumbnail">
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
                @if(isset($WhatsOnMedia->large_image) && file_exists($WhatsOnMedia->large_image))
                    <div class="row">
                        <div class="col-md-10 mt-2">
                            <label>Large Image </label>
                            <input type="file" name="large_image" style="padding: 6px" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <img src="{{asset($WhatsOnMedia->large_image)}}" class="img img-thumbnail">
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
            <div class="form-group col-md-12">
                <label>Short Description </label>
                <textarea class="form-control" name="short_description" rows="4">{{$WhatsOnMedia->short_description}}</textarea>
                
                @if($errors->has('short_description'))
                    <span class="text-danger">{{ $errors->first('short_description') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Long Description </label>
                <textarea class="form-control" name="long_description" rows="4">{{$WhatsOnMedia->long_description}}</textarea>
                <script>
                    CKEditorChange('long_description','myconfigText.js');
                </script>
                @if($errors->has('long_description'))
                    <span class="text-danger">{{ $errors->first('long_description') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                @if(isset($WhatsOnMedia->pdf_file) && file_exists($WhatsOnMedia->pdf_file))
                    <div class="row">
                        <div class="col-md-11 mt-2">
                            <label>Upload pdf Document </label>
                            <input type="file" name="pdf_file" accept=".pdf" style="padding: 6px" class="form-control">
                        </div>
                        <div class="col-md-1 pt-4">
                            <a href="{{asset($WhatsOnMedia->pdf_file)}}" style="font-size:30px" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                        </div>
                    </div>
                @else
                    <label>Upload pdf Document <span class="text-danger">*</span></label>
                    <input type="file" required name="pdf_file" accept=".pdf" style="padding: 6px;" class="form-control">
                @endif

                @if($errors->has('pdf_file'))
                    <span class="text-danger">{{ $errors->first('pdf_file') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <label>Select Date <span class="text-danger">*</span></label>
                <input type="text" required name="date" value="{{date('m/d/Y',strtotime($WhatsOnMedia->date))}}" class="form-control datepicker" autocomplete="off">
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
            </div>
            <div class="form-group col-md-12">
                <input type="submit" value="Update" class="btn btn-success">
            </div>
        </form>
    </div>
</div>