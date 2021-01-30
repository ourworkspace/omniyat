@extends('layouts.layout')
@section('page_title','CSR : : Omniyat')
@section('page_content')
    <style>
        #cke_1_contents{
            height: 200px !important;
        }
    </style>
    <!-- <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Csr List
                    <div class="pull-right">
                        <button><a href="{{route('csr.add')}}" class="btn btn-auto tss-msb px-45 py-15 fs-12">Add CSR</a></button>
                    </div>
                </h4>
            </div>
        </div>
    </div> -->
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin mb-3">
           
            <div class="d-flex card">
                <div class="card-header">
                    <h5 class="card-title">Csr List
                        <div class="pull-right col-md-3">
                            <button><a href="{{route('csr.add')}}" class="btn btn-auto tss-msb px-45 py-15 fs-12">Add CSR</a></button>
                        </div>
                        <div class="pull-right col-md-3">
                            <button><a href="javascript:void(0)"  data-toggle="modal" data-target="#subTitleModal" class="btn btn-auto tss-msb px-45 py-15 fs-12">Add Page sub title</a></button>
                        </div>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered dataTables">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <!-- <th>Category</th> -->
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($CsrList as $key => $value)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            @if(isset($value->thumb_image) && file_exists($value->thumb_image))
                                                <img src="{{asset($value->thumb_image)}}">
                                            @endif
                                        </td>
                                        <!-- <td>{{(isset($value->category->name) ? $value->category->name : '')}}</td> -->
                                        <td>{{$value->title}}</td>
                                        <td>{{date('d-m-Y',strtotime($value->date))}}</td>
                                        <td>
                                            <span>
                                                <a href="{{route('csr.edit',['Id'=>$value->id])}}"> <i class="fa fa-edit fa-1x"></i> </a>
                                            </span>
                                            <span>
                                                <a href="{{route('csr.delete',['Id'=>$value->id])}}" onclick="return confirm('Do you want to delete data?')"> <i class="fa fa-trash-o fa-1x"></i> </a>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
<div id="subTitleModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Page Sub Title</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('sub.title.save')}}" enctype="multipart/form-data" class="row" method="post">{{ csrf_field() }}
                    <div class="form-group col-md-12">
                        <input type="hidden" name="id" value="{{isset($PageSub->id)?$PageSub->id:''}}">
                        <input type="hidden" name="page_type" value="4">
                        <label for="sub_title">Sub Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="sub_title" value="{{isset($PageSub->sub_title)?$PageSub->sub_title:''}}" required>
                        @if($errors->has('sub_title'))
                            <span class="text-danger">{{ $errors->first('sub_title') }}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" value="{{isset($PageSub->id)?'Edit':'Save'}}" class="btn btn-success pull-left">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>    
@endsection