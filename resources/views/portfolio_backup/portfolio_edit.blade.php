@extends('layouts.layout')
@section('page_title','Portfolio Edit: : Omniyat')
@section('page_content')
    <style>
        #cke_1_contents{
            height: 200px !important;
        }
    </style>
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Edit Portfolio</h4>
            </div>
        </div>
    </div>
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Edit Portfolio</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('portfolio.update')}}" enctype="multipart/form-data" class="row" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="portfolio_id" value="{{$portfolio->id}}">
                                <div class="form-group col-md-12">
                                    <label for="ProjectName">Select Category <span class="text-danger">*</span></label>
                                    <select class="form-control" name="category" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $value)
                                            <option value="{{$value->id}}" {{($portfolio->category_id == $value->id) ?
                                                'selected' : ''}} >{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('category'))
                                        <span class="text-danger">{{ $errors->first('category') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="ProjectName">Project Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="ProjectName" required value="{{$portfolio->project_name}}">
                                    @if($errors->has('ProjectName'))
                                        <span class="text-danger">{{ $errors->first('ProjectName') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="TitleName">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="TitleName" required value="{{$portfolio->title}}">
                                    @if($errors->has('TitleName'))
                                        <span class="text-danger">{{ $errors->first('TitleName') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="SubTitleName">SubTitle </label>
                                    <input type="text" class="form-control" name="SubTitleName" value="{{$portfolio->subtitle}}">
                                    @if($errors->has('SubTitleName'))
                                        <span class="text-danger">{{ $errors->first('SubTitleName') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label for="Logo">Logo </label>
                                            <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="Logo" style="padding: 6px">
                                            @if($errors->has('Logo'))
                                                <span class="text-danger">{{ $errors->first('Logo') }}</span>
                                            @endif
                                        </div>
                                        @if(isset($portfolio->logo) && file_exists($portfolio->logo))
                                            <div class="col-md-2">
                                                <img src="{{asset($portfolio->logo)}}" class="img-responsive img-thumbnail"/>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Images">Slideshow Images </label>
                                    <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="Images[]" multiple style="padding: 6px">
                                    @if($errors->has('Images'))
                                        <span class="text-danger">{{ $errors->first('Images') }}</span>
                                    @endif
                                    @if(isset($portfolio->slide_images))
                                        <div class="row" style="margin-top: 10px">
                                            @php
                                              $images = explode(',', $portfolio->slide_images);
                                            @endphp
                                            <div class="col-md-12 from-group">
                                                <label>Uploaded Slider Images</label>
                                                <div class="row">
                                                    <?php foreach($images as $key => $image): ?>
                                                        <div class="col-md-3" id="uploadImage_<?=$key?>">
                                                            <img src="<?=asset($image)?>" class="img-thumbnail" style="width: 100%;height: 140px;margin:5px 0px">
                                                            <a href="javascript:0;" onClick="deleteImage('uploadImage_<?=$key?>','<?=$image?>',<?=$portfolio->id?>);" style="position: absolute;top: 15px;right: 25px;font-size: 20px;color: red;"><i class="fa fa-trash-o"></i></a>
                                                            <input type="hidden" name="uploaded_images[]" value="<?=$image?>">
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="Description">Amenities </label>
                                    <div class="col-md-12">
                                        <div class="row pl-2 pr-2">
                                            @php
                                                $savedAmenities = explode(',',$portfolio->amenities);
                                            @endphp
                                            @foreach($amenities as $value)
                                                <div class="col-md-4 form-check form-check-flat">
                                                    <label class="form-check-label">
                                                    <input type="checkbox" name="amenities[]" value="{{$value->id}}" {{(in_array($value->id, $savedAmenities) ? 'checked' : '')}} class="form-check-input"> {{$value->name}} </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @if($errors->has('amenities'))
                                            <span class="text-danger">{{ $errors->first('amenities') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Description">Description</label>
                                    <textarea class="form-control" rows="6" name="Description">{{$portfolio->description}}</textarea>
                                    <script>
                                        CKEditorChange('Description','myconfigText.js');
                                    </script>
                                    @if($errors->has('Description'))
                                        <span class="text-danger">{{ $errors->first('Description') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Location">Location <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="Location" required value="{{$portfolio->location}}">
                                    @if($errors->has('Location'))
                                        <span class="text-danger">{{ $errors->first('Location') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="submit" value="Update" class="btn btn-success pull-left">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteImage(divId,portfolioImage,portfolioId){
            if(confirm('Do you want delete image?')){
                //console.log(divId);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{route('portfolio.images.delete')}}",
                    data: {portfolioImage:portfolioImage,portfolioId:portfolioId},
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