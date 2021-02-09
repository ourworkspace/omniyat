@extends('layouts.layout')
@section('page_title','Categories : : Omniyat')
@section('page_content')
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Categories</h4>
            </div>
        </div>
    </div>
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Edit Category</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('categories.update')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{$category->id}}" name="category_id">
                                <div class="form-group">
                                    <label for="categoryName">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" value="{{$category->name}}" required>
                                    @if($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label for="image">Thumb Image</label>
                                            <input type="file" class="form-control" style="padding: 6px" name="image" accept=".jpg,.jpeg,.png"/>
                                            @if($errors->has('image'))
                                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>
                                        @if(isset($category->image) && file_exists($category->image))
                                            <div class="col-md-2">
                                                <a href="{{asset($category->image)}}" target="_blank"><img src="{{asset($category->image)}}" class="img-responsive img-thumbnail"></a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Update" class="btn btn-success pull-left">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mb-3">
                    @include('categories.category_list')
                </div>
            </div>
        </div>
    </div>
@endsection