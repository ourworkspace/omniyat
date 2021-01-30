@extends('layouts.layout')
@section('page_title','OtherPage List : : Omniyat')
@section('page_content')
    <style>
        #cke_1_contents{
            height: 200px !important;
        }
    </style>
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">OtherPages</h4>
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
                            <h5 class="card-title">OtherPages List</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dataTables">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($otherPagesList as $key => $value)
                                        <tr>
                                            <td width="80">{{$key+1}}</td>
                                            <td> {{$value->title}} </td>
                                            <td align="center" width="80">
                                                <span>
                                                    <a href="{{route('others.page.edit',['otherPageId'=>$value->id])}}"> <i class="fa fa-edit fa-1x"></i> </a>
                                                </span>
                                                <span>
                                                    <a href="{{route('others.page.delete',['otherPageId'=>$value->id])}}" onclick="return confirm('Do you want to delete Portfolio?')"> <i class="fa fa-trash-o fa-1x"></i> </a>
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
        </div>
    </div>
@endsection