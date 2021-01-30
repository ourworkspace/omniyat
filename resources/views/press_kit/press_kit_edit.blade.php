@extends('layouts.layout')
@section('page_title','PressReleases : : Omniyat')
@section('page_content')
    <style>
        #cke_1_contents{
            height: 200px !important;
        }
    </style>
    <!-- <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Press Releases</h4>
            </div>
        </div>
    </div> -->
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin mb-3">
            <div class="d-flex card">
                <div class="card-header">
                    <h5 class="card-title">Edit Press Releases</h5>
                </div>
                <div class="card-body">
                    <form class="row" action="{{route('press.kit.update')}}" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$PressKit->id}}" name="Id">
                        <div class="form-group col-md-12">
                            <label for="categoryId">Select Category <span class="text-danger">*</span></label>
                            <select class="form-control" name="categoryId" required>
                                <option value="">Select Category Name</option>
                                @foreach($PressKitCategories as $value)
                                    <option value="{{$value->id}}" {{($value->id == $PressKit->category_id) ? 'selected' : '' }} >{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Title <span class="text-danger">*</span></label>
                            <input type="text" required value="{{$PressKit->title}}" name="title" class="form-control">
                            @if($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>



                        <div class="form-group col-md-12">
                            @if(isset($PressKit->thumb_image) && file_exists($PressKit->thumb_image))
                                <div class="row">
                                    <div class="col-md-10 mt-2">
                                        <label>Thumb Image </label>
                                        <input type="file" name="thumb_image" style="padding: 6px" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{asset($PressKit->thumb_image)}}" class="img img-thumbnail">
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
                            @if(isset($PressKit->large_image) && file_exists($PressKit->large_image))
                                <div class="row">
                                    <div class="col-md-10 mt-2">
                                        <label>large Image </label>
                                        <input type="file" name="large_image" style="padding: 6px" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{asset($PressKit->large_image)}}" class="img img-thumbnail">
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

                        <div class="form-group col-md-12">
                            @if(isset($PressKit->pdf_file) && file_exists($PressKit->pdf_file))
                                <div class="row">
                                    <div class="col-md-11 mt-2">
                                        <label>Upload Document </label>
                                        <input type="file" name="document_pdf" accept="" style="padding: 6px" class="form-control">
                                    </div>
                                    <div class="col-md-1 pt-4">
                                        <a href="{{asset($PressKit->pdf_file)}}" style="font-size:30px" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                                    </div>
                                </div>
                            @else
                                <label>Upload Document <span class="text-danger">*</span></label>
                                <input type="file" required name="document_pdf" accept="" style="padding: 6px;" class="form-control">
                            @endif

                            @if($errors->has('document_pdf'))
                                <span class="text-danger">{{ $errors->first('document_pdf') }}</span>
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
@endsection