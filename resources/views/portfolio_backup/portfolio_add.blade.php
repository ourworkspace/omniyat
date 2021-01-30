@extends('layouts.layout')
@section('page_title','Portfolio : : Omniyat')
@section('page_content')
    <style>
        #cke_1_contents{
            height: 200px !important;
        }
    </style>
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Add Portfolio</h4>
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
                            <h5 class="card-title">Add Portfolio</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('portfolio.save')}}" enctype="multipart/form-data" class="row" method="post">
                                {{csrf_field()}}
                                <div class="form-group col-md-12">
                                    <label for="ProjectName">Select Category <span class="text-danger">*</span></label>
                                    <select class="form-control" name="category" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('category'))
                                        <span class="text-danger">{{ $errors->first('category') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="ProjectName">Project Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="ProjectName" required>
                                    @if($errors->has('ProjectName'))
                                        <span class="text-danger">{{ $errors->first('ProjectName') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="TitleName">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="TitleName" required>
                                    @if($errors->has('TitleName'))
                                        <span class="text-danger">{{ $errors->first('TitleName') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="SubTitleName">SubTitle </label>
                                    <input type="text" class="form-control" name="SubTitleName" >
                                    @if($errors->has('SubTitleName'))
                                        <span class="text-danger">{{ $errors->first('SubTitleName') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Logo">Logo <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="Logo" required style="padding: 6px">
                                    @if($errors->has('Logo'))
                                        <span class="text-danger">{{ $errors->first('Logo') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Images">Slideshow Images </label>
                                    <input type="file" class="form-control" accept=".jpg,.png,.jpeg" name="Images[]" multiple style="padding: 6px">
                                    @if($errors->has('Images'))
                                        <span class="text-danger">{{ $errors->first('Images') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="Description">Amenities </label>
                                    <div class="col-md-12">
                                        <div class="row pl-2 pr-2">
                                            @foreach($amenities as $value)
                                                <div class="col-md-4 form-check form-check-flat">
                                                    <label class="form-check-label">
                                                    <input type="checkbox" name="amenities[]" value="{{$value->id}}" class="form-check-input"> {{$value->name}} </label>
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
                                    <textarea class="form-control" rows="6" name="Description"></textarea>
                                    <script>
                                        CKEditorChange('Description','myconfigText.js');
                                    </script>
                                    @if($errors->has('Description'))
                                        <span class="text-danger">{{ $errors->first('Description') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Location">Location <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="Location" required>
                                    @if($errors->has('Location'))
                                        <span class="text-danger">{{ $errors->first('Location') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="submit" value="Save" class="btn btn-success pull-left">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection