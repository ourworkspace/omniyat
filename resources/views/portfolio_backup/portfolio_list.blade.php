@extends('layouts.layout')
@section('page_title','Portfolio List: : Omniyat')
@section('page_content')
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Portfolio List</h4>
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
                            <h5 class="card-title">Portfolio List</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dataTables">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Logo</th>
                                            <th>Category</th>
                                            <th>Project Name</th>
                                            <th>Title</th>
                                            <th>SubTitle</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($portfolios as $key => $value)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>
                                                    @if(isset($value->logo) && file_exists($value->logo))
                                                        <img src="{{asset($value->logo)}}" class="img-circle">
                                                    @endif
                                                </td>
                                                <td>{{$value->category->name}}</td>
                                                <td> {{$value->project_name}} </td>
                                                <td> {{$value->title}} </td>
                                                <td> {{$value->subtitle}} </td>
                                                <td align="center">
                                                    <span>
                                                        <a href="{{route('portfolio.edit',['portfolio_id'=>$value->id])}}"> <i class="fa fa-edit fa-1x"></i> </a>
                                                    </span>
                                                    <span>
                                                        <a href="{{route('portfolio.delete',['portfolio_id'=>$value->id])}}" onclick="return confirm('Do you want to delete Portfolio?')"> <i class="fa fa-trash-o fa-1x"></i> </a>
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