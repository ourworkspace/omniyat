@extends('layouts.layout')
@section('page_title','Privacy Policy : : Omniyat')
@section('page_content')
    <style>
        #cke_1_contents{
            height: 200px !important;
        }
    </style>
    <!-- <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Privacy Policy</h4>
            </div>
        </div>
    </div> -->
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Add Privacy Policy</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('privacy.policy.save')}}" enctype="multipart/form-data" class="row" method="post">
                                {{csrf_field()}}
                                <div class="form-group col-md-12">
                                    <label for="sub_title">Page Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="sub_title" value="" required>
                                    @if($errors->has('sub_title'))
                                        <span class="text-danger">{{ $errors->first('sub_title') }}</span>
                                    @endif
                                </div>
                                <!-- <div class="form-group col-md-12">
                                    <label for="TitleName">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="TitleName">
                                    @if($errors->has('TitleName'))
                                        <span class="text-danger">{{ $errors->first('TitleName') }}</span>
                                    @endif
                                </div> -->
                                <div class="form-group col-md-12">
                                    <label for="Description">Description</label>
                                    <textarea class="form-control" rows="6" name="Description"></textarea>
                                    <script>
                                        CKEditorChange('Description','myconfig_tcps.js');
                                    </script>
                                    @if($errors->has('Description'))
                                        <span class="text-danger">{{ $errors->first('Description') }}</span>
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