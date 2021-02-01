@extends('layouts.layout')
@section('page_title','Csr : : Omniyat')
@section('page_content')
    <style>
        /*#cke_1_contents{
            height: 200px !important;
        }*/
        .error{
            color: red !important;
        }
    </style>
    <!-- <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">CSR</h4>
            </div>
        </div>
    </div> -->
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin mb-3">
            <div class="d-flex card">
                <div class="card-header">
                    <h5 class="card-title">Edit Csr</h5>
                </div>
                <div class="card-body">
                    <form class="row" action="{{route('csr.update')}}" enctype="multipart/form-data" method="post" id="csr_form">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$csr->id}}" name="Id">
                        <!-- <div class="form-group col-md-12">
                            <label for="categoryId">Select Category </label>
                            <select class="form-control" name="categoryId">
                                <option value="">Select Category Name</option>
                                @foreach($CsrCategories as $value)
                                    <option value="{{$value->id}}" {{($value->id == $csr->category_id) ? 'selected' : '' }} >{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div> -->
                        <div class="form-group col-md-12">
                            <label>Publish Date <span class="text-danger">*</span></label>
                            <input type="text" name="date" value="{{date('m/d/Y',strtotime($csr->date))}}" class="form-control datepicker" autocomplete="off">
                            @if($errors->has('date'))
                                <span class="text-danger">{{ $errors->first('date') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label>Title <span class="text-danger">*</span></label>
                            <input type="text" required value="{{$csr->title}}" name="title" class="form-control">
                            @if($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label>Short Description  <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="short_description" rows="4">{{$csr->short_description}}</textarea>
                            
                            @if($errors->has('short_description'))
                                <span class="text-danger">{{ $errors->first('short_description') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label>Long Description  <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="long_description" rows="4">{{$csr->long_description}}</textarea>
                            <script>
                                CKEditorChange('long_description','myconfig_images.js');
                            </script>
                            @if($errors->has('long_description'))
                                <span class="text-danger">{{ $errors->first('long_description') }}</span>
                            @endif
                        </div>


                        <div class="form-group col-md-12">
                            @if(isset($csr->thumb_image) && file_exists($csr->thumb_image))
                                <div class="row">
                                    <div class="col-md-10 mt-2">
                                        <label>Thumb Image  <span class="text-danger">*</span></label>
                                        <input type="file" name="thumb_image" style="padding: 6px" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{asset($csr->thumb_image)}}" class="img img-thumbnail">
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
                            @if(isset($csr->large_image) && file_exists($csr->large_image))
                                <div class="row">
                                    <div class="col-md-10 mt-2">
                                        <label>large Image  <span class="text-danger">*</span></label>
                                        <input type="file" name="large_image" style="padding: 6px" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <img src="{{asset($csr->large_image)}}" class="img img-thumbnail">
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
                            @if(isset($csr->pdf_file) && file_exists($csr->pdf_file))
                                <div class="row">
                                    <div class="col-md-11 mt-2">
                                        <label>Upload pdf Document  <span class="text-danger">*</span></label>
                                        <input type="file" name="document_pdf" accept=".pdf" style="padding: 6px" class="form-control">
                                    </div>
                                    <div class="col-md-1 pt-4">
                                        <a href="{{asset($csr->pdf_file)}}" style="font-size:30px" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                                    </div>
                                </div>
                            @else
                                <label>Upload pdf Document <span class="text-danger">*</span></label>
                                <input type="file" required name="document_pdf" accept=".pdf" style="padding: 6px;" class="form-control">
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
<script src="{{asset('public/assets/vendors/jquery/validation.min.js')}}"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $('#date').datepicker({
                autoclose: true
            });
        
        
        $('#csr_form').validate({
            ignore: "not:hidden",
            rules: {
                /*date: {
                    required: true,
                },*/
                title: {
                    required:true,
                },
                /*thumb_image: {
                    required:true,
                },
                large_image: {
                    required:true,
                },*/
                short_description: {
                    required:true,
                    maxlength:110
                },
                /*long_description: {
                    required:true,
                }*/
            }
        });
    });
</script>     
@endsection