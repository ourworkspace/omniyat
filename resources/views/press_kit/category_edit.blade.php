@extends('layouts.layout')
@section('page_title','PressKit Categories : : Omniyat')
@section('page_content')
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">PressKit Categories</h4>
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
                            <form action="{{route('press.kit.category.update')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="Id" value="{{$category->id}}">
                                <div class="form-group">
                                    <label for="categoryName">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{$category->name}}" name="title" required>
                                    @if($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Update" class="btn btn-success pull-left">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mb-3">
                    @include('press_kit.category_list')
                </div>
            </div>
        </div>
    </div>
@endsection