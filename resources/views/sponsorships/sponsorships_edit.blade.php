@extends('layouts.layout')
@section('page_title','Sponsorships : : Omniyat')
@section('page_content')
    <style>
        #cke_1_contents{
            height: 200px !important;
        }
    </style>
    <!-- <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Sponsorships</h4>
            </div>
        </div>
    </div> -->
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin mb-3">
            <div class="d-flex card">
                <div class="card-header">
                    <h5 class="card-title">Edit Sponsorships</h5>
                </div>
                <div class="card-body">
                    <form class="row" action="{{route('sponsorships.update')}}" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$sponsorships->id}}" name="id">
                        <div class="form-group col-md-12">
                            <label for="categoryId">Select Category <span class="text-danger">*</span></label>
                            <select class="form-control" name="categoryId" required>
                                <option value="">Select Category Name</option>
                                @foreach($SponsorshipsCategories as $value)
                                    <option value="{{$value->id}}" {{($value->id == $sponsorships->category_id) ? 'selected' : '' }} >{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Title <span class="text-danger">*</span></label>
                            <input type="text" required value="{{$sponsorships->title}}" name="title" class="form-control">
                            @if($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <label>Short Description </label>
                            <textarea class="form-control" name="short_description" rows="4">{{$sponsorships->short_description}}</textarea>
                            
                            @if($errors->has('short_description'))
                                <span class="text-danger">{{ $errors->first('short_description') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label>Long Description </label>
                            <textarea class="form-control" name="long_description" rows="4">{{$sponsorships->long_description}}</textarea>
                            <script>
                                CKEditorChange('long_description','myconfigText.js');
                            </script>
                            @if($errors->has('long_description'))
                                <span class="text-danger">{{ $errors->first('long_description') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            @if(isset($sponsorships->thumb_image) && file_exists($sponsorships->thumb_image))
                                <div class="row">
                                    <div class="col-md-10 mt-2">
                                        <label>Thumb Image </label>
                                        <input type="file" name="thumb_image" style="padding: 6px" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{asset($sponsorships->thumb_image)}}" class="img img-thumbnail">
                                    </div>
                                </div>
                            @else
                                <label>Thumb Image <span class="text-danger">*</span></label>
                                <input type="file" required accept=".png,.jpeg,.jpg" name="thumb_image" style="padding: 6px" class="form-control">
                            @endif

                            @if($errors->has('thumb_image'))
                                <span class="text-danger">{{ $errors->first('thumb_image') }}</span>
                            @endif
                        </div>



                        <div class="form-group col-md-12">
                            @if(isset($sponsorships->large_image) && file_exists($sponsorships->large_image))
                                <div class="row">
                                    <div class="col-md-10 mt-2">
                                        <label>large Image </label>
                                        <input type="file" name="large_image" style="padding: 6px" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{asset($sponsorships->large_image)}}" class="img img-thumbnail">
                                    </div>
                                </div>
                            @else
                                <label>large Image <span class="text-danger">*</span></label>
                                <input type="file" required name="large_image" accept=".png,.jpeg,.jpg" style="padding: 6px" class="form-control">
                            @endif

                            @if($errors->has('large_image'))
                                <span class="text-danger">{{ $errors->first('large_image') }}</span>
                            @endif
                        </div>
                        <!-- 
                        <div class="form-group col-md-12">
                            @if(isset($sponsorships->pdf_file) && file_exists($sponsorships->pdf_file))
                                <div class="row">
                                    <div class="col-md-11 mt-2">
                                        <label>Upload pdf Document </label>
                                        <input type="file" name="document_pdf" accept=".pdf" style="padding: 6px" class="form-control">
                                    </div>
                                    <div class="col-md-1 pt-4">
                                        <a href="{{asset($sponsorships->pdf_file)}}" style="font-size:30px" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                                    </div>
                                </div>
                            @else
                                <label>Upload pdf Document <span class="text-danger">*</span></label>
                                <input type="file" required name="document_pdf" accept=".pdf" style="padding: 6px;" class="form-control">
                            @endif

                            @if($errors->has('document_pdf'))
                                <span class="text-danger">{{ $errors->first('document_pdf') }}</span>
                            @endif
                        </div> -->
                        <div class="form-group col-md-12">
                            <label>Select Date <span class="text-danger">*</span></label>
                            <input type="text" required name="date" value="{{date('m/d/Y',strtotime($sponsorships->date))}}" class="form-control datepicker" autocomplete="off">
                            @if($errors->has('date'))
                                <span class="text-danger">{{ $errors->first('date') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="sponsorship_gallery_images">Gallery Images</label>
                            <input type="file" class="form-control fileInput4" accept=".jpg,.png,.jpeg" name="sponsorship_gallery_images[]" style="padding: 6px" multiple>
                            @if($errors->has('sponsorship_gallery_images'))
                                <span class="text-danger">{{ $errors->first('sponsorship_gallery_images') }}</span>
                            @endif
                        
                            @if(count($sponsorship_gallary) > 0)
                                <label>Uploaded Gallery Images</label>
                                <div class="row">
                                    <?php foreach($sponsorship_gallary as $key => $image): ?>
                                        <div class="col-md-3" id="uploadImage_<?=$key?>">
                                            <img src="<?=asset($image->image)?>" class="img-thumbnail" style="width: 100%;height: 140px;margin:5px 0px">
                                            <a href="javascript:0;" onClick="deleteImage('uploadImage_<?=$key?>','<?=$image->id?>');" style="position: absolute;top: 15px;right: 25px;font-size: 20px;color: red;"><i class="fa fa-trash-o"></i></a>
                                            <input type="hidden" name="uploaded_images[]" value="<?=$image->id?>">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" value="Update" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>      
        </div>
    </div>
<script>
    function deleteImage(divId,imageId){
        if(confirm('Do you want delete image?')){
            //console.log(divId);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('sponsorships.delete.image')}}",
                data: {image_id:imageId},
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    if(response.res == true){
                        $("#"+divId).remove();
                    }
                }
            });
        }
    }
</script>    
@endsection