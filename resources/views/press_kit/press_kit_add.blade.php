@extends('layouts.layout')
@section('page_title','PressKit : : Omniyat')
@section('page_content')
    <style>
        /*#cke_1_contents{
            height: 200px !important;
        }*/
        label.error{
            color: red !important;
        }
    </style>
    <!-- <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Press Kit</h4>
            </div>
        </div>
    </div> -->
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin mb-3">
            <div class="d-flex card">
                <div class="card-header">
                    <h5 class="card-title">Add Press Kit</h5>
                </div>
                <div class="card-body">
                    <form class="row" action="{{route('press.kit.save')}}" enctype="multipart/form-data" method="post" id="press_kit_form">
                        {{ csrf_field() }}
                        <div class="form-group col-md-12">
                            <label for="categoryId">Select Category <span class="text-danger">*</span></label>
                            <select class="form-control" name="categoryId" required>
                                <option value="">Select Category Name</option>
                                @foreach($PressKitCategories as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Title <span class="text-danger">*</span></label>
                            <input type="text" required name="title" class="form-control">
                            @if($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label>Thumb Image <span class="text-danger">*</span></label>
                            <input type="file" required accept=".png,.jpeg,.jpg" name="thumb_image" id="thumb_image" style="padding: 6px" class="form-control">
                            @if($errors->has('thumb_image'))
                                <span class="text-danger">{{ $errors->first('thumb_image') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label>large Image <span class="text-danger">*</span></label>
                            <input type="file" required name="large_image" id="large_image" accept=".png,.jpeg,.jpg" style="padding: 6px" class="form-control">
                            @if($errors->has('large_image'))
                                <span class="text-danger">{{ $errors->first('large_image') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label>Upload Document <span class="text-danger">*</span></label>
                            <input type="file" required name="document_pdf" id="document_pdf" accept="" style="padding: 6px" class="form-control">
                            @if($errors->has('document_pdf'))
                                <span class="text-danger">{{ $errors->first('document_pdf') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" value="Save" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>      
        </div>
    </div>
<script src="{{asset('public/assets/vendors/jquery/validation.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#thumb_image').bind('change', function (e) { //dynamic property binding
            var fileName = e.target.files[0].name;
            if(fileName != ''){
                $('label[for="thumb_image"]').hide();
            }
        });
        $('#large_image').bind('change', function (e) { //dynamic property binding
            var fileName = e.target.files[0].name;
            if(fileName != ''){
                $('label[for="large_image"]').hide();
            }
        });
        $('#pdf_file').bind('change', function (e) { //dynamic property binding
            var fileName = e.target.files[0].name;
            if(fileName != ''){
                $('label[for="pdf_file"]').hide();
            }
        });
        
        $('#press_kit_form').validate({
            ignore: "not:hidden",
            rules: {
                categoryId: {
                    required: true,
                },
                title: {
                    required:true,
                },
                thumb_image: {
                    required:true,
                },
                large_image: {
                    required:true,
                },
                pdf_file: {
                    required:true
                }
                /*long_description: {
                    required:true,
                }*/
            }
        });
    });
</script>    
@endsection